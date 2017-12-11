<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Contrail+One|Forum|Knewave|Maiden+Orange" rel="stylesheet">
    <?php wp_head()?>
  </head>

  <body>

  


<header>
    <div class="header2">
    	<div id="menyHome">
	      <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) );?>
	    </div>
	    <div id="logo2"></div>
	    <div id="adress">
	      <?php dynamic_sidebar( 'page-sidebar' ); ?>
	    </div>

    </div>

</header>

<style type="text/css">
#menu-huvudmeny{
	margin: 0px auto;
	text-align: center;
	display: block;
	float: none;
	background-color: #151515;
	padding: 20px 0;


}

.header2{
	
}
</style>