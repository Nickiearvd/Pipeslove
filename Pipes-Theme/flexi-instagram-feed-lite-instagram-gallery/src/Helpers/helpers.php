<?php if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\GlobalOptions;
use Carbon\Carbon;

function flexi_is_allowed_to_moderate()
{
    if (defined('FLEXI_I_IS_WP') && FLEXI_I_IS_WP)
    {
        $user = wp_get_current_user();
        $moderate_roles = explode(',', GlobalOptions::option('moderate_roles', 'administrator'));

        return !!array_intersect($moderate_roles, $user->roles);
    }

    return true;
}

/**
 *  Format date to show elapsed time.
 *
 *  @param string $date The date to format.
 *
 *  @return string Returns the formated date.
 */
function flexi_format_date($date)
{
    $date = new Carbon($date);
    $now = Carbon::now();

    $response = $now->diffForHumans($date, true);

    $response = preg_replace('/1\s*(year|month|week)/', 'last $1', $response);
    $response = str_replace('1 day', 'yesterday', $response);
    $response = preg_replace('/[0-9]*?\s*?(seconds?)/', 'just now', $response);

    return $response;
}

/**
 *  Remove files from a directory.
 *
 *  @param string   $target
 */
function flexi_remove_files($target)
{
    if (is_dir($target))
    {
        $target = rtrim($target, '\\/') . DIRECTORY_SEPARATOR;
        $files = glob($target . '*', GLOB_MARK);

        foreach ($files as $file)
        {
            flexi_remove_files($file);
        }

        rmdir($target);
    }
    else
    {
        unlink($target);
    }
}
