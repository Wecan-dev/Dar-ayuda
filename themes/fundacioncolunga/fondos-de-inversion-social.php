<?php
/*
Template Name: Page Template - Fondos de inversión social
*/

$current = 'lineas-de-accion';
$title = get_the_title();

$slides = get_field('slider_imagenes');
$fis_bajada = get_field('fis_bajada');
$circulos = get_field('circulos');

$criterios_de_inversion_titulo = get_field('criterios_de_inversion_titulo');
$criterios_de_inversion_bajada = get_field('criterios_de_inversion_bajada');
$criterios_de_inversion = get_field('criterios_de_inversion');

$focos_tematicos_titulo = get_field('focos_tematicos_titulo');
$focos_tematicos_bajada = get_field('focos_tematicos_bajada');
$focos_tematicos = get_field('focos_tematicos');

include('header.php');

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


<section id="nuestro-impacto">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <h1><?php echo $title; ?></h1>
      </div>
      <div class="col-md-10 col-md-offset-1">
        <p class="parrafo-lg">
          <?php echo $fis_bajada; ?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="list-impacto d-block group-<?php echo count($circulos); ?>">
          <?php foreach ($circulos as $vez => $circulo): ?>
          <li>
            <div class="circle-pink">
              <h1 id="nosotros-<?php echo $vez+1; ?>" class="light-green"><?php echo $circulo['valor']; ?></h1>
            </div>
            <div class="title-content">
              <h4 class="bold dark-green text-center">
                <?php echo $circulo['texto']; ?>
              </h4>
            </div>
          </li>
          <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>



<!-- FONDOS -->

<?php
  $args = array(
    'post_type' => 'fondos',
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'ASC',
    'posts_per_page' => -1
  );
  $query_fondos = new WP_Query($args);
  $cont = 1;
  if($query_fondos->have_posts())
  {

    while($query_fondos->have_posts())
    {
      $query_fondos->next_post();
?>
<section class="post-slider">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3 class="line-title green">
          <?php echo $query_fondos->post->post_title; ?>
        </h3>
        <p>
          <?php echo $query_fondos->post->descripcion_corta; ?>
        </p>
        <?php if($query_fondos->post->descripcion_larga): ?>
        <div class="post-hide">
          <?php // echo $query_fondos->post->descripcion_larga; ?>
          <?php echo the_field('descripcion_larga', $query_fondos->post->ID, true, true);?>
        </div>
        <div>
          <a href="" class="ver ver-mas">Ver más</a>
          <a href="" class="ver ver-menos hide">Ver menos</a>
        </div>
        <?php endif; ?>

        <?php if($query_fondos->post->postulaciones_abiertas): ?>
        <a href="<?php echo SITE_URL; ?>/convocatorias" class="btn btn-green">
          Postula ahora
        </a>
        <h4>
          <?php echo $query_fondos->post->fecha_postulaciones; ?>
        </h4>
        <?php endif; ?>

        <?php if($query_fondos->post->postulaciones_cerradas): ?>
            <a href="<?php echo SITE_URL; ?>/convocatorias" class="btn btn-green">
            Ver convocatorias anteriores
          </a>
          <h4>
            <?php echo $query_fondos->post->fecha_postulaciones; ?>
          </h4>
        <?php endif; ?>
      </div>
      <div class="col-md-6">
        <h5>
          Iniciativas apoyadas
          <!-- FUNDACIONES elegidas desde el admin -->
        </h5>
        <?php $iniciativas_apoyadas = get_field('iniciativas_apoyadas', $query_fondos->post->ID );?>
        <div class="slider-post">
          <?php foreach ($iniciativas_apoyadas as $fundacion):?>
            <?php $url_imagen = get_the_post_thumbnail_url( $fundacion->ID, 'w780' ); ?>
            <div>
              <img src="<?php echo $url_imagen; ?>" alt="">
              <div class="slide-txt">
                <strong>
                  <?php echo $fundacion->post_title; ?>
                </strong>
                <br>
                Apoyo: <?php
                  $terms = get_the_terms( $fundacion->ID, 'tipo_proyecto' );
                  $cont = 1;
                  foreach($terms as $term) {
                    if($cont==1){
                      echo $term->name.' ';
                    }else{
                      echo ', '.$term->name;
                    }
                    $cont++;
                  }
                ?>
                <?php
                $anio_de_apoyo = get_field('anio_de_apoyo', $fundacion->ID);
                if($anio_de_apoyo):  ?>
                  <br>
                  Año: <?php echo $anio_de_apoyo; ?>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</section>
<?php
    }
  }
?>

<?php
if(!empty($focos_tematicos)){
  ?>
<section class="colungafis criterios">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h1 class=""><?=$focos_tematicos_titulo;?></h1>
        <h2>
          <?php echo $focos_tematicos_bajada; ?>
        </h2>
      </div>
    </div>

      <?php $cont = 1; ?>
      <?php foreach ($focos_tematicos as $criterio): ?>
          <?php if($cont == 1): ?>
            <div class="row">
          <?php endif; ?>
          <div class="col-sm-4">
            <div class="item -fondos">
              <h3 class="title line-title green"><?php echo $criterio['titulo']; ?></h3>
              <p>
                <?php echo $criterio['descripcion']; ?>
              </p>
            </div>
          </div>
          <?php if($cont == 3): $cont=0; ?>
            </div>
          <?php
            endif;
            $cont=$cont+1;
          ?>
      <?php endforeach; ?>
  </div>
</section>
<?php
}
?>


<section class="colungafis criterios">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h1 class=""><?=$criterios_de_inversion_titulo;?></h1>
        <h2>
          <?php echo $criterios_de_inversion_bajada; ?>
        </h2>
      </div>
    </div>

    <?php $cont = 1; ?>
    <?php foreach ($criterios_de_inversion as $criterio): ?>
        <?php if($cont == 1): ?>
          <div class="row">
        <?php endif; ?>
        <div class="col-sm-4">
          <div class="item -fondos">
            <h3 class="title line-title green"><?php echo $criterio['titulo']; ?></h3>
            <p>
              <?php echo $criterio['descripcion']; ?>
            </p>
          </div>
        </div>
        <?php if($cont == 3): $cont=0; ?>
          </div>
        <?php
          endif;
          $cont=$cont+1;
        ?>
    <?php endforeach; ?>
  </div>
</section>


<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>
<section class="texto-libre">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="line-title green">
          <?php echo the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>


<script type="text/javascript">
  $(document).ready(function() {
     var oneTime =true;
      $('#nuestro-impacto').waypoint(function(){
          if (oneTime) {
              <?php $vel_init = 1000; ?>
              <?php foreach ($circulos as $vez => $circulo): ?>
                $('#nosotros-<?php echo $vez+1; ?>').animateNumber({ number: <?php echo $circulo['valor']; ?> }, <?php echo $vel_init+1000; ?>);
              <?php endforeach; ?>
              oneTime = false;
          };
      });

   });

</script>


<?php include('footer.php'); ?>
