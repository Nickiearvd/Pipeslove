<?php

namespace FLAppLite\WordPress;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\StreamData;

class Canvas
{
    /**
     *  Stream data.
     *
     *  @param array
     */
    protected $stream;

    /**
     *  Whether we are in moderate mode.
     *
     *  @param bool
     */
    protected $moderate_mode;

    /**
     *  Stores errors.
     *
     *  @param array
     */
    protected $errors = [];

    /**
     *  Stores grid available skins.
     *
     *  @param array
     */
    private $grid_skins =
    [
        'classic',
        'minimalist',
        'striped',
        'florid',
        'square',
        'versatile',
        'dotted',
        'elegant',
        'tidy',
        'balanced',
        'all-in-one'
    ];

    /**
     *  Initialize hooks.
     */
    public function __construct($id, $moderate_mode)
    {
        if ($moderate_mode && !flexi_is_allowed_to_moderate())
        {
            $this->errors[] = 'You are not allowed to moderate.';

            return ;
        }

        $this->stream = StreamData::stream_options($id, $moderate_mode);
        $this->moderate_mode = $moderate_mode;

        add_action('wp_print_scripts', [$this, 'render']);
    }

    /**
     *  Show the canvas.
     */
    public function render()
    {
        wp_register_style('flexy-base-style', FLEXI_I_CLIENT_URL . '/skins/assets/css/base.css', [], FLEXI_I_VERSION);

        // Load all grid skins.
        foreach ($this->grid_skins as $skin)
        {
            wp_enqueue_style('flexy-skin-grid-' . $skin, FLEXI_I_CLIENT_URL . '/skins/grid/' . $skin . '/' . $skin . '.css', [], FLEXI_I_VERSION);
        }

        wp_enqueue_style('flexy-base-style');
        wp_add_inline_style('flexy-base-style', 'body { overflow-y: auto !important; margin: 0; padding: 0; }');

        if (defined('WP_DEBUG') && WP_DEBUG && file_exists(FLEXI_I_PROOT . '/client/flexi-social/flexy-social.js'))
        {
            $flexy_social_script = FLEXI_I_CLIENT_URL . '/flexy.social.js';
        }
        else
        {
            $flexy_social_script = FLEXI_I_CLIENT_URL . '/flexy.social.min.js';
        }

        wp_enqueue_script('flexy-social-script', $flexy_social_script, ['jquery'], FLEXI_I_VERSION);
        wp_register_script('flexi-i-lite-canvas', FLEXI_I_PURL . '/assets/js/canvas.js', ['jquery', 'flexy-social-script'], FLEXI_I_VERSION);

        wp_enqueue_script('flexi-i-lite-canvas');
        wp_localize_script('flexi-i-lite-canvas', 'flexy_stream_data', $this->stream);
    }

    /**
     *  Whether the stream is a good stream id.
     *
     *  @return bool    Returns true if the stream is valid.
     */
    public function is_valid()
    {
        return !empty($this->stream);
    }

    /**
     *  Get errors.
     *
     *  @return array   Returns an array of error messages or empty array.
     */
    public function get_errors()
    {
        return $this->errors;
    }

    /**
     *  Print error messages.
     */
    public function print_errors()
    {
        echo implode('<br />', $this->get_errors());
    }
}
