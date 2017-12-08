<?php get_header();?>
<div id="content">
    <div id="post">
    	<div id="imageSide">
            <?php the_post_thumbnail();?>
        </div>
    	<div id="textSide">
        	<h1><?php the_title() ?></h1>

        	<p> Här kommer post att hamna
                <?php 
                    if(have_posts()): 
                        while ( have_posts()) :
                            the_post(); 
                            the_content();
                        endwhile;
                    endif; 
                ?>       
           </p>
           <div id="open">
           <?php dynamic_sidebar( 'text' ); ?>
           </div>

       </div>
       
       </div>
   </div>
</div>
            

           
    <footer>
        <?php get_footer();?>
    </footer>
</body>

</html>
    