<?php

namespace FLAppLite\Facades;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Foundation\FieldBuilder;

class Field extends Facade
{
    /**
     *  Get facade name.
     *
     *  @return string  Returns the name of the facade.
     */
    protected static function get_facade_name()
    {
        return 'field';
    }

    public static function init_facade()
    {
        return new FieldBuilder;
    }
}
