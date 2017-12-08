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
           <?php dynamic_sidebar( 'text' ); ?>
           </div>
           <div id="quiz">
               <div id="rektangel">
                    <h2>Kommande händelser</h2>
               </div>

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
    