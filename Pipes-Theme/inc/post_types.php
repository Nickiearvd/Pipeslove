<?php


// Register Custom Post Type
function mat_dryck() {

    $labels = array(
         'name'                  => _x( 'Mat & drycker', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Mat & dryck', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Mat & dryck', 'text_domain' ),
        'name_admin_bar'        => __( 'Mat & dryck', 'text_domain' ),
        'archives'              => __( 'Arkiv', 'text_domain' ),
        'attributes'            => __( 'Attributer', 'text_domain' ),
        'parent_item_colon'     => __( 'Överordnad:', 'text_domain' ),
        'all_items'             => __( 'Allt', 'text_domain' ),
        'add_new_item'          => __( 'Lägg till', 'text_domain' ),
        'add_new'               => __( 'Lägg till', 'text_domain' ),
        'new_item'              => __( 'Ny', 'text_domain' ),
        'edit_item'             => __( 'Redigera', 'text_domain' ),
        'update_item'           => __( 'Updatera', 'text_domain' ),
        'view_item'             => __( 'Visa', 'text_domain' ),
        'view_items'            => __( 'Visa', 'text_domain' ),
        'search_items'          => __( 'Sök', 'text_domain' ),
        'not_found'             => __( 'Hittades inte', 'text_domain' ),
        'not_found_in_trash'    => __( 'Hittades inte', 'text_domain' ),
        'featured_image'        => __( 'Bild', 'text_domain' ),
        'set_featured_image'    => __( 'Välj bild', 'text_domain' ),
        'remove_featured_image' => __( 'Ta bort bild', 'text_domain' ),
        'use_featured_image'    => __( 'Använd som bild', 'text_domain' ),
        'insert_into_item'      => __( 'Lägg till', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uppladdade', 'text_domain' ),
        'items_list'            => __( 'Lista', 'text_domain' ),
        'items_list_navigation' => __( 'List navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filtrera lista', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Mat och Dryck', 'text_domain' ),
        'description'           => __( 'Mat & dryck på sidan', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'Kategori', 'Typ' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'mat_dryck', $args );

}
add_action( 'init', 'mat_dryck', 0 );




// Register Custom Post Type
function event() {

    $labels = array(
        'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Event', 'text_domain' ),
        'name_admin_bar'        => __( 'Event', 'text_domain' ),
        'archives'              => __( 'Arkiv', 'text_domain' ),
        'attributes'            => __( 'Attributer', 'text_domain' ),
        'parent_item_colon'     => __( 'Överordnad:', 'text_domain' ),
        'all_items'             => __( 'Alla event', 'text_domain' ),
        'add_new_item'          => __( 'Lägg till', 'text_domain' ),
        'add_new'               => __( 'Lägg till', 'text_domain' ),
        'new_item'              => __( 'Ny', 'text_domain' ),
        'edit_item'             => __( 'Redigera', 'text_domain' ),
        'update_item'           => __( 'Updatera', 'text_domain' ),
        'view_item'             => __( 'Visa', 'text_domain' ),
        'view_items'            => __( 'Visa', 'text_domain' ),
        'search_items'          => __( 'Sök', 'text_domain' ),
        'not_found'             => __( 'Hittades inte', 'text_domain' ),
        'not_found_in_trash'    => __( 'Hittades inte', 'text_domain' ),
        'featured_image'        => __( 'Bild', 'text_domain' ),
        'set_featured_image'    => __( 'Välj bild', 'text_domain' ),
        'remove_featured_image' => __( 'Ta bort bild', 'text_domain' ),
        'use_featured_image'    => __( 'Använd som bild', 'text_domain' ),
        'insert_into_item'      => __( 'Lägg till', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uppladdade', 'text_domain' ),
        'items_list'            => __( 'Lista', 'text_domain' ),
        'items_list_navigation' => __( 'List navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filtrera lista', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Event', 'text_domain' ),
        'description'           => __( 'Nya event', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'Kategori', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'event', $args );

}
add_action( 'init', 'event', 0 );


 ?>