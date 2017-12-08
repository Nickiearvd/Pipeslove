<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Huvudmeny' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function register_my_extramenu() {
  register_nav_menus(
    array(
      'extra-meny' => __( 'Extrameny' )
    )
  );
}
add_action( 'init', 'register_my_extramenu' );

?>