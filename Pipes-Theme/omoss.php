<?php /* Template Name: omoss */ ?>

<?php get_header();?>
<div id="content">
<div class="background">
    <div id="post">
    	<div id="imageSide">
            <?php the_post_thumbnail();?>
        </div>
    	<div id="textSide">
    		<h2>Om oss</h2>
                <?php 
                    if(have_posts()): 
                        while ( have_posts()) :
                            the_post(); 
                            the_content();
                        endwhile;
                    endif; 
                ?>      


       </div>
       
   </div>
</div>
</div>        
           
    <footer>
        <?php get_footer();?>
    </footer>
</body>

<style>

	.background {
	background-color: rgba(21, 21, 21, 0.8);
	width: 100%;
	height: 100vh;
	z-index: 100;
}

	#content {
		overflow: hidden;
		width: 100%;
		height:auto;
		z-index: 1;

	}

	img {
		width:45%;
		height:auto;
		background-size: 45%;
		float:left;
		overflow: hidden;
		padding-top: 30px;
		padding-bottom: 30px;
		padding-right: 3%;
		padding-left: 4%;



	}

	#textSide {
		width:45%;
		height:auto;
		color:#fff;
		margin:auto;
		padding-top:30px;
		padding-bottom: 30px;
		float:left;
		overflow: hidden;
	}

	@media (max-width: 800px){
		#textSide {
			width:80%;
		}
	}
</style>

</html>