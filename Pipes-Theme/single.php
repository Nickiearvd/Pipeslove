   <?php get_header();?>
    <div id="content">
        <div class="background">
            <div class="c">
                <div id="post">
                	<div id="alltop">
                    	
                            <?php 
                                if(have_posts()): 
                                    while ( have_posts()) : ?>
                                        <h3> <?php the_title(); ?> </h3>
                                        <p class='postmeta'><?php the_field('datum'); ?></p>
                                        </div>
                                        <div id='postcontent'>
	                                        <div id="postimg">
	                							<?php the_post_thumbnail();?>
	                    					</div>
	                    					<div id="postp">
	                                        	<?php the_post(); ?>
	                                        	<?php the_content(); ?>
	                                    	</div>
                                        </div>
                                   <?php endwhile; 
                                endif; 
                            ?>       
                      
                </div>
           </div>
        </div>
    </div>        
        
    <footer>
        <?php get_footer();?>
    </footer>

<style>
 

	#postcontent {
		width:100%;
		background-color: #fff;
		margin:auto;
		box-sizing: border-box;
		padding-top: 0px;
		padding-bottom: 30px;
		margin-bottom: 0px;
		overflow: hidden;
	}

	#postimg img {
		width:100%;
		height:auto;
		max-width: 700px;
		margin-bottom: 0;
	}

	h3 {
		padding:0;
		margin-bottom: 0px;
		color:#fff;
		text-transform: uppercase;
	}

	.postmeta {
		color:#fff;
		font-size: 24px;
		font-weight: 300;
		margin-top: 0px;
	}

	#toppost {
		z-index: 1000;
		bottom: 0;
		text-align: center;
		width:100%;
		max-width: 900px;
	}

	#alltop {
		max-width: 800px;
		margin:auto;
	}

	#postp {
		width: 80%;
		margin:auto;
		text-align: left;
		margin-top:30px;
		max-width: 900px;
	}

	@media (min-width: 950px) {
		#postp {
			width:40%;
			float: left;
			margin-top: 0px;
			margin-left: 15px;
		}

		#postp p {
			margin-top: 20px;
		}

		#postcontent {
			padding-bottom: 50px;
			padding-top: 30px;
		}

		#postimg img {
			width:40%;
			float:left;
			padding-left: 10%;
		}

	}

	@media (min-width: 700px) {
		#postimg img {
			padding-top: 20px;
		}
	}

</style>

</body>

</html>