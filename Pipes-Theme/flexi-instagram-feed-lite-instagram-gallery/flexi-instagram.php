<?php if (!defined('ABSPATH')) { exit; }
/*
 *  @wordpress-plugin
 *  Plugin Name: Flexi Instagram Feed Lite
 *  Plugin URI: https://www.wpdancers.com/products/flexi-instagram-gallery-feed/
 *  Description: Flexi Instagram Feed for WordPress
 *  Author: WP Dancers
 *  Author URI: https://www.wpdancers.com/
 *  Version: 1.7.2
 *  Text Domain: flexi-instagram-feed-lite-instagram-gallery
 *
 *  Copyright (c) 2017 by WP Dancers. All rights reserved.
 */

define('FLEXI_I_SOCIAL', __FILE__);
define('FLEXI_I_START_TIME', microtime(true));
define('FLEXI_I_IS_WP', true);
define('FLEXI_I_VERSION', '1.0.0');

require __DIR__ . '/vendor/autoload.php';

define('FLEXI_I_PROOT', dirname(__FILE__));				// Plugin root.
define('FLEXI_I_CROOT', dirname(get_theme_root()));		// Content root.

define('FLEXI_I_PURL', plugins_url('', __FILE__));		// Plugin URL.
define('FLEXI_I_CURL', content_url());					// Content URL.

define('FLEXI_I_HOME_URL', get_home_url());					// Home page URL.

define('FLEXI_I_LANGUAGE', get_locale());
define('FLEXI_I_DOING_AJAX', defined('DOING_AJAX') && DOING_AJAX);
define('FLEXI_I_BASE_URL', FLEXI_I_PURL);
define('FLEXI_I_AJAX_URL', admin_url('admin-ajax.php'));
define('FLEXI_I_CLIENT_URL', FLEXI_I_BASE_URL . '/client/flexi-social');

define('FLEXI_GO_PRO_URL', 'https://www.wpdancers.com/go/flexi-instagram ');

if (defined('WP_DEBUG') && WP_DEBUG)
{
    ini_set('display_errors', 1);
}

global $flexi_in_core;

$flexi_in_core = new \FLAppLite\WordPress\Core(__DIR__, plugin_basename(__FILE__));

function flexi_activate_plugin()
{
    global $flexi_in_core;

    $flexi_in_core->install();
}

register_activation_hook(__FILE__, 'flexi_activate_plugin');

function flexi_instagram_load_plugin_textdomain()
{
    load_plugin_textdomain('flexi-instagram-feed-lite-instagram-gallery', false, basename(dirname(__FILE__)) . '/languages/');
}

add_action('plugins_loaded', 'flexi_instagram_load_plugin_textdomain');
