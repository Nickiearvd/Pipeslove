<?php if (!defined('ABSPATH')) { exit; }
    $access_token = \FLAppLite\Facades\GlobalOptions::option('access_token');
    $is_token_valid = (new \FLAppLite\Social\Instagram($access_token))->validate_token();?><div class="flexi-main"><header class="flexi-main-header"><div class="flexi-top-section"><a href="#" class="flexi-logo">Flexi Instagram Feed</a></div><nav class="flexi-nav-section"><a href="#" class="flexi-nav-item flexi-selected">My Streams</a> <a href="#" class="flexi-nav-item">Config</a> <a href="#" class="flexi-nav-item<?php echo (!$is_token_valid ? ' flexi-wrong-settings' : ''); ?>">Auth</a> <a href="#" class="flexi-nav-item">Support</a><!-- <a href="#" class="flexi-nav-item">Feedback</a> --></nav></header><section class="flexi-main-content"><article class="flexi-panel flexi-panel-streams flexi-visible"><div class="flexi-stream-list-holder"><h1 class="flexi-page-title">List of your streams</h1><p class="flexi-page-subtitle">ordered by created date</p><div class="flexi-stream-list"><a href="#" class="flexi-create-stream"><span>Create stream</span><!--
                        <div class="flexi-upgrade-to-pro">
                            <p>You can create unlimited streams only in PRO version.</p>
                            <span class="flexi-upgrade-to-pro-button">Upgrade to pro</span>
                        </div>
                        --> </a> <?php $streams = \FLAppLite\Facades\StreamData::streams(); ?> <?php foreach ($streams as $stream) : ?> <div class="flexi-stream" data-stream="<?php echo $stream['id']; ?>"><div class="flexi-top-section"><div class="flexi-top-icons"><i class="flexi-icon-instagram" title="Instagram"></i> <i class="flexi-icon-<?php echo $stream['layout']; ?>" title="<?php echo ucfirst($stream['layout']); ?> layout"></i> <?php
                                        $classes = [];

                                        foreach ($stream['feeds'] as $feed)
                                        {
                                            $classes[$feed['type']] = 'flexi-icon-' . $feed['type'];
                                        }
                                    ?> <?php foreach ($classes as $type => $class): ?> <i class="<?php echo $class; ?>" title="<?php echo ucfirst($type); ?>"></i> <?php endforeach; ?> </div><h1><?php echo date('F', strtotime($stream['created_at'])); ?> <span><?php echo date('Y', strtotime($stream['created_at'])); ?></span></h1></div><div class="flexi-bottom-section"><h2><?php echo $stream['name']; ?></h2><div class="flexi-stream-actions"><a href="#" class="flexi-action-shortcode">Shortcode</a> <a href="#" class="flexi-action-settings<?php echo (isset($stream->wrong) && $stream->wrong ? ' flexi-wrong-settings' : ''); ?>">Settings</a> <a href="#" class="flexi-action-remove">Remove</a></div><button class="flexi-edit-stream">View &amp; edit</button></div></div> <?php endforeach; ?> </div></div></article><article class="flexi-panel flexi-panel-settings"><h1 class="flexi-page-title"><span class="flexi-main-title">Global Settings</span> <span class="flexi-secondary-title">Applied to all grids</span></h1><div class="flexi-fields-holder"> <?php $options = \FLAppLite\Facades\GlobalOptions::options(); ?> <?php echo $field::input_text_field([
                    'id'            => 'cache-time',
                    'label'         => 'Cache time',
                    'only-in-pro'   => true,
                    'class'         => 'flexi-type-number',
					'description'   => 'Recommended time: 30 min',
                    'value'         => '24h'
                    // 'value'         => $options['cache_time']
                ]); ?> <span class="flexi-separator"></span> <?php echo $field::switch_field([
                    'id'        => 'moderation',
                    'label'     => 'Moderation',
                    'only-in-pro'   => true,
					//'description' => 'enable or disable the moderation',
                    'toggled'   => $options['moderation']
                ]); ?> <span class="flexi-separator"></span> <?php echo $field::profanity_field([
                    'id'            => 'profanity-filter',
                    'label'         => 'Profanity moderation auto filter',
                    'only-in-pro'   => true,
                    'description'   => 'Posts containing specific inappropriate words will not be displayed. Use commas to delimitate the chosen words',
                    'value'         => $options['profanity_moderation']
                ]); ?> <span class="flexi-separator"></span> <?php echo $field::switch_field([
                    'id'        => 'disable-lazy-load',
                    'label'     => 'Disable lazy load',
                    'only-in-pro'   => true,
					'description' => 'Images outside of viewport are not loaded until scroll.',
                    'toggled'   => $options['disable_lazy_load']
                ]); ?> <span class="flexi-separator"></span> <?php /*echo $field::checkbox_group_field([
                    'label'         => 'User roles able to moderate',
                    'description'   => 'User roles indicates who\'s allowed to moderate the stream and approve new posts. Default: Administrator.',
                    'items'         =>
                    [
                        [
                            'id'        => 'flexi-role-administrator',
                            'caption'   => 'Administrator',
                            'checked'   => strpos($options['moderate_roles'], 'administrator') !== false
                        ],
                        [
                            'id'        => 'flexi-role-editor',
                            'caption'   => 'Editor',
                            'checked'   => strpos($options['moderate_roles'], 'editor') !== false
                        ],
                        [
                            'id'        => 'flexi-role-contributor',
                            'caption'   => 'Contributor',
                            'checked'   => strpos($options['moderate_roles'], 'contributor') !== false
                        ],
                        [
                            'id'        => 'flexi-role-author',
                            'caption'   => 'Author',
                            'checked'   => strpos($options['moderate_roles'], 'author') !== false
                        ],
                        [
                            'id'        => 'flexi-role-subscriber',
                            'caption'   => 'Subscriber',
                            'checked'   => strpos($options['moderate_roles'], 'subscriber') !== false
                        ]
                    ]
                ]);*/ ?> <!-- <span class="flexi-separator"></span> --> <?php echo $field::switch_field([
                    'id'        => 'remove-all-on-uninstall',
                    'label'     => 'Remove all data when uninstall the plugin',
					'description' => 'Click YES only if you want to delete all database data Flexi Plugin created. You cannot undone this',
                    'toggled'   => $options['remove_data_on_uninstall']
                ]); ?> </div></article><article class="flexi-panel flexi-panel-auth"><h1 class="flexi-page-title flexi-auth-title-connect<?php echo ($is_token_valid ? '' : ' flexi-visible'); ?>"><span class="flexi-main-title">You are disconnected</span> <span class="flexi-secondary-title">Disconnected</span></h1><h1 class="flexi-page-title flexi-auth-title-connected<?php echo ($is_token_valid ? ' flexi-visible' : ''); ?>"><span class="flexi-main-title">You are connected</span> <span class="flexi-secondary-title">Connected</span></h1><div class="flexi-panel-inner-content"><div class="flexi-auth-connect<?php echo ($is_token_valid ? '' : ' flexi-visible'); ?>"><h2>Connect your instagram account</h2><p>you need to link your instagram account in order for us to collect data on your behalf.</p><p>you only need to do this once and no data will be sent to your instagram withouth further permission from you.</p><a href="#" class="flexi-connect-instagram">Connect Instagram and get my access token</a></div><div class="flexi-auth-connected<?php echo ($is_token_valid ? ' flexi-visible' : ''); ?>"><h2>You are connected to INSTAGRAM as <span class="flexi-auth-name"></span></h2><p>you need to link your instagram account in order for us to collect data on your behalf.</p><p>you only need to do this once and no data will be sent to your instagram withouth further permission from you.</p><div class="flexi-disconnect-parent"><a href="#" class="flexi-disconnect-account">Disconnect account</a></div><p class="flexi-error">There is a problem with your token. Please re-authenticate.</p></div></div></article><article class="flexi-panel flexi-panel-support"><h1 class="flexi-page-title flexi-auth-title-connected flexi-visible"><span class="flexi-main-title">Support</span> <span class="flexi-secondary-title">...</span></h1><div class="flexi-panel-inner-content"><img src="<?php echo FLEXI_I_PURL; ?>/assets/images/support-banner-pro.jpg"><h2>Support</h2><p>See below for a short video demonstrating how to set up, customize and use the plugin, pro version</p><div class="flexi-videos-holder"><a href="#" class="flexi-support-video" data-video="M6G6ltUFDG4"><h2>How to customize a stream (PRO)</h2><img src="https://i.ytimg.com/vi/M6G6ltUFDG4/maxresdefault.jpg"></a><a href="#" class="flexi-support-video" data-video="kS1icRMtH6g"><h2>How to moderate(PRO)</h2><img src="https://i.ytimg.com/vi/kS1icRMtH6g/maxresdefault.jpg"></a></div><div class="checklist-before-support"><h2>Before submitting a request, be sure that:</h2><p>1) Make sure you are running the <b>latest version of our plugin</b></p><p>2) Check if you find the answer in our videos documentation</p><p>3) Disable any 3rd party plugins you may be using and see if this fixes the issue</p></div><div class="support-info-includes"><div class="support-include"><h2>Support includes</h2><p><span>&#x2714;</span> Installation of the item</p><p><span>&#x2714;</span> Responding to questions regarding the plugin’s features</p><p><span>&#x2714;</span> Assistance with reported bugs and issues	related to our plugin</p><p><span>&#x2714;</span> Providing updates and maintain compatibility with new wordpress versions</p></div><div class="support-not-include"><h2>Support doesn`t include</h2><p><span>&#x2716;</span> Requests to modify the plugin</p><p><span>&#x2716;</span> Support for 3rd party issues plugins</p></div></div><p class="disclaimer-support" style="color: white">You can expect a response within 3-4 days (Monday to Friday)</p><form class="flexi-support-form" action="" method="GET"><label for="flexi-request-type">Request type</label><select id="flexi-request-type" name="flexi-request-type"><option value="bug-report">Bug report</option><option value="new-feature">New feature</option></select><input type="text" id="flexi-name" name="flexi-name" placeholder="Your name"> <input type="email" id="flexi-email" name="flexi-email" placeholder="E-mail" value="<?php echo (function_exists('get_option') ? get_option('admin_email') : ''); ?>"> <input type="text" id="flexi-website" name="flexi-website" placeholder="Website" value="<?php echo (function_exists('home_url') ? home_url() : ''); ?>"><textarea id="flexi-issue-description" name="flexi-issue-description" placeholder="Issue description"></textarea><p>- try to be as specific as you can and provide step-by-step description to reproduce the issue</p><p>- make sure to add the url of the page on which you have an issue.</p><input type="submit" value="Submit Request"></form></div></article></section></div>