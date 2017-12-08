<?php if (!defined('ABSPATH')) { exit; }
use FLAppLite\Facades\View;
use FLAppLite\Facades\GlobalOptions;
use FLAppLite\Facades\StreamData;
use FLAppLite\Database\Database;
use FLAppLite\Facades\Route;
use FLAppLite\Social\Instagram;

Route::path('/', function ()
{
    if (!defined('FLEXI_TESTING'))
    {
        View::load('base');
    }
});

Route::path('/canvas', function ()
{
    $canvas = new \FLAppLite\WordPress\Canvas($_GET['stream'], isset($_GET['moderate']) && $_GET['moderate']);

    View::load('canvas', ['canvas' => $canvas]);
});

Route::path('/save-global', function ()
{
    GlobalOptions::save($_POST);

    return [];
});

Route::path('/save-stream', function ()
{
    try
    {
        $data = $_POST;
        $stream = StreamData::save($data);
        $stream_data = $stream;
    }
    catch (\Exception $ex)
    {
        echo $ex->getMessage();
    }

    return $stream_data;
});

Route::path('/save-feed', function ()
{
    // if (!empty($_POST['id']) && $_POST['id'] !== 0)
    // {
    //     return StreamData::update_feed($_POST)->toArray();
    // }
    //
    // return StreamData::save_feed($_POST)->toArray();
});

Route::path('/remove-stream', function ()
{
    StreamData::remove($_GET['id']);
});

Route::path('/remove-feed', function ()
{
    // StreamData::remove_feed($_GET['id']);
});

Route::path('/streams', function ()
{
    // var_dump(StreamData::streams());
    // die();

    echo json_encode(StreamData::streams());
});

Route::path('/stream', function ()
{
    echo json_encode(StreamData::stream($_GET['id']));
});

Route::path('/process-feeds', function ()
{
    try
    {
        $access_token = GlobalOptions::option('access_token');

        $instagram = new Instagram($access_token);

        (new \FLAppLite\Foundation\ProcessData($instagram))->update_feeds(isset($_GET['stream']) ? $_GET['stream'] : null);
    }
    catch (\Exception $ex)
    {
        echo $ex->getMessage();
    }
});

Route::path('/auth', function ()
{
    if (!empty($_GET['token']))
    {
        GlobalOptions::save('access_token', $_GET['token']);
    }

    ?>
        <script>window.open(window.location, '_self').close()</script>
    <?php
    exit;
});

Route::path('/validate-auth', function ()
{
    $access_token = GlobalOptions::option('access_token');

    $result = [];

    if (empty($access_token))
    {
        $result['status'] = 'empty';
    }
    else
    {
        $response = (new Instagram($access_token))->validate_token();

        $result['status'] = ($response !== false ? 'valid' : 'invalid');
        $result['data'] = ($response !== false ? $response->data : '');
    }

    return $result;
});

Route::path('/disconnect', function ()
{
    GlobalOptions::save('access_token', '');
});
