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
				margin:0 auto;
				width:100%;
				box-sizing: border-box;
				padding:0;
			}

				.kategorimeny ul li{
					list-style: none;
					display: block;
					text-align:center;
					margin-bottom: 20px;
				}

				.kategorimeny a{
					text-transform: uppercase;
					font-family: helvetica;
					text-decoration: none;
					font-weight: lighter;
					color:black;
					font-size: 20px;
					width:200px;
					height: 200px;
					display: inline-block;
					background:url(http://assets.stickpng.com/thumbs/580b57fbd9996e24bc43c091.png);
					background-size: 100%;
					text-align:center;
					line-height: 200px;
					box-sizing: border-box;
					margin-right: 0;
				}

				.kategorimeny ul li:last-child{
					background:url(/img/mat.png) no-repeat center center;;
				}
				.kategorimeny ul li:first-child{
					margin-left: 0px;
					padding-left: 0;
				}

				.kategorimeny a:hover{
					color:brown;

				}
			</style>