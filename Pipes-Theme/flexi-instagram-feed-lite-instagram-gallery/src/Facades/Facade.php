<?php

namespace FLAppLite\Facades;

if (!defined('ABSPATH')) { exit; }

abstract class Facade
{
    /**
     *  Class instances.
     *
     *  @var array
     */
    protected static $instances = [];

    /**
     *  Get facade name.
     *
     *  @codeCoverageIgnore
     *
     *  @return string  Returns the name of the facade.
     */
    protected static function get_facade_name()
    {
        return '';
    }

    /**
     *  Run init facade function.
     */
    protected static function run_init_facade()
    {
        static::$instances[static::get_facade_name()] = static::init_facade();
    }

    /**
     *  Call function on the instance.
     */
    public static function __callStatic($name, $arguments)
    {
        if (empty(static::$instances[static::get_facade_name()]))
        {
            static::run_init_facade();
        }

        return call_user_func_array(array(static::$instances[static::get_facade_name()], $name), $arguments);
    }
}
