<?php get_header(); ?>
<p>jdjdj</p>
<div class="postgrid">
			<div class='navgrid'>
				<?php
					$terms = get_terms(array(
						'taxonomy' => 'category',
						'hide_empty' => true ));
				?>
				<ul>
				<li><a href="/index.php">All</a></li>
				<?php 
					foreach ($terms as $value) { ?>
			 		<li><a href="/mat_dryck/<?php echo $value->slug ?>">
			 		<?php echo $value->name ?>
					 </a></li>

				<?php };?>
			</ul>
			</div>
			<?php $args = array(
			    'post_type'       =>  'mat_dryck',);

			?>
			<?php if (have_posts()){
					while (have_posts()) : the_post();?>
				
						<ul class='imggrid'>
							<div class='gridone'>
							<li>
								<?php $link = get_the_permalink();?>
								<?php echo"<div class='img'><a href='$link'>";
									?>
									<div class='caption'>
										<div class='blur'>

									 		<?php echo "<h4><a class='text' href='$link'>";the_title();echo "</a></h4>"; ?>
							
									 		</div>

										</div>
								 		<div class='caption-text'></div>
								 	</div>
								</a></div>
					
							</li>
						</ul>
				


		<?php endwhile; }?>
		
			</div>