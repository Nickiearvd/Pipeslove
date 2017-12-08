<?php

namespace FLAppLite\Facades;

if (!defined('ABSPATH')) { exit; }

class StreamData extends Facade
{
    /**
     *  Get facade name.
     *
     *  @return string  Returns the name of the facade.
     */
    protected static function get_facade_name()
    {
        return 'stream-data';
    }

    public static function init_facade()
    {
        return new \FLAppLite\Foundation\StreamData();
    }
}
