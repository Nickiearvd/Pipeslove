<?php

namespace FLAppLite\Cache;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Cache\Interfaces\CacheHandlerInterface;

class DBCache implements CacheHandlerInterface
{
    /**
     *  Stores a reference to $wpdb.
     *
     *  @var WP_Db
     */
    protected $wpdb;

    /**
     *  Stores the table name.
     *
     *  @var string
     */
    protected $table;

    /**
     *  Create FileCache object.
     */
    public function __construct($cache_directory)
    {
        global $wpdb;

        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . 'flexi_i_lite_cache';

        if (!$this->table_exists())
        {
            $this->try_to_create_db_table();
        }
    }

    /**
     *  Check if the table exists.
     *
     *  @return bool    Returns true if the table exists, false otherwise.
     */
    public function table_exists()
    {
        return $this->wpdb->get_var('SHOW TABLES LIKE \'' . $this->table . '\'') !==  $this->table;
    }

    /**
     *  Check if the cache is writable.
     *
     *  @return bool    Returns true if the cache is writable.
     */
    public function is_writable()
    {
        return $this->table_exists();
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
        return $this->wpdb->replace($this->table, array
        (
            'name'  => md5($name),
            'data'  => serialize($data)
        ));
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
        $data = $this->wpdb->get_row('SELECT * FROM ' . $this->table . ' WHERE name=\'' . md5($name) .'\'');

        if ($data === NULL)
        {
            return false;
        }

        return unserialize($data->data);
    }

    /**
     *  Remove all cache data.
     */
    public function clear()
    {
    }

    /**
     *  Try to create the database table.
     *
     *  @param bool Returns true on success, false otherwise.
     */
    protected function try_to_create_db_table()
    {
        $collate = '';

        if ($this->wpdb->has_cap('collation'))
        {
            $collate = $this->wpdb->get_charset_collate();
        }

        $query = "
        CREATE TABLE {$this->table}
        (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            data TEXT NOT NULL,
            PRIMARY KEY (id)
        ) $collate";

        return $this->wpdb->query($query);
    }
}
