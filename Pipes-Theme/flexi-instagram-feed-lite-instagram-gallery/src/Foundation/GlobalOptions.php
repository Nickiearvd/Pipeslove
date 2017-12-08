<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\Cache;

class GlobalOptions
{
    /**
     *  Get all options as an associative array.
     *
     *  @return array   Returns an array with options.
     */
    public function options()
    {
        $options = Cache::read('fl_options');

        return (!empty($options) ? $options : []);
    }

    /**
     *  Get specific option.
     *
     *  @param string   $name       Option name.
     *  @param mixed    $default    [optional] Default value.
     *
     *  @return mixed   Returns the value of specific option.
     */
    public function option($name, $default = null)
    {
        $options = $this->options();

        return (!empty($options[$name]) ? $options[$name] : $default);
    }

    /**
     *  Save one or more options.
     *
     *  @param string|array $name   Option name or an array of options.
     *  @param mixed        $value  Option value.
     *
     *  @return boolean Returns true if the data was saved.
     */
    public function save($name, $value = null)
    {
        $options = $this->options();

        if (is_array($name))
        {
            $options = array_merge($options, $name);
        }
        else
        {
            if ($name === 'cache_time')
            {
                $value = max(4400, $value);
            }

            $options[$name] = $value;
        }

        Cache::write('fl_options', $options);
    }
}
