<?php
/*
Template Name: Page Template - Gracias (EVENTO)
*/

$current = 'noticias-y-eventos';
$title = get_the_title();
$imagen_destacada = get_field('imagen_destacada');
$titulo_imagen = get_field('titulo_imagen');
$texto_imagen = get_field('texto_imagen');
$titulo = get_field('titulo');
$bajada = get_field('bajada');

$noticia_principal_destacada = get_field('noticia_principal_destacada', 'option');
$noticias_destacadas = get_field('noticias_destacadas', 'option');

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


  <?php if($noticia_principal_destacada): ?>
  <section class="noticias">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h5 class="">Noticias destacadas</h5>
        </div>
        <div class="col-md-6 text-right hidden-sm hidden-xs">
          <a  class="link-grey" href="<?php echo SITE_URL; ?>/noticias" >Ver todas las noticias</a>
        </div>
      </div>
      <div class="row mt-30">

        <?php if($noticia_principal_destacada): ?>
          <?php $fecha = get_the_time('j · F · Y',$noticia_principal_destacada[0]->ID); ?>
          <?php $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($noticia_principal_destacada[0]->ID), 'thumbnail')[0]; ?>
          <a href="<?php echo get_permalink($noticia_principal_destacada[0]->ID); ?>">
            <div class="col-md-7 destacado">
              <div class="img-destacada">
                <img src="<?php echo $url_imagen;?>" alt="noticia destacada"/>
              </div>
              <div class="text-content-left">
                <h5 class="date"><?php echo $fecha; ?></h5>
                <h1 class="title-destacado"><?php echo $noticia_principal_destacada[0]->post_title; ?></h1>
                <h4 class="link transition">Seguir leyendo la noticia</h4>
              </div>
            </div>
          </a>
        <?php endif; ?>


        <div class="col-md-5 noticias-2c -flex">
        <?php if($noticias_destacadas): ?>
          <?php foreach($noticias_destacadas as $noticia): ?>
            <?php $fecha = get_the_time('j · F · Y',$noticia->ID); ?>
            <a href="<?php echo get_permalink($noticia->ID); ?>">
              <div class="noticia-content">
                <h5 class="date"><?php echo $fecha; ?></h5>
                <h3 class="title"><?php echo $noticia->post_title; ?></h3>
                <h4 class="link transition">Seguir leyendo la noticia</h4>
              </div>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>

      </div>
      <div class="visible-sm visible-xs link-ver">
        <a class="link-grey" href="<?php echo SITE_URL; ?>/noticias">Ver todas las noticias</a>
      </div>
    </div>
  </section>
  <?php endif; ?>

<?php include('footer.php'); ?>