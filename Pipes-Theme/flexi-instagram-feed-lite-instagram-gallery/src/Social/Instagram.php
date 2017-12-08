<?php

namespace FLAppLite\Social;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\Request;

class Instagram extends SocialBase
{
    /**
     *  Access token.
     *
     *  @var string
     */
    protected $access_token = '';

    /**
     *  Create Instagram instance.
     *
     *  @param string   $access_token   Instagram access token.
     */
    public function __construct($access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     *  Verify if the access token is valid.
     *
     *  @return stdClass|bool    Returns the response from instagram or false if it fails.
     */
    public function validate_token()
    {
        if (empty($this->access_token))
        {
            return false;
        }

        $response = Request::get(base64_decode('aHR0cHM6Ly9hcGkuaW5zdGFncmFtLmNvbS92MS91c2Vycy9zZWxmP2FjY2Vzc190b2tlbj0=') . $this->access_token);

        if ($response->status_code !== 200)
        {
            return false;
        }

        return json_decode($response->result);
    }

    /**
     *  Get instagram raw data.
     *
     *  @param string   $url    Instagram api url.
     *  @param string   $limit  [optional] The maximum items per request.
     *
     *  @return array   Returns an array of items as returned by Instagram.
     */
    public function get_raw_data($url, $limit = 30)
    {
        $response = Request::get($url);

        if ($response->status_code === 200)
        {
            $result = json_decode($response->result);

            if ($limit > count($result->data) && isset($result->pagination->next_url))
            {
                return array_merge($result->data, $this->get_raw_data($result->pagination->next_url, $limit - count($result->data)));
            }

            return $result->data;
        }

        return [];
    }

    /**
     *  Get instagram data.
     *
     *  @param string   $feed_type  The type of the feed.
     *  @param string   $value      The value of the feed request.
     *  @param string   $limit      [optional] The maximum items per request.
     *
     *  @return array   Returns an array of associative arrays with data.
     */
    public function get_data($feed_type, $value, $limit = 30)
    {
        $items = $this->get_raw_data($this->get_url($feed_type, $value, min(30, $limit)), $limit);
        $result = [];

        foreach ($items as $item)
        {
            $result[] =
            [
                'uid'               => $item->id,
                'type'              => $item->type,
                'network'           => 'instagram',
                'created'           => date('Y-m-d H:i:s', $item->created_time),
                'author_name'       => $item->user->full_name,
                'author_link'       => 'https://www.instagram.com/' . $item->user->username,
                'author_picture'    => $item->user->profile_picture,
                'message'           => (!empty($item->caption) ? $item->caption->text : ''),
                'description'       => '',
                'link'              => $item->link,
                'likes'             => $item->likes->count,
                'comments'          => $item->comments->count,
                'image_width'       => $item->images->standard_resolution->width,
                'image_height'      => $item->images->standard_resolution->height,
                'image_url'         => $item->images->standard_resolution->url,
                
            ];
        }

        return $result;
    }

    /**
     *  Get URL for the right type of request.
     *
     *  @param string   $feed_type  The type of the feed.
     *  @param string   $value      The value of the feed request.
     *  @param number   $limit      [optional] The maximum items per request.
     *
     *  @return string  Returns the URL part for the right type of request.
     */
    private function get_url($feed_type, $value, $limit = 30)
    {
        $prv_token = 'aHR0cHM6Ly9hcGkuaW5zdGFncmFtLmNvbS92MS91c2Vycy9zZWxmL21lZGlhL3JlY2VudC8=';
        return base64_decode($prv_token) . "?access_token={$this->access_token}&count={$limit}";
    }

    
}
