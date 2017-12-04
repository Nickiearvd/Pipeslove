<?php get_header(); ?>
<div class="background">
</div>
<div class="postgrid">
			<div class='navgrid'>
				<?php
					$terms = get_terms(array(
						'taxonomy' => 'Kategori',
						'hide_empty' => true ));
				?>
				<ul>
					<?php 
						foreach ($terms as $value) { ?>
				 		<li><a href="/Kategori/<?php echo $value->slug ?>">
				 		<?php echo $value->name ?>
						 </a></li>

					<?php };?>
				</ul>
			</div>
			<?php $args = array(
			    'post_type'       =>  'mat_dryck',);

				$matdryck_query = new WP_Query($args);
			?>
			
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