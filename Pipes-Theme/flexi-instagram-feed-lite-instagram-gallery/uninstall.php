<?php if (!defined('ABSPATH')) { exit; }

define('FLEXI_I_SOCIAL', __FILE__);
define('FLEXI_I_START_TIME', microtime(true));
define('FLEXI_I_IS_WP', true);

require __DIR__ . '/vendor/autoload.php';

define('FLEXI_I_PROOT', dirname(__FILE__));				// Plugin root.
define('FLEXI_I_CROOT', dirname(get_theme_root()));		// Content root.

define('FLEXI_I_PURL', plugins_url('', __FILE__));		// Plugin URL.
define('FLEXI_I_CURL', content_url());					// Content URL.

define('FLEXI_I_HOME_URL', get_home_url());					// Home page URL.

define('FLEXI_I_LANGUAGE', get_locale());
define('FLAppLite_BASE_URL', FLEXI_I_PURL);
define('FLAppLite_AJAX_URL', admin_url('admin-ajax.php'));

global $flexi_in_core;

$flexi_in_core = new \FLAppLite\WordPress\Core(__DIR__, plugin_basename(__FILE__));

try
{
    $flexi_in_core->uninstall();
}
catch (\Exception $ex)
{

}
