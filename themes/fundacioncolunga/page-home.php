<?php
/*
Template Name: Page Template - Home
*/

$current = 'inicio';
$title = 'Inicio';
$siteName = get_bloginfo('name');
$slides = get_field('slider_imagenes');

$seccion_impacto_titulo = get_field('seccion_impacto_titulo');
$impactos = get_field('impactos');

$convocatorias = get_field('convocatorias');

$seccion_3_imagen = get_field('s3_imagen');
$seccion_3_texto = get_field('s3_texto');

/*$seccion_1_texto = get_field('texto_grande');
$seccion_1_item_1 = get_field('item_1');
$seccion_1_item_2 = get_field('item_2');
$seccion_1_item_3 = get_field('item_3');

$seccion_2_titulo = get_field('s2_titulo');
$seccion_2_item_1 = get_field('s2_item_1');
$seccion_2_item_2 = get_field('s2_item_2');
$seccion_2_item_3 = get_field('s2_item_3');
$seccion_2_item_4 = get_field('s2_item_4');

$red_titulo = get_field('red_titulo', 'option');
$red_bajada = get_field('red_bajada', 'option');
$pagina_formulario_inversionistas = get_field('pagina_formulario_inversionistas', 'option');
$fundaciones_destacadas = get_field('fundaciones_destacadas', 'option');

*/
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
              <div class="container">
                <div class="row">
                  <div class="col-md-5 col-sm-7">
                    <div class="slider-txt-content">
                      <h4 class="title line-title green"><?php echo $slide['descripcion']; ?></h4>
                    </div>
                  </div>
                </div>
              </div>
            <?php if($slide['url']): ?>
              </a>
            <?php endif; ?>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>

<?php get_template_part( 'seccion', 'noticias' ); ?>



<section>
	  <div class="container">
		<div class="row justify-content-center">
				 <h2 class="mt-2 text-center h1">Conoce más sobre la campaña <a href="https://laotradistanciasocial.cl" target="_blank" class="h1">La Otra Distancia Social</a></h2>
				 <p style="padding: 20px 10%;" class="mb-3 text-center"><big>Estar informado/a también ayuda a disminuir esta brecha y a ayudad a casi un millón de niñas, niños y adolescentes que viven en situación de pobreza en Chile. Visita: <a href="https://laotradistanciasocial.cl" target="_blank">www.laotradistanciasocial.cl</a></big></p>
			
				<div class="col-12">
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mGgDeFtL0z4?rel=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

</section>

<?php get_template_part( 'partials/widget', 'tebrindamos' ); ?>

<section class="intro">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h3><!--Buscamos proyectos sociales con impacto en <strong>pobreza y educación</strong> que generen impacto a través de:-->
            <?php echo $seccion_impacto_titulo; ?>
          </h3>
        </div>
      </div>
      <div class="row">
        <?php if(count($impactos)==3){
            $clase = 'col-md-4';
          }elseif(count($impactos)==4){
            $clase = 'col-md-3';
          }
          ?>
        <?php foreach ($impactos as $vez => $impacto) : ?>
          <?php $url_imagen = $impacto['imagen']['sizes']['w500']; ?>
          <div class="<?php echo $clase; ?> col-sm-6 intro__context zoomIn wow"
              <?php if($vez>0): ?>data-wow-delay="<?php echo $vez; ?>s" <?php endif; ?>>
            <a class="img" data-toggle="modal" data-target="#impacto-modal<?php echo $vez; ?>">
              <img src="<?php echo $url_imagen; ?>" alt="<?php echo $impacto['texto']; ?>" class="intro__img">
              <div class="ver-mas">
                Ver más
              </div>
            </a>
            <h4 class="intro__title"><?php echo $impacto['texto']; ?></h4>
          </div>

          <!-- Modal -->
          <div id="impacto-modal<?php echo $vez; ?>" class="directorio-modal impact-modal modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title"><?php echo $impacto['texto']; ?>:</h3>
                </div>
                <div class="modal-body">
                  <p>
                    <?php echo $impacto['descripcion']; ?>
                  </p>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
        <?php endforeach; ?>
      </div>
    </div>
  </section>

<?php
$titulo_iconos_home = get_field('titulo_iconos_home');
$texto_icono_1 = get_field('texto_icono_1');
$texto_icono_2 = get_field('texto_icono_2');
$texto_icono_3 = get_field('texto_icono_3');
$texto_icono_4 = get_field('texto_icono_4');

?>
  <section class="inversion-social">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center title-content">
          <h1 class=""><?php echo $titulo_iconos_home; ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6 text-center fondos-item wow fadeInDown">
          <img class="icon" src="<?php echo TEMPLATE_URL; ?>/assets/img/ticket.png" alt="red de transformadores">
          <div class="title-content">
            <h4 class="bold"><?php echo $texto_icono_1; ?></h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 text-center fondos-item wow fadeInDown" data-wow-delay="1s">
          <img class="icon" src="<?php echo TEMPLATE_URL; ?>/assets/img/ticket-herramientas.png" alt="herramientas">
          <div class="title-content">
            <h4 class="bold"><?php echo $texto_icono_2; ?></h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 text-center fondos-item wow fadeInDown" data-wow-delay="1.5s">
          <img class="icon" src="<?php echo TEMPLATE_URL; ?>/assets/img/ticket-aporte.png" alt="aporte economico">
          <div class="title-content">
            <h4 class="bold"><?php echo $texto_icono_3; ?></h4>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 text-center fondos-item wow fadeInDown" data-wow-delay="2s">
          <img class="icon" src="<?php echo TEMPLATE_URL; ?>/assets/img/ticket-espacio.png" alt="espacios de trabajo">
          <div class="title-content">
            <h4 class="bold"><?php echo $texto_icono_4; ?></h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php get_template_part( 'partials/widget', 'nuestrared' ); ?>



<?php include('footer.php'); ?>
