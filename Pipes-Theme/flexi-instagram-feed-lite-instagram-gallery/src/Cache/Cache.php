<?php

namespace FLAppLite\Cache;

if (!defined('ABSPATH')) { exit; }

class Cache
{
    /**
     *  Stores the file cache handler.
     *
     *  @var \FLAppLite\Cache\Interfaces\CacheHandlerInterface
     */
    protected $handler;

    /**
     *  Create cache engine.
     */
    public function __construct()
    {
        $this->handler = $this->get_best_handler();
    }

    /**
     *  Write entry to cache.
     *
     *  @param string   $name   Unique name where to write.
     *  @param mixed    $data   Data to write to cache.
     *
     *  @return bool    Returns true if the entry was written, otherwise false.
     */
    public function write($name, $data)
    {
        if (!$this->handler)
        {
            return ;
        }

        return $this->handler->write($name, $data);
    }

    /**
     *  Read entry from cache.
     *
     *  @param string   $name   Name of the entry to read.
     *
     *  @return bool|mixed  Returns the content of the cache or false on failure.
     */
    public function read($name)
    {
        if (!$this->handler)
        {
            return ;
        }

        return $this->handler->read($name);
    }

    /**
     *  Remove all cache data.
     */
    public function clear()
    {
        if (!$this->handler)
        {
            return ;
        }

        $this->handler->clear();
    }

    /**
     *  Determine the best cache handler.
     *
     *  @return \FLAppLite\Cache\Interfaces\CacheHandlerInterface
     */
    protected function get_best_handler()
    {
        $file_handler = new FileCache;

        return $file_handler;

        if ($file_handler->is_writable())
        {
            return $file_handler;
        }

        return new DBCache;
    }
}
