<?php get_header(); ?>

<div id='content'>
	<div class="background">
	<div class="c">
		<nav class="kategorimeny">
			<h1>Meny</h1>	
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
			.background{
	

			}
			#content{
				
				
			}
			h1{
				color: rgba(255, 255, 255, 0.9);
			}
			
			.postgrid{
				z-index: 10;

			}
			
			

				@media (min-width: 600px) {
					
				}
			</style>