<?php $args = array( 'post_type' => 'post' , 'posts_per_page' => 8); ?>
        <?php $loop = new WP_Query( $args ); ?>
<section class="ftco-section pb-0" id="products">
		<div class="container-fluid px-md-4">
			<div class="row justify-content-center pb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>Nuestros <span>envases</span></h2>
				</div>
			</div>
			<div class="row justify-content-center pb-5">
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>

				<div class="col-xs-6 col-md-6 col-xl-3 ftco-animate">
					<div class="work products-img mb-4 img d-flex align-items-end"
						style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
						<a href="<?php the_permalink(); ?>" class="icon image-popup d-flex justify-content-center align-items-center">
							<span class="fa fa-plus"></span>
						</a>
						<div class="desc w-100 px-4">
							<div class="text w-100 mb-3">
								<span><?php the_category(); ?></span>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile ?>
			</div>
			<p class="row ftco-animate justify-content-center pb-5 pt-5"><a href="<?php bloginfo('url'); ?>/index.php/envases" class="btn btn-primary mr-md-4 py-3 px-4">Ver envases</a></p>
		</div>
	</section>