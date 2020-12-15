<?php
/*
Template Name: Page Template - ColungaLAB
*/

$current = 'lineas-de-accion';
$title = get_the_title();

$slides = get_field('slider_imagenes');


$intro = get_field('intro');
$circulos = get_field('circulos');

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



<section class="intro">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <h2>
        	<?php echo $title; ?>
        </h2>
        <h3><?php echo $intro; ?></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
      	<div class="row">
        <?php if(count($circulos)==3){
            $clase = 'col-xs-6 col-sm-4';
          }elseif(count($circulos)==4){
            $clase = 'col-xs-6 col-sm-3';
          }
          ?>
        <?php foreach ($circulos as $vez => $circulo) : ?>
          <?php $url_imagen = $circulo['imagen']['sizes']['w500']; ?>
          <div class="<?php echo $clase; ?> intro__context zoomIn wow"
              <?php if($vez>0): ?>data-wow-delay="<?php echo $vez; ?>s" <?php endif; ?>>
            <a class="img" data-toggle="modal" data-target="#impacto-modal<?php echo $vez; ?>">
              <img src="<?php echo $url_imagen; ?>" alt="<?php echo $circulo['texto']; ?>" class="intro__img">
              <div class="ver-mas">
                Ver más
              </div>
            </a>
            <h4 class="intro__title mb-circle"><?php echo $circulo['texto']; ?></h4>
            <?php
            if(!empty($circulo['link'])){
              ?>
              <p class="link-circle">
                <a target="_blank" href="<?=$circulo['link'];?>">
                  Seguir enlace
                </a>
              </p>
              <?php
            }
             ?>
          </div>

          <!-- Modal -->
          <div id="impacto-modal<?php echo $vez; ?>" class="directorio-modal impact-modal modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title"><?php echo $circulo['texto']; ?>:</h3>
                </div>
                <div class="modal-body">
                  <p>
                    <?php echo $circulo['descripcion']; ?>
                  </p>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
        <?php endforeach; ?>
      	</div>
      </div>
    </div>
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

<?php $convocatorias = get_field('convocatorias'); ?>
<?php if($convocatorias): ?>
  <section class="convocatorias">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="proyectos__sub-title">Convocatorias</h2>
        </div>
      </div>
      <div class="row">

        <?php foreach($convocatorias as $convocatoria): ?>
          <?php $url_imagen = get_the_post_thumbnail_url( $convocatoria->ID, 'w500' ); ?>
          <a href="<?php echo get_permalink($convocatoria->ID); ?>" class="box-proyecto col-md-3">
            <img class="box-proyecto__img" src="<?php echo $url_imagen; ?>" alt="Proyecto Lorem">
            <div class="box-proyecto__category">
              <?php
                $terms = get_the_terms( $convocatoria->ID, 'categoria_convocatoria' );
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
            </div>
            <p class="box-proyecto__title">
              <?php echo $convocatoria->post_title; ?>
            </p>
            <p class="box-proyecto__text">
              <?php echo $convocatoria->descripcion_corta; ?>
            </p>
            <?php if($convocatoria->postulaciones_abiertas): ?>
              <p class="estado-convocatoria">
                Convocatoria Abierta
              </p>
              <p class="btn-convocatoria">
                ¡Postula ahora!
              </p>
            <?php else: ?>
              <p class="estado-convocatoria">
                Convocatoria Cerrada
              </p>
              <p class="btn-convocatoria">
                Ver detalles
              </p>
            <?php endif; ?>
          </a>
        <?php endforeach; ?>
      </div>

      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <a href="<?php echo SITE_URL; ?>/convocatorias" class="btn btn-green">
            Ver todas las convocatorias
          </a>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


<?php get_template_part( 'partials/widget', 'nuestrared' ); ?>

<?php include('footer.php'); ?>
