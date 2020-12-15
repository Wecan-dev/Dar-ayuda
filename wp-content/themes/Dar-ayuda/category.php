<?php
get_header();
global $wp_query;
?>


<section class="hero-wrap hero-wrap-2" style="background-position: center; background-attachment: fixed; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/services.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2">
              <span class="mr-2"><a href="<?php bloginfo('url'); ?>">Inicio <i class="ion-ios-arrow-forward"></i></a></span>
              <span class="mr-2"><a href="<?php echo bloginfo('url') . '/index.php/envases'; ?>">Nuestros Envases <i class="ion-ios-arrow-forward"></i></a></span>
            </p>
                <h1 class="mb-0 bread"><?php echo $wp_query->found_posts; ?> Resultados para:
           "<?php the_search_query(); ?>" </h1>
            </div>
        </div>
    </div>
	</section>
  <?php if (have_posts()) : the_post(); ?>

    <section class="ftco-section" id="products">
		<div class="container-fluid px-md-4">
			<div class="row justify-content-center pb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>Búsqueda:  <span><?php the_search_query(); ?></span></h2>
				</div>
			</div>
			<div class="row justify-content-center ">
      <?php while (have_posts()) : the_post(); ?>
    <div class="col-md-3 ftco-animate">
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
		</div>
	</section>
  <?php else : ?>
    <div style="width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center;" >
      <div style="text-align: center;">
        <h1 style="color: #535a61; font-size: 70px;">No hay envases en esta categoría</h1><br>
        <p class="row ftco-animate justify-content-center pb-5 pt-5"><a href="<?php bloginfo('url'); ?>/index.php/envases"" class="btn btn-primary mr-md-4 py-3 px-4">Ver envases</a></p>
      </div>
    </div>
	<?php endif; ?>

<?php get_footer(); ?>