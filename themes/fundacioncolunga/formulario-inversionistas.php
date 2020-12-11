<?php
/*
Template Name: Page Template - Formulario Inversionistas
*/

$current = 'nuestra-red';
$title = get_the_title();
$titulo_imagen = get_field('titulo_imagen');
$imagen_destacada = get_field('imagen_destacada');
$texto_imagen = get_field('texto_imagen');

include('header.php');

?>
  <div class="slide box-align-down first">
    <div class="cont-img-slider">
      <a href="#">
        <?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>
        <img src="<?php echo $url_imagen_destacada; ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-10">
            <?php if($titulo_imagen): ?>
              <div class="slider-txt-content">
                <h1 class="title line-title pink"><?php echo $titulo_imagen; ?></h1>
                <p>
                  <?php echo $texto_imagen; ?>
                </p>
              </div>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>

  <section id="postulacion" class="postulacion">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Completa el formulario.</h1>

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
            endwhile; endif;
           ?>
        </div>
      </div>
    </div>
  </section>



<?php include('footer.php'); ?>