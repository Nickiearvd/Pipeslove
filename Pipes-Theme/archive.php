<?php get_header(); ?>
<div class="background">
</div>
<div id='content'>
<div class="postgrid">
	<div class='navgrid'>
		<?php
			$terms = get_terms(array(
				'taxonomy' => 'kategori',
				'hide_empty' => true ));
		?>
		<ul>
			<?php 
				foreach ($terms as $value) { ?>
				<a href="/kategori/<?php echo $value->slug ?>">
					<div class='box'>
				 	<li>
				 	<?php echo $value->name ?>
					</li></div></a>

			<?php };?>
		</ul>
	</div>
	<?php $args = array(
		'post_type'       =>  'mat_dryck',);
	?>
</div>
</div>
	
<?php get_footer(); ?>


		<style>
			html{
				position:relative;
			}
			.background{
				background: url(img/pipes1.png) no-repeat center center;
				background-size: 100%;
				background-color:grey;
				height:100vh;
				width:100%;
				top:0;
				position:absolute;
				z-index: -10;

			}
			.content{
				height:500px;
				margin-top: 150px;
			}
			.postgrid{
				z-index: 10;

			}
			.navgrid ul {
				margin:0 auto;
				width:60%;
				box-sizing: border-box;
				padding:0;
			}
			.box{
				width:200px;
				height: 200px;
				display: inline-block;
				background-color: white;
				text-align:center;
				line-height: 200px;
				box-sizing: border-box;
				margin-right: 50px;

			}
				.navgrid ul li{
					list-style: none;
					display: inline;
					text-align:center;


				}
				.navgrid a{
					text-transform: uppercase;
					font-family: helvetica;
					text-decoration: none;
					font-weight: lighter;
					color:black;
					font-size: 20px;
				}
				.navgrid a:hover{
					color:brown;

				}
			</style>