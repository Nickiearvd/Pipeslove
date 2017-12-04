

<?php

get_template_part( 'post_types' );




add_image_size( 'grid_thumbnail', 300, 300, true );
add_image_size( 'single_large', 660, 400, false );




 function add_widgets() {
  $args = array(
    'id'            => 'page-sidebar',
    /** Visible name in the Admin Dashboard Widget page */
    'name'          => __( 'Page Sidebar', 'portfolio_theme' ),
    /** Visible description in the Admin Dashboard Widget page */
    'description'   => __( 'Show my skills and social links', 'portfolio_theme' ),

    /** HTML to wrap widget title in  */
    'before_title'  => '<p class="widget-title">',
    'after_title'   => '</p>',
    /** HTML to wrap each widget  */
    'before_widget' => '<section>',
    'after_widget'  => '</section>',
  );
  register_sidebar( $args );

   $args = array(
    'id'            => 'text',
    /** Visible name in the Admin Dashboard Widget page */
    'name'          => __( 'Text', 'portfolio_theme' ),
    /** Visible description in the Admin Dashboard Widget page */
    'description'   => __( 'Description', 'portfolio_theme' ),

    /** HTML to wrap widget title in  */
    'before_title'  => '<p class="widget-title">',
    'after_title'   => '</p>',
    /** HTML to wrap each widget  */
    'before_widget' => '<section>',
    'after_widget'  => '</section>',
  );
  register_sidebar( $args );
 }
 add_action( 'widgets_init', 'add_widgets' );










add_theme_support('post-thumbnails');
add_theme_support('post-formats');
add_theme_support('title-tag');






function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Huvudmeny' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
 ?>



