<?php

namespace FLAppLite\WordPress;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\GlobalOptions;
use FLAppLite\Facades\StreamData;

class Shortcode
{
    /**
     *  Register shortcode.
     */
    public function __construct()
    {
        add_shortcode('flexi-instagram', [&$this, 'action']);
    }

    /**
     *  Do shortcode.
     */
    public function action($atts, $content = '')
    {
        extract(shortcode_atts(
        [
            'use'   => ''
        ], $atts));

        $id = 'flexi-instagram-' . $use;

        $stream_options = StreamData::stream_options($use);

        if (empty($stream_options))
        {
            return '<div class="flexi-instagram-error-message">The specified shortcode id is not valid. Please check the id number.</div>';
        }

        $stream_data = json_encode($stream_options);

        $skin_stylesheet = '';

        if (!empty($stream_options['layout']))
        {
            if (!empty($stream_options['skin']))
            {
                $skin_stylesheet = FLEXI_I_PURL . '/client/flexi-social/skins/grid/' . $stream_options['skin'] . '/' . $stream_options['skin'] . '.css';
            }

            $skin_stylesheet = "<link rel=\"stylesheet\" href=\"{$skin_stylesheet}\" />";
        }

        return (
            "<div id=\"$id\"></div>" .
            $skin_stylesheet .
            "<script>if (!('fl_instances' in window)) { window.fl_instances = {}; } window.fl_instances['$id'] = jQuery('#$id').flexySocialLite($stream_data);</script>"
        );
    }
}
