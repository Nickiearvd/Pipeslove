<?php get_template_part( 'homeheader'); ?>


<div id="content">
    <div id="post">
    	<div id="imageSide">
            <?php the_post_thumbnail();?>
        </div>
    	<div id="textSide">
        	
           <div id="open">
           
           <div id="rektangel2">
           <?php dynamic_sidebar( 'text' ); ?>
           </div>
           </div>

           <div id="quiz">
               <div id="rektangel">
                    <?php dynamic_sidebar( 'torsdag' ); ?>
               </div>
               
           </div>
           <div id="open">
           <h3>Här kommer de kul saker</h3>
           </div>
           <div id="quiz">
           <h2>Kommande händelser</h2>
           <?php $wpb_all_query = new WP_Query(array('post_type'=>'event', 'post_status'=>'publish', 'paged'=> get_query_var('paged'),   
                      'posts_per_page' => 5,
                      'nopaging'       => false, )); ?>
                    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
               <div id="rektangel3">
                      <a  class="event" href="<?php the_permalink(); ?>">
                      <p class="datum"><?php the_field('datum'); ?> </p>
                        
                        <a class="eventtitle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
                         
                         <p class="mer">mer info...</p>
                      </a>


                    
               </div>
               <?php endwhile; ?>

           </div>
           <div id="menyDiv">
                <nav class="kategorimeny">
                  <?php wp_nav_menu( array( 'theme_location' => 'extra-meny' ) );?>
                </nav>
            </div>
            <div id="open">
               <h2>GALLERY</h2>
               <!-- LightWidget WIDGET --><script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/48e76f3e71fa5640b28ed33a9fa77631.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>

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
    