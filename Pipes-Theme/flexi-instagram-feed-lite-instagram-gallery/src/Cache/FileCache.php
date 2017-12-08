<?php

namespace FLAppLite\Cache;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Cache\Interfaces\CacheHandlerInterface;

class FileCache implements CacheHandlerInterface
{
    /**
     *  Stores cache file locations.
     *
     *  @var string
     */
    protected $cache_directory;

    /**
     *  Create FileCache object.
     */
    public function __construct()
    {
        $this->cache_directory = FLEXI_I_CROOT . '/uploads/flexi-i-lite';

        if (!file_exists($this->cache_directory))
        {
            wp_mkdir_p($this->cache_directory);
        }
    }

    /**
     *  Check if the cache is writable.
     *
     *  @return bool    Returns true if the cache is writable.
     */
    public function is_writable()
    {
        return is_writable($this->cache_directory);
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
        return @file_put_contents($this->cache_directory . '/' . md5($name) . '.flic', serialize($data)) !== false;
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
        $data = @file_get_contents($this->cache_directory . '/' . md5($name) . '.flic');

        if ($data === false)
        {
            return false;
        }

        return unserialize($data);
    }

    /**
     *  Remove all cache files.
     */
    public function clear()
    {
        try
        {
            flexi_remove_files($this->cache_directory);
        }
        catch (\Exception $ex)
        {
        }
    }
}
