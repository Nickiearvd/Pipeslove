<?php

// Register Custom Taxonomy
function my_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Kategori', 'Taxonomy General Name', 'portfolio-theme' ),
		'singular_name'              => _x( 'Kategori', 'Taxonomy Singular Name', 'portfolio-theme' ),
		'menu_name'                  => __( 'Kategori', 'portfolio-theme' ),
		'all_items'                  => __( 'All Kategori', 'portfolio-theme' ),
		'parent_item'                => __( 'Parent Item', 'portfolio-theme' ),
		'parent_item_colon'          => __( 'Parent Item:', 'portfolio-theme' ),
		'new_item_name'              => __( 'New Kategori Name', 'portfolio-theme' ),
		'add_new_item'               => __( 'Add New Kategori', 'portfolio-theme' ),
		'edit_item'                  => __( 'Edit Kategori', 'portfolio-theme' ),
		'update_item'                => __( 'Update Kategori', 'portfolio-theme' ),
		'view_item'                  => __( 'View Kategori', 'portfolio-theme' ),
		'separate_items_with_commas' => __( 'Separate Kategori with commas', 'portfolio-theme' ),
		'add_or_remove_items'        => __( 'Add or remove Kategori', 'portfolio-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'portfolio-theme' ),
		'popular_items'              => __( 'Popular Kategori', 'portfolio-theme' ),
		'search_items'               => __( 'Search Kategori', 'portfolio-theme' ),
		'not_found'                  => __( 'Not Found', 'portfolio-theme' ),
		'no_terms'                   => __( 'No Kategori', 'portfolio-theme' ),
		'items_list'                 => __( 'Kategori list', 'portfolio-theme' ),
		'items_list_navigation'      => __( 'Kategori list navigation', 'portfolio-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'Kategori', array( 'mat_dryck' ), $args );

}
add_action( 'init', 'my_taxonomy', 0 );

// Register Custom Taxonomy
function my_taxonomy_typ() {

	$labels = array(
		'name'                       => _x( 'Typ', 'Taxonomy General Name', 'portfolio-theme' ),
		'singular_name'              => _x( 'Typ', 'Taxonomy Singular Name', 'portfolio-theme' ),
		'menu_name'                  => __( 'Typ', 'portfolio-theme' ),
		'all_items'                  => __( 'All Typ', 'portfolio-theme' ),
		'parent_item'                => __( 'Parent Item', 'portfolio-theme' ),
		'parent_item_colon'          => __( 'Parent Item:', 'portfolio-theme' ),
		'new_item_name'              => __( 'New Typ Name', 'portfolio-theme' ),
		'add_new_item'               => __( 'Add New Typ', 'portfolio-theme' ),
		'edit_item'                  => __( 'Edit Typ', 'portfolio-theme' ),
		'update_item'                => __( 'Update Typ', 'portfolio-theme' ),
		'view_item'                  => __( 'View Typ', 'portfolio-theme' ),
		'separate_items_with_commas' => __( 'Separate Typ with commas', 'portfolio-theme' ),
		'add_or_remove_items'        => __( 'Add or remove Typ', 'portfolio-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'portfolio-theme' ),
		'popular_items'              => __( 'Popular Typ', 'portfolio-theme' ),
		'search_items'               => __( 'Search Typ', 'portfolio-theme' ),
		'not_found'                  => __( 'Not Found', 'portfolio-theme' ),
		'no_terms'                   => __( 'No Typ', 'portfolio-theme' ),
		'items_list'                 => __( 'Typ list', 'portfolio-theme' ),
		'items_list_navigation'      => __( 'Typ list navigation', 'portfolio-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'Typ', array( 'mat_dryck' ), $args );

}
add_action( 'init', 'my_taxonomy_typ', 0 );

?>