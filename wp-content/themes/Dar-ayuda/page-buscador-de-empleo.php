<?php get_header(); ?>
<section class="banner-small">
<?php get_template_part('partials/rr-ss'); ?>

  <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/image.png">
  <div class="banner-small__text">
    <h2 class="banner-small__title">
      Buscador de empleo
    </h2>
  </div>
</section>
<section class="search-general">
  <div class="padding-right-left padding-top-bottom">
    <h2 class="general-title">
      Oferta de Empleos
      <span></span>
    </h2>
    <div class="search-general__list">
    <?php $args = array('post_type' => 'empleos', 'posts_per_page' => -1); ?>
          <?php $loop = new WP_Query($args); ?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
          <div class="search-general__item">
            <div class="search-general__body">
              <div class="search-general__img">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
              </div>
              <div class="search-general__text">
                <h2 class="search-general__title">
                <?php the_title(); ?>
                </h2>
                <ul>
                  <li>
                    <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/work@3x.png"> 
                    <?php the_field( 'empresa' ); ?>
                  </li>
                  <li>
                    <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/location@3x.png">
                    <?php the_field( 'ubicacion' ); ?>
                  </li>
                  <li>
                    <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/money@3x.png">
                    <?php the_field( 'prestaciones' ); ?>
                  </li>
                </ul>
              </div>
            </div>
            <a class="search-general__btn" href="<?php the_permalink(); ?>">
              Aplicar ahora
            </a>
          </div>
      <?php endwhile ?>

    </div>

<!--     <div class="d-flex justify-content-center">
      <a class="general-btn__green" href="">+ Mostrar más trabajos</a>
    </div> -->
  </div>
</section>
<?php get_footer(); ?>