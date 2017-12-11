<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
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
    	<a href="#" id="showmenu"></a>
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
#showmenu {
			float: right;
			width: 40px;
			height:40px;
			padding: 30px 0;
			background: url("Images/menu.png") no-repeat center center;
			background-color: transparent;
			z-index: 100;
			margin-right:20px;
			background-size:80%;
			 transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
		}
		#showmenu.open{
			background-color: black;
			background: url("Images/menuopen.png") no-repeat center center;
			background-size:80%;
			transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -webkit-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
		}

		#menu-huvudmeny {
			clear: both;
			display: none;
		}
		#menu-huvudmeny.open {
			display: block;
		}
</style>