<?php get_header(); ?>

<div id='content'>
	<div class="background">
	<div class="c">
		<nav class="kategorimeny">
			<h1 class="h1spec">Meny</h1>	
		    <?php wp_nav_menu( array( 'theme_location' => 'extra-meny' ) );?>
	    </nav>
	</div>
	</div>
</div>
	
<?php get_footer(); ?>


		<style>
			html{
				position:relative;
			}

			.c{
				padding-top: 160px;
				padding-bottom: 140px;

			}

			.h1spec{
				color: rgba(255, 255, 255, 0.9);
				padding-bottom: 60px;
			}
			
			.postgrid{
				z-index: 10;

			}
			
			@media (min-width: 600px) {
				#menu-extrameny li{
					width:400px;
				}

				#menu-extrameny{
					padding-top:20px;
					padding-bottom:20px;
				}
			}
			@media (min-width: 900px) {

			
				.h1spec{
					font-size: 45px;
				}

				#menu-extrameny{
					padding-top:60px;
					padding-bottom:60px;
				}

			}
			</style>