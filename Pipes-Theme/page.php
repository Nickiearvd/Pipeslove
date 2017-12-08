<?php get_header();?>
<div id="content">
<div class="background">
    <div id="post">
    	<div id="imageSide">
            <?php the_post_thumbnail();?>
        </div>
    	<div id="textSide">

        	<p> 
                <?php 
                    if(have_posts()): 
                        while ( have_posts()) :
                            the_post(); 
                            the_content();
                        endwhile;
                    endif; 
                ?>       
           </p>
           


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
    