<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\GlobalOptions as GO;
use FLAppLite\Social\Instagram;
use FLAppLite\Facades\Cache;

use Carbon\Carbon;

class StreamData
{
    /**
     *  Get list of streams
     *
     *  @return array   Returns the available streams.
     */
    public function streams()
    {
        $streams = Cache::read('fl_streams');
        $streams = (!empty($streams) ? $streams : []);

        return array_map(function ($stream)
        {
            $stream['id'] = (int) $stream['id'];

            return $stream;
        }, $streams);
    }

    /**
     *  Get specific stream.
     *
     *  @param number   $id Stream id.
     *
     *  @return array   Returns the stream or null.
     */
    public function stream($id)
    {
        $streams = $this->streams();

        $streams = array_filter($streams, function ($item) use ($id)
        {
            return $item['id'] == $id;
        });


        return (!empty($streams) ? array_pop($streams) : null);
    }

    /**
     *  Save stream.
     *
     *  @param array $data  Stream data.
     *
     *  @return array   The saved stream.
     */
    public function save($data)
    {
        $data = (array) $data;
        $streams = $this->streams();
        $stream = (isset($data['id']) ? $this->stream($data['id']) : []);
        $stream = (!empty($stream) ? $stream : []);
        $stream = array_merge($stream, $data);

        if ($stream['id'] == 0)
        {
            $stream['id'] = count($streams) + 1;
            $stream['created_at'] = date('Y-m-d H:i:s');
            $streams[] = $stream;
        }
        else
        {
            foreach ($streams as $index => $st)
            {
                if ($st['id'] == $stream['id'])
                {
                    $stream['id'] = (int) $stream['id'];
                    $streams[$index] = array_merge($streams[$index], $stream);

                    break;
                }
            }
        }

        Cache::write('fl_streams', (array)$streams);

        return $stream;
    }

    /**
     *  Save feed.
     *
     *  @param array $data  Feed data.
     *
     *  @return array The saved feed.
     */
    public function save_feed($data)
    {
        $feed = (isset($data['id']) ? $this->stream($data['id']) : []);
        $feed = array_merge($feed, $data);

        Cache::write('fl_feeds', $feed);

        return $feed;
    }

    /**
     *  Update feed.
     *
     *  @param array $data  Feed data.
     *
     *  @return array The updated feed.
     */
    public function update_feed($data)
    {
        $feeds = Cache::read('fl_feeds');
        $feeds = (!empty($feeds) ? $feeds : []);
        $feed;

        foreach ($feeds as $index => $feed)
        {
            if ($feed['id'] === $data['id'])
            {
                $feed = $feeds[index] = array_merge($feeds[index], $data);
            }
        }

        Cache::write('fl_feeds', $feeds);

        return $feed;
    }

    /**
     *  Remove stream.
     *
     *  @param number   $id Stream id.
     */
    public function remove($id)
    {
        $streams = $this->streams();

        foreach ($streams as $index => $stream)
        {
            if ($stream['id'] == $id)
            {
                unset($streams[$index]);
            }
        }

        Cache::write('fl_streams', $streams);
    }

    /**
     *  Remove feed.
     *
     *  @param number   $id Feed id.
     */
    public function remove_feed($feed)
    {
    }

    /**
     *  Get data for passing to the client side plugin.
     *
     *  @param number   $id         Stream id.
     *  @param boolean  $moderate   [optional] Whether we are in moderate mode.
     *
     *  @return array   Returns an associative array with data ready for passing to the client side plugin.
     */
    public function stream_options($id, $moderate = false)
    {
        $stream = $this->stream($id);

        if (!$stream)
        {
            return [];
        }

        $stream = (object) $stream;

        if (defined('FLEXI_I_IS_WP') && $stream->private && !is_user_logged_in())
        {
            return [];
        }

        // Check if we are authenticated.
        if (!(new Instagram(GO::option('access_token')))->validate_token() && is_admin())
        {
            return [
                'displayMessage' => __('The access token is not valid or you are not authenticated. Please check Auth settings.', 'flexi-instagram-feed-lite-instagram-gallery'),
                'customCSS' => '',
                'customJS'  => ''
            ];
        }

        $feed_data = $this->process_posts($this->get_posts($stream, $moderate), $stream, $moderate);

        if (empty($feed_data))
        {
            return [
                'displayMessage' => __('There are no posts to show. Please check your stream settings.', 'flexi-instagram-feed-lite-instagram-gallery'),
            ];
        }

        return [
            'moderateMode'          => $moderate,
            'effect'                => $stream->transition,
            'customStyles'          => $stream->has_custom_colors,
            'styles'                => $stream->custom_colors,
            'textAlignment'         => $stream->text_alignment,
            'layout'                => $stream->layout,
            'grid'                  =>
            [
                'gutter'        => (int)$stream->gutter,
            ],
            'order'                 => $stream->order,
            'feedData'              => $feed_data
        ];
    }

    /**
     *  Get stream posts.
     *
     *  @param array    $stream     The stream for which to get posts.
     *  @param boolean  $moderate   [optional] Whether we are in moderate mode.
     *
     *  @return array   Return an array of posts or an empty array.
     */
    private function get_posts($stream, $moderate = false)
    {
        $feeds = $stream->feeds;
        $posts = [];

        if (Carbon::now()->diffInMinutes(new Carbon($stream->cache_updated_at)) < 1440)
        {
            $posts = (!empty($stream->posts) ? $stream->posts : []);
        }

        if (empty($posts) && !$moderate)
        {
            (new ProcessData(new Instagram(GO::option('access_token'))))->update_feeds($stream->id);

            $posts = (!empty($stream->posts) ? $stream->posts : []);
        }

        return $posts;
    }

    /**
     *  Go through all posts and transform them for sending to stream.
     *
     *  @param array    $posts      Array of posts.
     *  @param boolean  $moderate   [optional] Whether we are in moderate mode.
     *
     *  @return array   Returns the array transformed.
     */
    private function process_posts($posts, $moderate = false)
    {
        return array_map(function ($post) use ($moderate)
        {
            $post['approved'] = true;

            $post['wp_created'] = date(get_option('date_format'), strtotime($post['created']));
            $post['short_created'] = str_replace(', ' . date('Y'), '', date('M j, Y', strtotime($post['created'])));
            $post['elapsed_created'] = flexi_format_date($post['created']);

            return $post;
        }, $posts);
    }
}
