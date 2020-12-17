<?php get_header(); ?>
<section class="hero-wrap hero-wrap-2" style="background-position: center; background-attachment: fixed; background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs mb-2">
          <span class="mr-2"><a href="<?php bloginfo('url'); ?>">Inicio <i class="ion-ios-arrow-forward"></i></a></span>
          <span class="mr-2"><a href="<?php echo bloginfo('url') . '/index.php/productos'; ?>">Nuestros Productos <i class="ion-ios-arrow-forward"></i></a></span>
        </p>
        <h1 class="mb-0 bread"><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>
<?php while (have_posts()) : the_post(); ?>
  <section class="ftco-section ftco-degree-bg services-2 py-5">
    <div class="container">
    <div class="row justify-content-center ">
        <div class="col-lg-12 ftco-animate text">
          <div class="img-content">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid">
          </div>
          <div class="tag-widget post-tag-container">
            <div class="tagcloud">
              <?php the_category(); ?>
            </div>
          </div>
          <?php the_content(); ?>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->
<?php endwhile; ?>
<?php get_footer(); ?>