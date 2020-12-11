<?php



$current = 'inicio';
$title = 'Inicio';
$siteName = get_bloginfo('name');
$slides = get_field('slider_imagenes');
$current_url = get_bloginfo('url');

/*INICIO SECCIONES*/
$titulo_pilares = get_field('titulo_seccion_pilares');
$pilares = get_field('pilares');

$titulo_transformacion = get_field('titulo_seccion_transformacion');
$sub_titulo_transformacion = get_field('sub_titulo_seccion_transformacion');
$lineas_de_trabajo = get_field('lineas_de_trabajo');

$titulo_colunga = get_field('titulo_seccion_colunga');
$accesos = get_field('accesos_colunga');

$titulo_rp = get_field('titulo_seccion_reserva-postulacion');
$fondo_rp = get_field('imagen_de_fondo_reserva-postulacion');
$reserva_postulacion = get_field('reserva-postulacion');

/*FIN SECCIONES*/

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
            <?php if($slide['url']): ?>
              <a href="<?php echo $slide['url']; ?>" onclick="ga('send', 'event', 'slider_home', clic', 'home');">
            <?php endif; ?>
              <img src="<?php echo $slide['imagen']['sizes']['w1600prefooter']; ?>">
              <?php if($slide['descripcion']): ?>
              <div class="container">
                <div class="row">
                  <div class="col-md-5 col-sm-7">
                    <div class="slider-txt-content">
                      <h4 class="title line-title green"><?php echo $slide['descripcion']; ?></h4>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php if($slide['url']): ?>
              </a>
            <?php endif; ?>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>


<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
?>

<section class="colungahub_page">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>



<section class="modelo">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center">
          <?=$titulo_pilares; ?>
        </h1>
      </div>
    </div>

    <div class="row">

      <?php foreach ($pilares as $pilar): ?>
        <div class="col-md-3">
            <div class="pilares">
              <!-- <a href="http://fundacioncolunga.localhost/lineas-de-accion/desarrollosocial/" class="no-style"> -->
                <img class="box-proyecto__img center-block" src="<?=$pilar["imagen"]["url"] ?>" alt="<?=$pilar["titulo"]; ?>">
              <!-- </a> -->
              <h3 class="text-center">
                <?=$pilar["titulo"]; ?>
              </h3>
              <p class="text-center">
                <?=$pilar["descripcion"]; ?>
              </p>
            </div>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if(!empty($titulo_transformacion) || !empty($sub_titulo_transformacion) || !empty($lineas_de_trabajo)){
  ?>
  <section class="transformacion">
    <div class="container">
      <?php
      if(!empty($titulo_transformacion)){
        ?>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center mb-8">
              <?=$titulo_transformacion; ?>
            </h1>
          </div>
        </div>
        <?php
      }
      ?>

      <?php
        if(!empty($sub_titulo_transformacion)){
          ?>
          <div class="row">
            <div class="col-lg-12">
              <h2 class="title line-title green mb-7 ml-6p">
                <?=$sub_titulo_transformacion; ?>
              </h2>
            </div>
          </div>
          <?php
        }
      ?>

      <?php
      if(!empty($lineas_de_trabajo)){
        ?>
        <div class="row">
          <?php foreach ($lineas_de_trabajo as $linea): ?>
            <div class="col-md-2">
              <div class="transformaciones">
                <div class="transformacion_icono">
                  <!-- <a href="http://fundacioncolunga.localhost/lineas-de-accion/desarrollosocial/" class="no-style"> -->
                  <img class="box-proyecto__img center-block" src="<?=$linea["imagen"]["url"]; ?>" alt="<?=$linea["titulo"]; ?>">
                  <!-- </a> -->
                </div>
                <h3 class="text-center">
                  <?=$linea["titulo"]; ?>
                </h3>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <?php
      }
      ?>
    </div>
  </section>
  <?php
}
?>

<section class="colunga">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center mb-5">
          <?=$titulo_colunga; ?>
        </h1>
      </div>
    </div>

    <div class="row">
      <?php $i = 1; foreach ($accesos as $acceso): ?>
      <div class="col-md-4">
        <div class="colunga_item">
          <div class="colunga_item_icono">
            <!-- <a href="http://fundacioncolunga.localhost/lineas-de-accion/desarrollosocial/" class="no-style"> -->
              <img class="box-proyecto__img center-block" src="<?=$acceso["imagen"]["url"] ?>" alt="<?=$acceso["titulo"]; ?>">
            <!-- </a> -->
          </div>
          <h3 class="text-center">
            <?=$acceso["titulo"]; ?>
          </h3>
          <p class="text-center">
            <?=$acceso["descripcion"]; ?>
          </p>
        </div>
      </div>
      <?php if($i % 3 == 0 && count($accesos) != $i): ?>
      </div>
      <div class="row">
      <?php endif; ?>
      <?php $i++; endforeach; ?>
      </div>

  </div>
</section>

<section class="espacio">
  <div class="container-fluid">
    <div class="row espacio_bg" style="background-image: url(<?=$fondo_rp["url"]; ?>)">
      <div class="col-md-12">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center"><?=$titulo_rp; ?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 col-lg-offset-1">
            <div class="row end-align mh_1 block-mobile">
              <div class="col-lg-6 no-padding">
                <div class="espacio_evento v-align">
                  <div class="w-100">
                    <p class="text-center">
                      <?=$reserva_postulacion[0]["titulo"]; ?>
                    </p>
                    <p class="text-center">
                      <a target="_blank" href="<?=$reserva_postulacion[0]["direccion_enlace"]; ?>">
                        <?=$reserva_postulacion[0]["texto_enlace"]; ?>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 no-padding">
                <div class="espacio_membresia v-align">
                  <div class="w-100">
                    <p class="text-center">
                      <?=$reserva_postulacion[1]["titulo"]; ?>
                    </p>
                    <p class="text-center">
                      <a href="<?=$reserva_postulacion[1]["direccion_enlace"]; ?>">
                        <?=$reserva_postulacion[1]["texto_enlace"]; ?>
                      </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
	endwhile;
else :
	header('location: '.$current_url);
  exit;
endif;
?>

<?php include('footer.php'); ?>
