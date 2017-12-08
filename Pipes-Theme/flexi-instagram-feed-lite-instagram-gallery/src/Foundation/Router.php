<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

class Router
{
    /**
     *  Routes.
     *
     *  @var array
     */
    protected $routes = [];

    /**
     *  Add route.
     *
     *  @param string   $path       Route to register.
     *  @param callable $callback   Callback to execute when route is accessed.
     *
     *  @return \FLAppLite\Foundation\Router
     */
    public function path($path, $callback)
    {
        $this->routes[$path] = $callback;

        return $this;
    }

    /**
     *  Execute the route by path.
     *
     *  @param string   $path   - The current path.
     *
     *  @return \FLAppLite\Foundation\Router
     */
    public function execute($path)
    {
        if (isset($this->routes[$path]))
        {
            $return = $this->routes[$path]();

            if (is_array($return) || is_object($return))
            {
                echo json_encode($return);
            }
            else if (is_string($return))
            {
                echo $return;
            }
        }

        return $this;
    }
}
