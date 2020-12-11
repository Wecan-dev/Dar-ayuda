<?php
/*
Template Name: Page Template - Gracias (FONDO)
*/

$current = 'fondo-de-inversion';
$title = get_the_title();
$imagen_destacada = get_field('imagen_destacada');
$titulo_imagen = get_field('titulo_imagen');
$texto_imagen = get_field('texto_imagen');
$titulo = get_field('titulo');
$bajada = get_field('bajada');

$red_titulo = get_field('red_titulo', 'option');
$red_bajada = get_field('red_bajada', 'option');
$pagina_formulario_inversionistas = get_field('pagina_formulario_inversionistas', 'option');
$fundaciones_destacadas = get_field('fundaciones_destacadas', 'option');


include('header.php'); ?>

  <div class="slide box-align-down first">
    <div class="cont-img-slider">
      <?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>
      <img src="<?php echo $url_imagen_destacada; ?>">
      <?php if($titulo_imagen != ''): ?>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-10">
            <div class="slider-txt-content">
              <h1 class="title line-title pink"><?php echo $titulo_imagen; ?></h1>
              <p>
                <?php echo $texto_imagen; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <section class="border-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1 class="title"><?php echo $titulo; ?></h1>
        </div>
        <div class="col-md-8 col-md-offset-2">
          <p class="parrafo-lg">
            <?php echo $bajada; ?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1>¡Estamos un paso más cerca de lograr juntos la sociedad que ambos soñamos!</h1>
        </div>
      </div>
    </div>
  </section>

  <div class="content-half -grey">
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
          <div class="description nuestra-red">
            <h1 class="title line-title pink"><?php echo $red_titulo; ?></h1>
            <p><?php echo $red_bajada; ?></p>
            <a href="<?php echo SITE_URL; ?>/nuestra-red" class="btn btn-md btn-light-green">Conoce nuestra red</a>
            <a href="<?php echo $pagina_formulario_inversionistas; ?>" class="light-green link d-block">Invierte en nuestras iniciativas</a>
          </div>
        </div>
        <div class="col-sm-7 no-padding">
          <div class="slider-half">
            <?php if($fundaciones_destacadas): ?>
            <?php foreach($fundaciones_destacadas as $fundacion): ?>
              <?php $url = get_the_post_thumbnail_url( $fundacion->ID, 'w1080' ); ?>
              <div class="content-slider">
                <a href="<?php echo get_permalink($fundacion->ID); ?>">
                  <img src="<?php echo $url ?>" alt="<?php echo $fundacion->post_title; ?>">
                </a>
                <div class="fundacion-name">
                  <h3 class="bold"><?php echo $fundacion->post_title; ?></h3>
                </div>
              </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('footer.php'); ?>