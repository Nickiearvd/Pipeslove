<?php get_header(); ?>

<div id='content'>
<div class="background">
<nav class="kategorimeny">
			
      		<?php wp_nav_menu( array( 'theme_location' => 'extra-meny' ) );?>
      </nav>

</div>
</div>
	
<?php get_footer(); ?>


		<style>
			html{
				position:relative;
			}
			.background{

				background-size: 100%;
				background-color: rgba(21, 21, 21, 0.8);
				width:100%;
				top:0;
				z-index: 100;

			}
			#content{
				

				
			}
			.postgrid{
				z-index: 10;

			}
			
			.kategorimeny{
				padding-top:100px;
				padding-bottom:100px;
			}
			.kategorimeny ul {
				width:100%;
				box-sizing: border-box;
				padding:0;
				overflow: hidden;
			}

				.kategorimeny ul li{
					list-style: none;
					text-align: left;
					margin-bottom: 20px;
					background:url(http://assets.stickpng.com/thumbs/580b57fbd9996e24bc43c091.png) no-repeat left;
					background-size: 100px;
					height: 200px;
					background-color: #212121;
				
				}

				.kategorimeny a{
					text-transform: uppercase;
					font-family: helvetica;
					text-decoration: none;
					font-weight: lighter;
					color:white;
					
					font-size: 40px;
					padding: 0;

				}

				.kategorimeny ul li:last-child{
				}
				.kategorimeny ul li:first-child{
					margin-left: 0px;
					padding-left: 0;
				}

				.kategorimeny a:hover{
					color:brown;

				}
			</style>