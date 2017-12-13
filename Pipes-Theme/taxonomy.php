<?php get_header(); ?>
<div id='content'>

	<div class="background">
		<div class="c">
		<nav class="kategorimeny">
			<h1 class="h1spec">Meny</h1>	
		    <?php wp_nav_menu( array( 'theme_location' => 'extra-meny' ) );?>
	    </nav>
		<div class="listof">
	
		<?php
		if (is_tax( 'kategori', 'beer' ) || is_tax( 'typ')){
			$terms = get_terms(array(
						'taxonomy' => 'typ',
						'hide_empty' => true ));
			?>
			<ul class="typ">
				<li><a href="/kategori/beer/">AllA</a></li>

				
				<?php 
					foreach ($terms as $value) { ?>
			 		<li><a href="/typ/<?php echo $value->slug ?>">
			 		<?php echo $value->name ?>
					 </a></li>
				

				<?php };
				};?>
			</ul>
		
					<div id="col">
			<?php if (have_posts()){
				while (have_posts()) : the_post();?>
					<ul class='imggrid'>
						<div class="border1">
							<li>
								<?php echo "<h5>";the_title();echo "</h5>"; ?>

								  <p> <?php the_field("pris"); 
								 ?> kr</p><p> <?php the_field("volym"); 
								 ?> cl</p>
								<?php echo get_the_term_list( $post->ID, 'typ', ' ', ', ', '' ); ?> 

							</li>
						</div>
					</ul>
				<?php endwhile; }?>
			</div>
		</div>
	</div>
</div>
<footer>
	<?php get_footer(); ?>
</footer>
</body>
<style>
			html{
				position:relative;
			}

			h5 {
				font-size: 18px;
				margin-bottom: -5px;
				margin-top: 0px;
			}

			.border1 p {
				display: inline;
				color: #000;
				font-weight: 300;
			}

			.border1 a {
				color: #000;
				font-weight: 300;
			}

			.border1 {
				margin-bottom: 10px;
				-webkit-column-break-inside: avoid;
          		page-break-inside: avoid;
               break-inside: avoid;
			}

			#col {
				-webkit-columns: 100px 1; /* Chrome, Safari, Opera */
    			-moz-columns: 100px 1; /* Firefox */
    			columns: 100px 1;
    			margin-top: 40px;
    			max-width: 900px;
    			margin:auto;
			}

			.c{
				padding-top: 160px;
				padding-bottom: 140px;

			}
			.background{
			
				width:100%;
				top:0;
				z-index: 100;

			}
			.h1spec{
				color: rgba(255, 255, 255, 0.9);
				padding-bottom: 60px;
			}
			
		
			.postgrid{
				z-index: 10;

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
					padding-left:20px;

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
					
					padding-top: 10px;
					padding-bottom: 5px;
				}
				h3{
					display: inline;
				}
				.post-meta{
					display: inline;
					font-weight: 300;
				}
				.post-meta:before{
					content: " | ";

				}
				.typ{
					margin-bottom: 20px;
					color:white;
					padding:5px;
					font-weight: 200;
					margin-top: 0;
					background-color: rgba(0, 0, 0, 0.9);
					text-align: center;
					padding-left: 10px;
					
				}
		
				.typ li{
					padding-right: 20px;
					padding-left: 20px;
					border-right: 1px solid;
				}
				.typ li a{

					color:white;
					text-transform: uppercase;
				}
				.typ li:last-child{
					padding-right: 0px;
					border-right: none;
				}
				.typ li:first-child{
					padding-left: 0px;
					
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

			@media (min-width:600px) {
				#col {
				-webkit-columns: 100px 2; /* Chrome, Safari, Opera */
    			-moz-columns: 100px 2; /* Firefox */
    			columns: 100px 2;
    			
			}

			}
				

			</style>
			}
