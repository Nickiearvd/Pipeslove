<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\Config;

class Application
{
    /**
     *  Application base path.
     *
     *  @var string
     */
    protected $base_path;

    /**
     *  The base URL.
     *
     *  @var string
     */
    public $base_url;

    /**
     *  Create main application instance.
     */
    public function __construct($base_path = null)
    {
        $this->base_path = $base_path;
        $this->base_url = $this->get_base_url();

        $this->init();
    }

    /**
     *  Get called path.
     *
     *  @return string  Returns called path.
     */
    public function get_called_path()
    {
        if (isset($_SERVER['argv']))
        {
            return '';
        }

        $filename = basename($_SERVER['SCRIPT_FILENAME']);
        $base_url = '';

        if (basename($_SERVER['SCRIPT_NAME']) === $filename)
        {
            $base_url = $_SERVER['SCRIPT_NAME'];
        }
        else if (basename($_SERVER['PHP_SELF']) === $filename)
        {
            $base_url = $_SERVER['PHP_SELF'];
        }
        else if (basename($_SERVER['ORIG_SCRIPT_NAME']) === $filename)
        {
            $base_url = $_SERVER['ORIG_SCRIPT_NAME'];
        }

        $called_path = str_replace(dirname($base_url), '', (isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ''));
        $called_path = explode('?', $called_path);

        return $called_path[0];
    }

    /**
     *  Initialize.
     */
    private function init()
    {
    }

    /**
     *  Get base URL.
     *
     *  @return string  Returns the base URL.
     */
    private function get_base_url()
    {
        if (isset($_SERVER['argv']))
        {
            return '';
        }

        $filename = basename($_SERVER['SCRIPT_FILENAME']);
        $base_url = '';

        if (basename($_SERVER['SCRIPT_NAME']) === $filename)
        {
            $base_url = $_SERVER['SCRIPT_NAME'];
        }
        else if (basename($_SERVER['PHP_SELF']) === $filename)
        {
            $base_url = $_SERVER['PHP_SELF'];
        }
        else if (basename($_SERVER['ORIG_SCRIPT_NAME']) === $filename)
        {
            $base_url = $_SERVER['ORIG_SCRIPT_NAME'];
        }

        $base_url = str_replace($filename, '', $base_url);

        return (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$base_url";
    }
}
