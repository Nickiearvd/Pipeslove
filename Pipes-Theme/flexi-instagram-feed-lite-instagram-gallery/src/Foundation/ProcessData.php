<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Foundation\GlobalOptions;
use FLAppLite\Facades\StreamData as SD;
use Carbon\Carbon;

class ProcessData
{
    protected $instagram;

    /**
     *  Create new instance.
     */
    public function __construct($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     *  Get feed data and insert into database.
     *
     *  @param number   $id Feed id.
     */
    public function update_feed($id)
    {
    }

    /**
     *  Get feeds and insert them to database.
     *
     *  @param number   $stream_id  Stream ID.
     */
    public function update_feeds($stream_id = null)
    {
        $stream = SD::stream($stream_id);
        $stream = (!empty($stream) ? (object)$stream : null);

        if (!$stream)
        {
            return ;
        }

        $stream->cache_updated_at = date('Y-m-d H:i:s');
        $feeds = $stream->feeds;

        foreach ($feeds as $feed)
        {
            $result = $this->instagram->get_data($feed['type'], $feed['value'], 60);

            if (!empty($result))
            {
                $stream->posts = [];

                foreach ($result as $item)
                {
                    $stream->posts[] = $item;
                }
            }
        }

        SD::save($stream);
    }
}
