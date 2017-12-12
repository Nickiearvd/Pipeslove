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
				padding-top: 140px;
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
			
			.kategorimeny{
				padding-top:10px;
				padding-bottom:100px;
			}
			.kategorimeny ul {
				box-sizing: border-box;
				padding:0;
				margin: 30px auto 0 auto;
				overflow: hidden;

			}

				.kategorimeny ul li{
					list-style: none;
					text-align: center;
					margin: 10px auto 10px auto;
					padding:0px auto;
					height: 50px;
					width: 280px;
					background-color: rgba(255, 255, 255, 0.9);
					-moz-transition: all 1s;
					-webkit-transition: all 1s;
					transition: all 1s;
					border-bottom: 1px solid;
					border-color: rgba(0, 0, 0, 0.3);
				}
				
				.kategorimeny ul li:hover, .kategorimeny ul li:first-child:hover, .kategorimeny ul li:last-child:hover{
					background: #fff;
					cursor: pointer;
					-moz-transition: all 0.3s;
					-webkit-transition: all 0.3s;
					transition: all 0.3s;

				}
				.kategorimeny a{
					text-transform: uppercase;
					font-family: 'open sans', helvetica;
					text-decoration: none;
					font-weight: 300;
					color: rgba(0,0,0, 0.8);
					line-height: 50px;
					font-size: 18px;
					padding: 0;

				}

				.kategorimeny ul li:last-child{
					border-bottom: none;
				}

				.kategorimeny ul li:first-child{
				
					
				}

				.kategorimeny a:hover{
					font-weight: 500;
					font-size: 20px;
					-moz-transition: all 0.5s;
					-webkit-transition: all 0.5s;
					transition: all 0.5s;
					
				}
				.menu{
					background-color: white;
					width:100%;
					margin:0;
					padding:0;
				}
				#menu-extrameny{
					margin:0;
					width:100%;
					margin: 40px auto 0 auto;

				}

				@media (min-width: 600px) {
					
				}
			</style>