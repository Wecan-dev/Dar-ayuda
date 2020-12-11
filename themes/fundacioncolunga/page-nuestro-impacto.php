<?php

$current = 'conocenos';
$title = get_the_title();
$slides = get_field('slider_imagenes');

$nuestro_impacto_bajada = get_field('nuestro_impacto_bajada');
$impactos = get_field('impactos');


$titulo_infografia = get_field('titulo_infografia');

/*$nuestra_historia_imagen = get_field('nuestra_historia_imagen');*/

include('header.php');

?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
    ?>

<?php if($slides): ?>
  <div class="slider-wrapper">
    <div class="slide-custom-arrows">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="slide-custom-arrows-block">
              <div class="slide-custom-arrow prev"></div>
              <div class="slide-custom-arrow next"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="slide first home">
      <?php foreach($slides as $slide): ?>
          <div class="cont-img-slider">
            <img src="<?php echo $slide['imagen']['sizes']['w1600']; ?>">
            <div class="container">
              <div class="row">
                <div class="col-md-5 col-sm-7">
                  <div class="slider-txt-content">
                    <h4 class="title line-title green"><?php echo $slide['texto']; ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>

<?php if($impactos): ?>
<section id="nuestro-impacto">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <h1><?=$title ?></h1>
      </div>
      <div class="col-md-10 col-md-offset-1">
        <div class="parrafo-lg">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="list-impacto d-block group-<?php echo count($impactos); ?>">
          <?php foreach ($impactos as $vez => $impacto): ?>
            <li>
              <div class="circle-pink">
                <h1 id="nosotros-<?php echo $vez+1; ?>" class="light-green"><?php echo $impacto['valor']; ?></h1>
              </div>
              <div class="title-content">
                <h4 class="bold dark-green text-center">
                  <?php echo $impacto['texto']; ?>
                </h4>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php
endwhile;
endif;
?>


<script type="text/javascript">
  $(document).ready(function() {
     var oneTime =true;
      $('#nuestro-impacto').waypoint(function(){
          if (oneTime) {
              <?php $vel_init = 1000; ?>
              <?php foreach ($impactos as $vez => $impacto): ?>
                $('#nosotros-<?php echo $vez+1; ?>').animateNumber({ number: <?php echo $impacto['valor']; ?> }, <?php echo $vel_init+1000; ?>);
              <?php endforeach; ?>
              oneTime = false;
          };
      });

   });
</script>

<?php include('footer.php'); ?>
