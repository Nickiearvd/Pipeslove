<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Contrail+One|Forum|Knewave|Maiden+Orange" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
		$(document).ready( function() { // Add a open class, enable to show or not the navigation 
			var icon = $("#showmenu");
			var menu = $("#menu-huvudmeny");

			icon.click( function(event) {
				event.preventDefault();
				menu.toggleClass("open");
				icon.toggleClass("open");
			} );

		} );
	</script>
    <?php wp_head()?>
  </head>

  <body>

<header>
    <div class="header2">
    	<div class="blackoverlay">
	    	<div class="navigation">
		    	<a href="#" id="showmenu"></a>
		    	<div id="menyHome">
			      <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) );?>
		    	</div>
		    </div>
	
		    <div id="logo2"></div>
		    <div id="adress">
		      <?php dynamic_sidebar( 'page-sidebar' ); ?>
		    </div>
	    </div>
    </div>

</header>

<style type="text/css">


.header2{
	overflow: hidden;
	
}

#menyHome{
	width:100%;
}

</style>