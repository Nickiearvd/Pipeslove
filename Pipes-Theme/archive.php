<?php get_header(); ?>
<div class="background">
</div>
<div class="postgrid">
			<div class='navgrid'>
				<?php
					$terms = get_terms(array(
						'taxonomy' => 'kategori',
						'hide_empty' => true ));
				?>
				<ul>
					<?php 
						foreach ($terms as $value) { ?>
				 		<li><a href="/kategori/<?php echo $value->slug ?>">
				 		<?php echo $value->name ?>
						 </a></li>

					<?php };?>
				</ul>
			</div>
			<?php $args = array(
			    'post_type'       =>  'mat_dryck',);

				$matdryck_query = new WP_Query($args);


			?>
			<?php if (have_posts()){
					while (have_posts()) : the_post();?>
				
						<ul class='imggrid'>
						
							<li>
								<?php echo "<h4>";the_title();echo "</h4>"; ?>
							
									 		</div>

										</div>
								 		<div class='caption-text'></div>
								 	</div>
								</a></div>
					
							</li>
						</ul>
				


		<?php endwhile; }?>
			
</div>

			<style>
			html{
				position:relative;
			}
			.background{
				background-color: grey;
				height:100vh;
				width:100%;
				top:0;
				position:absolute;
				z-index: -10;

			}
			.postgrid{
				z-index: 10;

			}
				.navgrid ul li{
					list-style: none;
					display: inline;
					padding-right: 20px;
					border:solid 5px brown;
					text-align:center;


				}
				.navgrid ul li a{
					text-transform: uppercase;
					font-family: helvetica;
					text-decoration: none;
					font-weight: lighter;
					color:white;
					height:20%;
				}
				.navgrid ul li a:hover{
					color:brown;

				}
			</style>