<?php /* Template Name: omoss */ ?>

<?php get_header();?>
<div class="background">
<div id="content">
<div id="omoss">
 <h2>Om oss</h2>
    <div id="post">
    	<div id="imageSide">
            <?php the_post_thumbnail();?>
        </div>
    	<div id="textSide">
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
   <div id="rektangel" class="kontaktw"> <?php dynamic_sidebar( 'kontakt' ); ?> </div><br>

   <div id="omoss">
   <?php dynamic_sidebar( 'map' ); ?>
   </div>

</div>
</div>
           
    <footer>
        <?php get_footer();?>
    </footer>
</body>

<style>



	.widget-title {
		padding-bottom: 0;
	}

	#omoss {
		background-color: #fff;
		overflow: hidden;
		padding-top: 30px;

	}
	
	h2 {
		text-align: center;
		margin-bottom:0px;
		margin-top: 0px;
	}

	#post {
		width:100%;
		margin:auto;
	}

	.background {
	background-color: rgba(21, 21, 21, 0.8);
	width: 100%;
	height: 100%;
	z-index: 100;

}

	#content {
		padding-top:100px;
		overflow: hidden;
		width: 100%;
		height:auto;
		z-index: 1;

	}

	.kontaktw {
		color:#fff;
		text-align: center;
		margin-top: 20px;
		padding:0;
	}

	.kontaktw a {
		color:#fff;
	}

	#rektangel {
		padding:0;
		margin-top: 30px;
		margin-bottom: 10px;
		padding-bottom: 20px;
	}

	img {
		width:80%;
		height:auto;
		background-size: 45%;
		float:none;
		overflow: hidden;
		padding-bottom: 0px;
		padding-right: 3%;
		padding-left: 4%;



	}

	#textSide {
		width:80%;
		height:auto;
		margin:auto;
		padding-top:20px;
		padding-bottom: 30px;
		float:none;
		overflow: hidden;
	}

@media (min-width: 900px) {

	img {
		width:45%;
		float:left;
		padding-bottom: 40px;
	}

	#textSide {
		width:45%;
		float:left;
		padding-top: 0px;
	}

	
	#post {
		width:80%;
	}

}

@media (min-width: 1200px) {

}

</style>

</html>