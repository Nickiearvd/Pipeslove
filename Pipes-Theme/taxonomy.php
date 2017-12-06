<?php get_header(); ?>
<div class="background">
</div>
<div class="content">
	<h1>Alla våra <?php wp_title('') ?></h1>
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

<?php get_footer(); ?>