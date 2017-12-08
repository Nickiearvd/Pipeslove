<?php get_header(); ?>
<div id='content'>
	<div class="background">
		<nav class="kategorimeny">
      		<?php wp_nav_menu( array( 'theme_location' => 'extra-meny' ) );?>
      	</nav>
		<h1> <?php single_cat_title() ?></h1>
		<div class="listof">
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
