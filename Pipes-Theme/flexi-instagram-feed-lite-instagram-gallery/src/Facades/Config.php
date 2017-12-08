<?php

namespace FLAppLite\Facades;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Foundation\ConfigManager;

class Config extends Facade
{
    /**
     *  Get facade name.
     *
     *  @return string  Returns the name of the facade.
     */
    protected static function get_facade_name()
    {
        return 'config';
    }

    public static function init_facade()
    {
        $config_items = require_once(dirname(dirname(dirname(__FILE__))) . '/config/config.php');

        return new ConfigManager($config_items);
    }
}
