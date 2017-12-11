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
				max-width: 500px;
				box-sizing: border-box;
				padding:0;
				margin-top: 100px;
				overflow: hidden;

			}

				.kategorimeny ul li{
					list-style: none;
					text-align: center;

					margin-bottom: 20px;
					background:url(https://www.n0.se/f/f/b8589_mat2.png) no-repeat left;
					background-size: 90px;
					height: 110px;

					background-color: #151515;
					-moz-transition: all 1s;
					-webkit-transition: all 1s;
					transition: all 1s;
				
				}
				
				.kategorimeny ul li:hover, .kategorimeny ul li:first-child:hover, .kategorimeny ul li:last-child:hover{
					background-color: #000;
					cursor: pointer;
					-moz-transition: all 1s;
					-webkit-transition: all 1s;
					transition: all 1s;
				}
				.kategorimeny a{
					text-transform: uppercase;
					font-family: helvetica;
					text-decoration: none;
					font-weight: lighter;
					color:white;
					line-height: 110px;
					font-size: 30px;
					padding: 0;

				}

				.kategorimeny ul li:last-child{
					background:url(https://www.n0.se/f/f/1346e_beer2.png) no-repeat left;
					background-size: 90px;
					background-color: #151515;
				}
				.kategorimeny ul li:first-child{
					margin-left: 0px;
					padding-left: 0;
					background:url(https://www.n0.se/f/f/20b06_drinks.png) no-repeat left;
					background-size: 90px;
					background-color: #151515;
				}

				.kategorimeny a:hover{
					color:brown;

				}
			</style>