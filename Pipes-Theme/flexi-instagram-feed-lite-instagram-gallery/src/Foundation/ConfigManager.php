<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

class ConfigManager
{
    /**
     *  Configuration items.
     *
     *  @var array
     */
    protected $items = [];

    /**
     *  Create a new configuration manager.
     *
     *  @param  array $items    The config items.
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     *  Get configuration value.
     *
     *  @param  string  $key        The config key.
     *  @param  mixed   [$default]  Default value in case the key is not found.
     *
     *  @return mixed   Returns the configuration value for that key.
     */
    public function get($key, $default = null)
    {
        if (is_null($key))
        {
            return $this->items;
        }

        $parts = explode('.', $key);

        $array = $this->items;

        foreach ($parts as $part)
        {
            if (isset($array[$part]))
            {
                $array = $array[$part];
            }
            else
            {
                return $default;
            }
        }

        return $array;
    }
}
