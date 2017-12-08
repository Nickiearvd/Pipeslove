<?php

namespace FLAppLite\Cache\Interfaces;

if (!defined('ABSPATH')) { exit; }

interface CacheHandlerInterface
{
    /**
     *  Write entry to cache.
     *
     *  @param string   $name   Unique name where to write.
     *  @param mixed    $data   Data to write to cache.
     *
     *  @return bool    Returns true if the entry was written, otherwise false.
     */
    public function write($name, $data);

    /**
     *  Read entry from cache.
     *
     *  @param string   $name   Name of the entry to read.
     *
     *  @return bool|mixed  Returns the content of the cache or false on failure.
     */
    public function read($name);
}
