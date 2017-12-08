<?php

namespace FLAppLite\Facades;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Cache\Cache as CacheM;

class Cache extends Facade
{
    /**
     *  Get facade name.
     *
     *  @return string  Returns the name of the facade.
     */
    protected static function get_facade_name()
    {
        return 'cache';
    }

    public static function init_facade()
    {
        return new CacheM();
    }
}
