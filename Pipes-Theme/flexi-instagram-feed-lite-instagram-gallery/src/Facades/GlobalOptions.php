<?php

namespace FLAppLite\Facades;

if (!defined('ABSPATH')) { exit; }

class GlobalOptions extends Facade
{
    /**
     *  Get facade name.
     *
     *  @return string  Returns the name of the facade.
     */
    protected static function get_facade_name()
    {
        return 'global-options';
    }

    public static function init_facade()
    {
        return new \FLAppLite\Foundation\GlobalOptions();
    }
}
