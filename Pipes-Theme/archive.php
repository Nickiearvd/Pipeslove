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
			h1{
				color: rgba(255, 255, 255, 0.9);
				margin-top: 80px;
			}
			#menytopper{
				background-color: #151515;
				height: 70px;

			}
			.postgrid{
				z-index: 10;

			}
			
			.kategorimeny{

				
				background: url(https://www.pixeltopic.com/files/2017/12/hjvpqcuputxsntb.jpg) no-repeat;
				filter: grayscale(50%);
				background-size: 100%;
				padding-top:10px;
				padding-bottom:100px;
			}
			.kategorimeny ul {
				width:90%;
				max-width: 500px;
				box-sizing: border-box;
				padding:0;
				margin: 30px auto 0 auto;
				overflow: hidden;

			}

				.kategorimeny ul li{
					list-style: none;
					text-align: center;
					margin: 0 auto 18px auto;
					height: 35px;
					width: 280px;
					background-color: rgba(255, 255, 255, 0.9);
					-moz-transition: all 1s;
					-webkit-transition: all 1s;
					transition: all 1s;
				
				}
				
				.kategorimeny ul li:hover, .kategorimeny ul li:first-child:hover, .kategorimeny ul li:last-child:hover{
					background: #fff;
					cursor: pointer;
					-moz-transition: all 0.3s;
					-webkit-transition: all 0.3s;
					transition: all 0.3s;
					box-sizing: border-box;
				}
				.kategorimeny a{
					text-transform: uppercase;
					font-family: 'open sans', helvetica;
					text-decoration: none;
					font-weight: 300;
					color: rgba(0,0,0, 0.8);
					line-height: 35px;
					font-size: 18px;
					padding: 0;

				}

				.kategorimeny ul li:last-child{
					
				}
				.kategorimeny ul li:first-child{
				
					
				}

				.kategorimeny a:hover{
					
					text-decoration: underline;
					
				}
			</style>