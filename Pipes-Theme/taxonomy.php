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


		// ÖL TAXONOMY

		// $term_id = 10;
		// $taxonomy_name = 'products';
		// $term_children = get_term_children( $term_id, $taxonomy_name );

		if ((is_tax( 'kategori', 'ol' )||(is_tax( 'kategori', 'ale' ))||(is_tax( 'kategori', 'fatol' ))||(is_tax( 'kategori', 'gose' ))||(is_tax( 'kategori', 'ipa' ))||(is_tax( 'kategori', 'lager' ))||(is_tax( 'kategori', 'stout' ))||(is_tax( 'kategori', 'surol' ))) ){
			$terms = get_terms(array(
						'taxonomy' => 'kategori',
						'child_of' => '7',
						'hide_empty' => true,
						'orderby'=>'title',
						'order'=>'ASC' ));
			?>

			<ul class="typ">
				<li><a href="/kategori/ol/">AllA</a></li>

				<?php 
					foreach ($terms as $value) { ?>
			 		<li><a href="/kategori/<?php echo $value->slug ?>">
			 		<?php echo $value->name ?>
					 </a></li>
				

				<?php };
				};?> 


			</ul>
			




			<?php
			// DRYCK TAXONOMY
		if (is_tax( 'kategori', 'dryck' )||(is_tax( 'kategori', 'drink' ))||(is_tax( 'kategori', 'cider' )) ){
			$terms = get_terms(array(
						'taxonomy' => 'kategori',
						'child_of' => '8',
						'hide_empty' => true,
						'orderby ' => 'name'));
			?>
			<ul class="typ">
				<li><a href="/kategori/dryck/">AllA</a></li>

				
				<?php 
					foreach ($terms as $value) { ?>
			 		<li><a href="/kategori/<?php echo $value->slug ?>">
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

								<?php
								$thecontent = get_the_content();
								if(!empty($thecontent)) { ?>

   								 <?php the_content(); ?>

								<?php } ?> <br>

								  <b><?php the_field("pris"); 
								 ?> kr</b>

								 <?php if( get_field('volym') ): ?>
								 <?php the_field("volym"); 
								 ?>
								<?php echo " <p>cl</p>"; ?>
								<?php endif; ?>

 								
								<?php if (is_tax( 'kategori', 'mat' )){
									get_the_term_list( $post->ID, 'kategori', ' ', ', ', '' );
								} else{
									echo get_the_term_list( $post->ID, 'kategori', ' ', ', ', '' );

								};?>

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
				line-height: -5px;
				margin:0;
				padding: 0;
			}

			p {
				line-height: 5px;
			}

			.s1 {
				line-height: 5px;
			}

			.p1 {
				line-height: 5px;
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
				min-height: 80vh;
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
			
