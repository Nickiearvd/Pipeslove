<?php

namespace FLAppLite\WordPress;

if (!defined('ABSPATH')) { exit; }

use FLAppLite\Foundation\Application;
use FLAppLite\Facades\View;
use FLAppLite\Facades\Route;
use FLAppLite\Facades\GlobalOptions;
use FLAppLite\Facades\Cache;

class Core
{
    public $app;

    /**
     *  Application base path.
     *
     *  @var string
     */
    protected $base_path;

    /**
     *  Plugin base name.
     *
     *  @var {string}
     */
    protected $base_name;

    /**
     *  Keep notices.
     *
     *  @var array
     */
    protected $notices = array();

    /**
     *  Initialize hooks.
     */
    public function __construct($base_path, $base_name)
    {
        $this->base_path = $base_path;
        $this->base_name = $base_name;

        $this->app = new Application($base_path);

        new Shortcode;

        // Load routes.
        include_once(FLEXI_I_PROOT . '/src/routes.php');

        add_action('wp_enqueue_scripts', [&$this, 'load_client_scripts']);
        add_action('admin_menu', [&$this, 'change_admin_menu']);
        //
        add_action('wp_ajax_flexi-request', [&$this, 'flexi_request_action']);
        add_action('wp_ajax_nopriv_flexi-request', [&$this, 'flexi_request_action']);
        add_action('admin_notices', [&$this, 'admin_notices']);
        add_filter('plugin_action_links_'  . $base_name, [&$this, 'add_action_links']);
        add_action('admin_enqueue_scripts', [$this, 'load_admin_scripts']);
        add_action('flexi_instagram_lite_notices_hook', [&$this, 'request_update_notices']);

        register_activation_hook($base_path . DIRECTORY_SEPARATOR . basename($base_name), [&$this, 'activate_plugin']);
        register_deactivation_hook($base_path . DIRECTORY_SEPARATOR . basename($base_name), [&$this, 'deactivate_plugin']);
    }

    /**
     *  Load client scripts.
     */
    public function load_client_scripts()
    {
        // If the jQuery is not already included, include it.
    	if (!wp_script_is('jquery'))
    	{
    		wp_enqueue_script('jquery');
    	}

        wp_enqueue_style('flexy-base-style', FLEXI_I_CLIENT_URL . '/skins/assets/css/base.css?v=1.7.2');

        if (defined('WP_DEBUG') && WP_DEBUG && file_exists(FLEXI_I_PROOT . '/client/flexi-social/flexy-social.js'))
        {
            wp_enqueue_script('flexy-social-script', FLEXI_I_CLIENT_URL . '/flexy.social.js?v=1.7.2', array('jquery'));
        }
        else
        {
            wp_enqueue_script('flexy-social-script', FLEXI_I_CLIENT_URL . '/flexy.social.min.js?v=1.7.2', array('jquery'));
        }
    }

    /**
     *  Load admin scripts.
     */
    public function load_admin_scripts($hook)
    {
        global $flexi_i_admin_page;

        if ($hook !== $flexi_i_admin_page)
        {
            return ;
        }

        if (file_exists(FLEXI_I_PROOT . '/assets/css/style.css'))
        {
            wp_enqueue_style('flexy-admin-style', FLEXI_I_PURL . '/assets/css/style.css?v=1.7.2');
        }

        wp_enqueue_script('flexy-instagram-admin-script', FLEXI_I_PURL . '/assets/js/script.js?v=1.7.2', array('jquery'), false, true);

        $wp_ajax_nonce = wp_create_nonce('flexi-i-nonce');

        wp_localize_script('flexy-instagram-admin-script', 'FLEXI_I_BASE_URL', FLEXI_I_BASE_URL);
        wp_localize_script('flexy-instagram-admin-script', 'FLEXI_I_AJAX_URL', FLEXI_I_AJAX_URL . '?fs=' . $wp_ajax_nonce);
    }

    /**
     *  Change admin menu.
     */
    public function change_admin_menu()
    {
        $load_icon = 'data:image/svg+xml;base64,' . base64_encode(file_get_contents(FLEXI_I_PROOT . '/assets/images/logo.svg'));

        global $flexi_i_admin_page;

        $flexi_i_admin_page = add_menu_page(__('Flexi Instagram Feed Lite', 'flexi-instagram-feed-lite-instagram-gallery'), __('Flexi Instagram Feed Lite', 'flexi-instagram-feed-lite-instagram-gallery'), 'manage_options', 'flex-instagram-feed', [&$this, 'main_page'], $load_icon);
    }

    /**
     *  Render main page.
     */
    public function main_page()
    {
        View::load('wp');
    }

    /**
     *  Handle ajax requests.
     */
    public function flexi_request_action()
    {
        $path = $_GET['path'];

        $public_paths = [];

        check_ajax_referer('flexi-i-nonce', 'fs');

        if (array_search($path, $public_paths) === false && !is_user_logged_in())
        {
            die();
        }

        Route::execute($path);

        die();
    }

    /**
     *  Show notifications on admin side.
     */
    public function admin_notices()
    {
        if (empty($this->notices))
        {
            $this->notices = get_option('flexi-instagram-lite-update-notices', []);
        }

        if (!empty($this->notices))
        {
            foreach ($this->notices as $notice)
            {
                $notice = (object) $notice;

                if (!empty($notice->template))
                {
                    switch ($notice->template)
                    {
                    case 'error':
                        echo '<div class="ss-error-nag">' . $notice->message . '</div>';
                        break;

                    case 'update':
                        echo '<div class="update-nag">' . $notice->message . '</div>';
                        break;

                    case 'info':
                    default:
                        echo '<div class="ss-info-nag">' . $notice->message . '</div>';
                        break;
                    }
                }
                else if (isset($notice->html))
                {
                    echo $notice->html;
                }
            }
        }
    }

    /**
     *  Add custom action links to plugin in plugin list.
     */
    public function add_action_links($links)
    {
        return array_merge(
        [
            '<a href="' . FLEXI_GO_PRO_URL . '" target="_blank" style="color:#ff5828">Upgrade to PRO</a>',
            '<a href="' . admin_url('admin.php?page=flex-instagram-feed') . '">Settings</a>'
        ], $links);
    }

    /**
     *  Run plugin installation.
     */
    public function install()
    {
        if (!GlobalOptions::option('access_token', null))
        {
            GlobalOptions::save(
            [
                'cache_time'                => 30,
                'moderation'                => true,
                'profanity_moderation'      => '',
                'disable_lazy_load'         => false,
                'moderate_roles'            => 'administrator',
                'remove_data_on_uninstall'  => false,
                'access_token'              => ''
            ]);
        }
    }

    /**
     *  Uninstall plugin.
     */
    public function uninstall($force = false)
    {
        if ((int)GlobalOptions::option('remove_data_on_uninstall', 0))
        {
            Cache::clear();
        }
    }

    /**
     *  Called when the plugin is activated.
     */
    public function activate_plugin()
    {
        if (!wp_next_scheduled('flexi-instagram-lite-update-notices'))
        {
            wp_schedule_event(time(), 'daily', 'flexi_instagram_lite_notices_hook');
        }
    }

    /**
     *  Called when the plugin is deactivated.
     */
    public function deactivate_plugin()
    {
        wp_clear_scheduled_hook('flexi_instagram_lite_notices_hook');
    }

    /**
     *  Request update notifications.
     */
    private function request_update_notices()
    {
        $response = wp_remote_get('https://www.wpdancers.com/api/?call=notices&product=flexi-instagram&version=lite');

        if (is_array($response))
        {
            if (!is_wp_error($response) || wp_remote_retrieve_response_code($response) === 200)
            {
                $data = json_decode(wp_remote_retrieve_body($response));

                if (isset($data->notices))
                {
                    $this->notices = $data->notices;

                    update_option('flexi-instagram-lite-update-notices', $data->notices);
                }
                else if (empty($data))
                {
                    update_option('flexi-instagram-lite-update-notices', []);
                }
            }
        }
    }
}
