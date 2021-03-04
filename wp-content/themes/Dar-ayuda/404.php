<?php get_header(); ?>
    <!-- Banner-->
  <section class="banner-small banner-small--404">
    <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/404-image.png">
    <div class="banner-small__text"></div>
  </section>
  <section class="error-404">
    <div class="padding-top-bottom padding-right-left">
      <h2 class="error-404__title">
        LO SENTIMOS
      </h2>
      <h2 class="error-404__subtitle">
        no podemos encontrar la página que estás buscando
      </h2>
      <div class="d-flex justify-content-center">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.png">
      </div>
      <p>
        te llevamos de regreso
      </p>
      <div class="d-flex justify-content-center">
        <a class="general-btn__green" href="<?php echo bloginfo('url'); ?>">Regresar a Inicio</a>
      </div>
    </div>
  </section>
 
  <?php get_footer(); ?>