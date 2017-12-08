<?php

namespace FLAppLite\Facades;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Foundation\ViewManager;

class View extends Facade
{
    /**
     *  Get facade name.
     *
     *  @return string  Returns the name of the facade.
     */
    protected static function get_facade_name()
    {
        return 'view';
    }

    public static function init_facade()
    {
        return new ViewManager(dirname(dirname(dirname(__FILE__))) . '/views');
    }
}
