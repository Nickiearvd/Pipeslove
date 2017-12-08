<?php

namespace FLAppLite\Foundation;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Facades\View;
use FLAppLite\Facades\Component;
use FLAppLite\Facades\Field;

class ViewManager
{
    /**
     *  Views path.
     *
     *  @var string
     */
    protected $views_path;

    /**
     *  Create view manager.
     *
     *  @param  string  $path   Views path.
     */
    public function __construct($path)
    {
        $this->views_path = $path;
    }

    /**
     *  Load view.
     *
     *  @param  string  $name   View name.
     *  @param  array   $data   Data to pass to the view.
     */
    public function load($name, $data = null)
    {
        if (!is_null($data))
        {
            extract($data);
        }

        extract([
            'view'      => 'FLAppLite\Facades\View',
            'component' => 'FLAppLite\Facades\Component',
            'field'     => 'FLAppLite\Facades\Field'
        ]);

        include($this->views_path . '/' . $name . '.php');
    }
}
