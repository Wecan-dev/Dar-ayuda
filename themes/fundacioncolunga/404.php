<?php

$title = 'Página no encontrada';

include('header.php'); ?>

  <div class="slide box-align-down first">
    <div class="cont-img-slider">
      <img src="<?php echo TEMPLATE_URL; ?>/assets/img/slide-nuestra-red.png">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-10">
            <div class="slider-txt-content error">
              <h1 class="line-title title green">Error 404</h1>
              <p>
                La página que estás buscando no existe. Te recomendamos <a href="<?php echo SITE_URL; ?>">volver al inicio</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php get_template_part( 'seccion', 'noticias' ); ?>
  <?php //get_template_part( 'seccion', 'evento-destacado' ); ?>

  <div class="slide slide-about box-align-up">
    <div class="cont-img-slider">
      <img src="<?php echo TEMPLATE_URL; ?>/assets/img/slider-kids.png">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-10">
            <div class="slider-txt-content resize">
              <h4 class="title line-title pink">Apoyamos a personas y organizaciones que lideran iniciativas innovadoras y de alto impacto en el mundo de la educación y la superación de la pobreza, colaborando en el desarrollo de mejores políticas sociales.</h4>
              <a href="<?php echo SITE_URL; ?>/conocenos#nuestro-impacto" class="btn btn-xs btn-light-green mt-30">Impacto</a>
              <a href="<?php echo SITE_URL; ?>/conocenos#nuestra-historia" class="btn btn-xs btn-light-green mt-30">Historia</a>
              <a href="<?php echo SITE_URL; ?>/conocenos#equipo" class="btn btn-xs btn-light-green mt-30">Equipo</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('footer.php'); ?>
