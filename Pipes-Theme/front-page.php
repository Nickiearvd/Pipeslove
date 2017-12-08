<?php get_header();?>
<div id="content">
    <div id="post">
    	<div id="imageSide">
            <?php the_post_thumbnail();?>
        </div>
    	<div id="textSide">
        	
           <div id="open">
           <h1><?php the_title() ?></h1>

            <p> TEST TEST
                <?php 
                    if(have_posts()): 
                        while ( have_posts()) :
                            the_post(); 
                            the_content();
                        endwhile;
                    endif; 
                ?>       
           </p>
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
                      <h3 class="datum"><?php the_field('datum'); ?> </h3>
                        
                        <h4><?php the_title(); ?></h4> 
                         
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
    