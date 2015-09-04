<?php get_header(); ?>

		<div id="slider">
			<div id="carousel-example-generic" class="container-fluid wrapper" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<div class="text-center item active">
						<img class="img-responsive" style="width: 100%" src="<?php bloginfo('template_url'); ?>/images/banner.png" alt="">
						 <div class="carousel-caption format-stand">
					        <h4>Kỳ thi năng lực nhật ngữ cho chuyen ngành IT</h4>
							<p>Japanse literacy & IT Test(JLIT)</p>
							<a href="#">Đăng ký miễn phí</a><br><br>
							<img class="" src="<?php bloginfo('template_url'); ?>/images/arrow.png" alt="">
					      </div>
					</div>
				</div>
			</div>
		</div>
		<div>
		<?php 
			if(have_posts()):
			while (have_posts()): the_post();?>
			<h3><a><?php the_title(); ?></a></h3>
			<?php the_content()?>
			<?php 
			endwhile;
			else :
				echo '<p>No content found</p>';
			endif;
		?>		
		</div>
		
<?php get_footer(); ?>