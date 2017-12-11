<?php get_header(); ?>

<div id='content'>
<div class="background">
<div id="menytopper"></div>
<nav class="kategorimeny">
<h1>Meny</h1>
			
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
				background-color: #f5f5f5;
				width:100%;
				top:0;
				z-index: 100;

			}
			#content{
				

				
			}
			#menytopper{
				background-color: #151515;
				background: url(https://www.pixeltopic.com/files/2017/12/fpwbhmoebgbwivq.jpg) no-repeat;
				background-size: 100%;
				height: 300px;
				margin-top: 100px;
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
				margin: 50px auto 0 auto;
				overflow: hidden;

			}

				.kategorimeny ul li{
					list-style: none;
					text-align: center;
					margin: 0 auto 10px auto;
					height: 80px;
					background-color: #f5f5f5;
					-moz-transition: all 1s;
					-webkit-transition: all 1s;
					transition: all 1s;
				
				}
				
				.kategorimeny ul li:hover, .kategorimeny ul li:first-child:hover, .kategorimeny ul li:last-child:hover{
					background-color: #fff;
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
					color:#151515;
					line-height: 80px;
					font-size: 25px;
					padding: 0;

				}

				.kategorimeny ul li:last-child{
					
				}
				.kategorimeny ul li:first-child{
					margin-left: 0px;
					padding-left: 0;
					
				}

				.kategorimeny a:hover{
					border-bottom: 2px solid #151515; 
					padding-bottom: px;
					
				}
			</style>