<?php get_header(); ?>
<div id='content'>
	<div class="background">
		<nav class="kategorimeny">
      		<?php wp_nav_menu( array( 'theme_location' => 'extra-meny' ) );?>
      	</nav>
		<div class="listof">
		<h1> <?php single_cat_title() ?></h1>
			<?php if (have_posts()){
				while (have_posts()) : the_post();?>
					<ul class='imggrid'>
						<li>
							<?php echo "<h2>";the_title();echo "</h2>"; ?>
						</li>
					</ul>
				<?php endwhile; }?>
		</div>
	</div>
</div>
<style></style>

<?php get_footer(); ?>
<style>
			html{
				position:relative;
			}
			.background{
				background: url(img/pipes1.png) no-repeat center center;
				background-size: 100%;
				background-color: rgba(0, 0, 0, 0.4);
				height:100vh;
				width:100%;
				top:0;
				z-index: 100;

			}
			#content{
				background-color: #151515;
			}

			.kategorimeny{
				padding-top:100px;
			}

			.kategorimeny ul {
				margin:0 auto;
				width:100%;
				box-sizing: border-box;
				padding:0;
			}
			
				.kategorimeny ul li{
					list-style: none;
					display: inline;
					text-align:center;
					margin-right: 70px;
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
					background-color: rgba(255, 255, 255, 0.8);
					text-align:center;
					line-height: 200px;
					box-sizing: border-box;
					margin-right: 0;
				}

				.kategorimeny ul li:last-child{
					margin-right: 0px;
					background:url(/img/mat.png) no-repeat center center;;
				}
				.kategorimeny li.current-menu-item a{
					padding-bottom: 100px;
					background-color: rgb(255, 255, 255);

				}

				.kategorimeny a:hover{
					color:brown;
					transition: all 0.5s ease-in-out;
				-moz-transition: all 0.5s ease-in-out;
				-webkit-transition: all 0.5s ease-in-out;
				-o-transition: all 0.5s ease-in-out;

				}
				.listof{
					background-color: #f5f5f5;
					width:100%;
					margin: 0 auto ;
					margin-top: 70px;
					padding-bottom: 20px;
				}
				.listof ul{
					margin:0;
					padding-left:10px;


				}
				.listof ul li{
					list-style: none;
					display: inline;
					text-align: left;
					font-size:10px;
					font-family: helvetica;
				}
			</style>
