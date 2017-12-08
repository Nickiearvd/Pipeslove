<?php get_header(); ?>
<div id='content'>

	<div class="background">

		<nav class="kategorimeny">
      		<?php wp_nav_menu( array( 'theme_location' => 'extra-meny' ) );?>
      	</nav>
		<div class="listof">
		<h2> <?php single_cat_title() ?></h2>

		<?php
		if (is_tax('typ')){

		}
		if (is_tax( 'kategori', 'beeer' ) || is_tax( 'typ')){
			$terms = get_terms(array(
						'taxonomy' => 'typ',
						'hide_empty' => true ));
			?>
			<ul class="typ">
				<li><a href="/kategori/beeer/">All</a></li>
				<?php 
					foreach ($terms as $value) { ?>
			 		<li><a href="/typ/<?php echo $value->slug ?>">
			 		<?php echo $value->name ?>
					 </a></li>
				

				<?php };
				};?>
			</ul>
		
					
			<?php if (have_posts()){
				while (have_posts()) : the_post();?>
					<ul class='imggrid'>
						<div class="border1">
							<li>
								<?php echo "<h3>";the_title();echo "</h3>"; ?>
								<?php the_meta(""); 
								 ?>

							</li>
						</div>
					</ul>
				<?php endwhile; }?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
<style>
			html{
				position:relative;
			}
			.background{
				background: url(img/pipes1.png) no-repeat center center;
				background-size: 100%;
				background-color: rgba(21, 21, 21, 0.8);
				
				width:100%;
				top:0;
	

			}
			#content{
				background-color: #151515;
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
					margin-top: 0px;
					padding-bottom: 70px;
					padding-top: 10px;

				}
				.listof .imggrid{
					margin:0;
					padding-left:270px;
					text-align: left;


				}
				.listof ul li{
					list-style: none;
					display: inline;
					text-align: left;
					font-size:16px;
					font-family: helvetica;
					line-height: 26px;
				}

				.border1{
					border-bottom: solid 1px lightgrey;
					width:750px;
					padding-top: 10px;
					padding-bottom: 5px;
				}
				h3{
					display: inline;
				}
				.post-meta{
					display: inline;
					padding-left: 5px;
					font-weight: 300;
				}
				.post-meta:before{
					content: " | ";
				}
				.typ{
					margin-bottom: 20px;
					padding:0;
					margin-top: 0;
					
				}
				h2{
					padding-bottom: 0;
				}

				.typ li{
					padding-right: 10px;
					padding-left: 10px;
					border-right: 1px solid;
					text-align: center;
				}
				.typ li a{
					color:brown;
					text-transform: uppercase;
				}
				.typ li:last-child{
					padding-right: 10px;
					padding-left: 10px;
					border-right: none;
				}
				

			</style>
