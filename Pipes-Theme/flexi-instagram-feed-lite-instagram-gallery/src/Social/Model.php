<?php

namespace FLAppLite\Social;

if (!defined('ABSPATH')) { exit; }

use ArrayAccess;
use JsonSerializable;

abstract class Model implements JsonSerializable, ArrayAccess
{
    /**
     *  Hold the model data.
     */
    private $attributes = [];

    /**
     *  Dynamically retrieve attributes.
     *
     *  @param  string  $key
     *
     *  @return mixed
     */
    public function __get($key)
    {
        return $this->attributes[$key];
    }

    /**
     *  Dynamically set attributes.
     *
     *  @param  string  $key
     *  @param  mixed   $value
     */
    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     *  Check if an attribute exists.
     *
     *  @param  string  $key
     *
     *  @return bool
     */
    public function __isset($key)
    {
        return isset($this->attributes[$key]);
    }

    /**
     *  Unset an attribute.
     *
     *  @param  string  $key
     */
    public function __unset($key)
    {
        unset($this->attributes[$key]);
    }

    /**
     *  Determine if the given attribute exists.
     *
     *  @param mixed    $offset
     */
    public function offsetExists($offset)
    {
        return isset($this->attributes[$offset]);
    }

    /**
     *  Get the value for a given offset.
     *
     *  @param  mixed   $offset
     *
     *  @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->attributes[$offset];
    }

    /**
     *  Set the value for a given offset.
     *
     *  @param  mixed   $offset
     *  @param  mixed   $value
     */
    public function offsetSet($offset, $value)
    {
        $this->attributes[$offset] = $value;
    }

    /**
     *  Unset the value for a given offset.
     *
     *  @param  mixed    $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }

    /**
     *  Convert the object into something JSON serializable.
     *
     *  @return array
     */
    public function jsonSerialize()
    {
        return $this->attributes;
    }
}
