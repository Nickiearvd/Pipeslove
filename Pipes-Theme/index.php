
<?php get_header()?>
<?php wp_head() ?>

<?php if (have_posts()): 
while (have_posts()): 
the_post();

  //HTML and template tags
  the_title();

endwhile; endif; ?>
