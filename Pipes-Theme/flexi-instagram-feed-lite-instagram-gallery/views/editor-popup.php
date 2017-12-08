<?php if (!defined('ABSPATH')) { exit; } ?> <div class="flexi-main-editor-popup"><div class="flexi-main-editor"><header class="flexi-editor-header"><a href="#" class="flexi-logo">Flexi Instagram Feed</a> <span class="flexi-header-separator"></span><h1 class="flexi-stream-name">Flexigram name</h1><a href="#" class="flexi-close-editor"></a><nav class="flexi-editor-tabs"> <?php if (flexi_is_allowed_to_moderate()) : ?> <a href="#" class="flexi-editor-tab-moderate" data-tab="moderate">Moderate</a> <?php endif; ?> <a href="#" class="flexi-editor-tab-edit flexi-selected" data-tab="edit">View &amp; edit</a><!-- <a href="#" class="flexi-editor-tab-analytics" data-tab="analytics">Analytics</a> --> <a href="#" class="flexi-editor-tab-settings" data-tab="settings">Settings</a> <a href="<?php echo FLEXI_GO_PRO_URL; ?>?utm_source=plugin&utm_medium=button&utm_campaign=Lite&utm_term=editortab" target="_blank" class="flexi-editor-tab-upgrade-to-pro">Upgrade to pro</a></nav></header><section class="flexi-editor-content"><div class="flexi-editor-tab flexi-moderate-tab" data-tab="moderate"><div class="flexi-save-notification flexi-visible"><p>This feature is just a preview. If you want to moderate you have to upgrade to <a href="<?php echo FLEXI_GO_PRO_URL; ?>?utm_source=plugin&utm_medium=button&utm_campaign=Lite&utm_term=moderate" target="_blank">Pro version</a>.</p></div><iframe class="flexi-moderate-iframe" frameborder="0"></iframe></div><div class="flexi-editor-tab flexi-view-edit-tab flexi-selected" data-tab="edit"><div class="flexi-editor-properties"><div class="flexi-properties-panel flexi-expanded"><h1>Look &amp; feel</h1><div class="flexi-panel-inner"><p class="flexi-field-section-title" data-title="Design"></p><section class="flexi-field-section"><div data-with-layout="slide"><div id="widget-size-width" class="flexi-field flexi-field-widget-size" style="border: none"><label for="widget-size-width-input">width</label><div class="flexi-input-holder" data-unit="px"><input type="text" id="widget-size-width-input" class="flexi-text-field flexi-type-number"></div><div class="flexi-widget-size-auto-holder"><label>responsive</label><label for="widget-size-width-auto" class="flexi-input-switch-holder"><input type="checkbox" id="widget-size-width-auto" checked="checked"> <span class="flexi-input-switch"><span class="flexi-thumb"></span></span></label></div></div><div id="widget-size-height" class="flexi-field flexi-field-widget-size" type="flexi-size-field"><label for="widget-size-height-input">height</label><div class="flexi-input-holder" data-unit="px"><input type="text" id="widget-size-height-input" class="flexi-text-field flexi-type-number"></div><div class="flexi-widget-size-auto-holder"><label>responsive</label><label for="widget-size-height-auto" class="flexi-input-switch-holder"><input type="checkbox" id="widget-size-height-auto" checked="checked"><span class="flexi-input-switch"><span class="flexi-thumb"></span></span></label></div></div></div> <?php echo $field::select_field([
                                    'id'            => 'transition',
                                    'label'         => 'Transition',
                                    'description'   => 'The transition effect used by the stream to load the posts in the viewport',
                                    'options'       =>
                                    [
                                        'none'              => 'None',
                                        'move-up'           => 'Move Up',
                                        'move-down'         => 'Move Down',
                                        'fade'              => 'Fade',
                                        'flip'              => 'Flip',
                                        'fly'               => 'Fly',
                                        'pop'               => 'Pop',
                                        'helix'             => 'Helix',
                                        'scale-up'          => 'Scale Up',
                                        'scale-down'        => 'Scale Down',
                                        'swipe-left'        => 'Swipe Left',
                                        'swipe-right'       => 'Swipe Right',
                                        'swipe-up-left'     => 'Swipe Up Left',
                                        'swipe-up-right'    => 'Swipe Up Right',
                                        'rotate-up'         => 'Rotate Up',
                                        'fall-perspective'  => 'Fall Perspective'
                                    ]
                                ]); ?> <?php echo $field::select_field([
                                    'id'            => 'card-skin',
                                    'label'         => 'Card Skin',
                                    'description'   => 'Choose the look and feel of your stream',
                                    'options'       =>
                                    [
                                        'classic'       => 'Classic',
                                        'minimalist'    => 'Minimalist',
                                        'striped'       => 'Striped',
                                        'florid'        => 'Florid',
                                        'square'        => 'Square',
                                        'versatile'     => 'Versatile',
                                        'dotted'        => 'Dotted',
                                        'elegant'       => 'Elegant',
                                        'tidy'          => 'Tidy',
                                        'balanced'      => 'Balanced',
                                        'all-in-one'    => 'All in one'
                                    ]
                                ]); ?> <?php echo $field::select_field([
                                    'id'            => 'lightbox-skin',
                                    'label'         => 'Lightbox Skin',
                                    'only-in-pro'   => true,
                                    'description'   => 'Choose one template for the lightbox. It will work only if the "Enable Lightbox" option is active',
                                    'options'       =>
                                    [
                                        'insta'         => 'Insta'
                                    ]
                                ]); ?> </section><p class="flexi-field-section-title" data-title="Card Settings"></p><section class="flexi-field-section"> <?php echo $field::select_field([
                                    'id'            => 'text-alignment',
                                    'label'         => 'Text alignment',
                                    'description'   => 'You will be able to align the text of items. It will apply only to photos description',
                                    'options'       =>
                                    [
                                        'left'      => 'Left',
                                        'center'    => 'Center',
                                        'right'     => 'Right',
                                        'justify'   => 'Justify'
                                    ]
                                ]); ?> <?php echo $field::select_field([
                                    'id'            => 'format-date-field',
                                    'label'         => 'Date format',
                                    'only-in-pro'   => true,
                                    'description'   => 'The creation date of the posts will be displayed based on your chosen format',
                                    'options'       =>
                                    [
                                        'short'     => 'Short'
                                    ]
                                ]); ?> <?php echo $field::switch_field([
                                    'id'            => 'square-photos-force-field',
                                    'label'         => 'Force square photos',
                                    'only-in-pro'   => true,
                                    'description'   => 'Force images to be square.',
                                    'toggled'       => false
                                ]); ?> <?php echo $field::switch_field([
                                    'id'            => 'hide-field-info',
                                    'label'         => 'Hide meta info',
                                    'only-in-pro'   => true,
                                    'description'   => 'Hide description, name and date fost each post',
                                    'toggled'       => false
                                ]); ?> <?php echo $field::switch_field([
                                    'id'            => 'hidetext-field',
                                    'label'         => 'Hide text',
                                    'only-in-pro'   => true,
                                    'description'   => 'Hide text content of each post.',
                                    'toggled'       => false
                                ]); ?> <?php echo $field::switch_field([
                                    'id'            => 'enable-lightbox-field',
                                    'label'         => 'Enable lightbox',
                                    'only-in-pro'   => true,
                                    'description'   => 'When inactive, clicking a card will redirect to the original post on Instagram.com. When active will open a lightbox.',
                                    'toggled'       => false
                                ]); ?> </section><p class="flexi-field-section-title" data-title="Grid"></p><section class="flexi-field-section"><div class="flexi-go-pro-banner"><a href="<?php echo FLEXI_GO_PRO_URL; ?>?utm_source=plugin&utm_medium=banner&utm_campaign=Lite&utm_term=layouts" target="_blank"><img src="<?php echo FLEXI_I_PURL;?>/assets/images/layouts-editor-banner-pro.jpg"></a></div><div data-with-layout="slide"> <?php echo $field::select_field([
                                        'id'                => 'slider-direction-dropdown',
                                        'label'             => 'Direction',
                                        'only-in-pro'   => true,
                                        'description'       => 'Choose the direction of the slide',
                                        'options'           =>
                                        [
                                            'horizontal'    => 'Horizontal'
                                        ]
                                    ]); ?> </div><div class="flexi-field flexi-only-in-pro flexi-disabled"><label data-not-with-layout="slide">Max No. of columns</label><label data-with-layout="slide">No. of columns</label><input type="text" id="number-of-cols" class="flexi-text-field flexi-type-number" disabled="disabled" style="width: 40px; float:right" value="8"><p class="flexi-description" data-not-with-layout="slide">Represents the max numbers of items per row. On low resolutions the no. of items will decrease to keep the look&feel of the grid.</p><p class="flexi-description" data-with-layout="slide">Represents the max numbers of items per row.</p></div><div data-with-layout="slide"><div class="flexi-field flexi-only-in-pro flexi-disabled"><label>No. of rows</label><input type="text" id="slide-number-of-rows" class="flexi-text-field flexi-type-number" style="width: 40px; float:right" value="2"><p class="flexi-description">Represents the max numbers of items per row.</p></div></div><div class="flexi-field"><label>gutter</label><input type="text" id="gutter" class="flexi-text-field flexi-type-number" style="width: 40px; float:right" value="8"><p class="flexi-description">Represents the space betweens the cards</p></div> <?php echo $field::select_field([
                                    'id'            => 'order-by',
                                    'label'         => 'Order By',
                                    'only-in-pro'   => true,
                                    'description'   => 'Choose how you want to order your feed',
                                    'options'       =>
                                    [
                                        'created'           => 'Created Date',
                                        'author_name'       => 'Author name'
                                    ]
                                ]); ?> <?php echo $field::select_field([
                                    'id'            => 'order',
                                    'label'         => 'Order',
                                    // 'only-in-pro'   => true,
                                    'description'   => 'Order your feed ascending or descending',
                                    'options'       =>
                                    [
                                        'asc'   => 'Ascendent',
                                        'desc'  => 'Descendent'
                                    ]
                                ]); ?> </section></div></div><div class="flexi-properties-panel flexy-properties-panel-custom-colors flexi-expanded" data-with-layout="grid"><h1>Custom colors</h1><div class="flexi-panel-inner"><p class="flexi-field-section-title" data-title="Grid"></p><div id="flexi-cards-colors" class="flexi-field-colors-group"> <?php echo $field::input_color_field([
                                    'id'            => 'color-background',
                                    'label'         => 'Background',
                                    'data-key'      => 'backgroundColor',
                                    'only-in-pro'   => true,
                                    'value'         => '#fff'
                                ]); ?> <?php echo $field::input_color_field([
                                    'id'            => 'color-description',
                                    'label'         => 'Text',
                                    'data-key'      => 'descriptionColor',
                                    'only-in-pro'   => true,
                                    'value'         => '#fff'
                                ]); ?> <?php echo $field::input_color_field([
                                    'id'            => 'color-counters',
                                    'label'         => 'Counters',
                                    'data-key'      => 'countersColor',
                                    'only-in-pro'   => true,
                                    'value'         => '#fff'
                                ]); ?> <?php echo $field::input_color_field([
                                    'id'            => 'color-date',
                                    'label'         => 'Date',
                                    'data-key'      => 'dateColor',
                                    'only-in-pro'   => true,
                                    'value'         => '#fff'
                                ]); ?> <?php echo $field::input_color_field([
                                    'id'            => 'color-share-icon',
                                    'label'         => 'Share icon',
                                    'data-key'      => 'shareIconColor',
                                    'only-in-pro'   => true,
                                    'value'         => '#fff'
                                ]); ?> <?php echo $field::input_color_field([
                                    'id'            => 'color-username',
                                    'label'         => 'Username',
                                    'data-key'      => 'usernameColor',
                                    'only-in-pro'   => true,
                                    'value'         => '#fff'
                                ]); ?> <?php echo $field::input_color_field([
                                    'id'            => 'color-load-more-text',
                                    'label'         => 'Load more text',
                                    'data-key'      => 'loadMoreText',
                                    'only-in-pro'   => true,
                                    'value'         => '#fff'
                                ]); ?> <?php echo $field::input_color_field([
                                    'id'            => 'color-load-more-bg',
                                    'label'         => 'Load more bg',
                                    'data-key'      => 'loadMoreBackground',
                                    'only-in-pro'   => false,
                                    'value'         => '#fff'
                                ]); ?> </div></div></div><div class="flexi-properties-panel"><h1>Get shortcode</h1><div class="flexi-panel-inner"><p class="flexi-field-section-title" data-title="Shortcode"></p><section class="flexi-field-section"><div class="flexi-shortcode"><input type="text" readonly="readonly" id="shortcode"> <a href="#" class="flexi-shortcode-copy">Copy</a></div><p class="flexi-description">Place this shortcode into the contents of a page or post to display the stream. <a href="https://codex.wordpress.org/Shortcode" style="text-decoration: underline" target="_blank">Read more</a></p></section></div></div></div><div class="flexi-editor-canvas"><div class="flexi-save-notification"><p>You are using features available only in <a href="<?php echo FLEXI_GO_PRO_URL; ?>?utm_source=plugin&utm_medium=button&utm_campaign=Lite&utm_term=notification" target="_blank">Pro version</a>. In the Free version you can save only <b>Move up transition</b> and Classic <b>skin layout</b>. &nbsp;<a href="#" class="flexi-button resolve-issues-button">Resolve</a></p></div><iframe class="flexi-canvas-iframe" frameborder="0"></iframe></div></div><div class="flexi-editor-tab flexi-settings-tab" data-tab="settings"><div class="flexi-inner-settings-tab"><h1 class="flexi-page-title"><span class="flexi-main-title">Stream Settings</span> <span class="flexi-secondary-title">Grid style</span></h1><div class="flexi-fields-holder"> <?php echo $field::feeds_field([
                            'id'            => 'stream-feeds',
                            'label'         => 'Feeds connected',
                            'only-in-pro'   => true,
                            'description'   => 'All feeds currently active for this stream.'
                        ]); ?> <?php echo $field::input_text_field([
                            'id'            => 'stream-name',
                            'label'         => 'Stream name',
                            'description'   => 'Your stream name.'
                        ]); ?> <?php echo $field::switch_field([
                            'id'            => 'approve-new-posts-automatically-toggle',
                            'label'         => 'Approve new posts automatically',
                            'only-in-pro'   => true,
                            'description'   => 'When enabled, all new posts will automatically be approved.'
                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::switch_field([
                            'id'            => 'disable-on-small-screen-field',
                            'label'         => 'Disable on small screen',
                            'only-in-pro'   => true,
                            'description'   => 'When enabled, the stream will not be displayed on mobile.'

                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::select_field([
                            'id'            => 'items-animation-disable',
                            'label'         => 'Disable animation on',
                            'only-in-pro'   => true,
                            'description'   => 'Choose screen to disable animation',
                            'options'       =>
                            [
                                'none'      => 'None',
                                'mobile'    => 'Mobile',
                                'desktop'   => 'Desktop',
                                'both'      => 'Both'
                            ]
                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::switch_field([
                            'id'            => 'disable-pagination-for-stream',
                            'label'         => 'Disable pagination',
                            'only-in-pro'   => true,
                            'description'   => 'When enabled, the pagination will be disabled.'
                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::input_text_field([
                            'id'            => 'number-of-visible-items',
                            'label'         => 'Number of visible items',
                            'only-in-pro'   => true,
                            'description'   => 'The initial number of posts displayed within the feed. "Show more" button will appear only if there are more items to load',
                            'class'         => 'flexi-type-number'
                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::input_text_field([
                            'id'            => 'items-per-page',
                            'label'         => 'Items per page',
                            'only-in-pro'   => true,
                            'description'   => 'Select the number of loaded posts when clicking "load more" button',
                            'class'         => 'flexi-type-number'
                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::switch_field([
                            'id'            => 'private-stream-for-members',
                            'label'         => 'Private stream',
                            'only-in-pro'   => true,
                            'description'   => 'The stream will be displayed only to logged in users'
                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::textarea_field([
                            'id'            => 'custom-css',
                            'label'         => 'Custom CSS',
                            'only-in-pro'   => true,
                            'expandable'    => true
                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::textarea_field([
                            'id'            => 'custom-js',
                            'label'         => 'Custom JS',
                            'only-in-pro'   => true,
                            'expandable'    => true
                        ]); ?> <span class="flexi-separator"></span> <?php echo $field::progress_button_field([
                            'id'            => 'rebuild-cache',
                            'label'         => 'Rebuild cache',
                            'only-in-pro'   => true,
                            'caption'       => 'Rebuild cache'
                        ]); ?> </div></div></div></section></div></div>