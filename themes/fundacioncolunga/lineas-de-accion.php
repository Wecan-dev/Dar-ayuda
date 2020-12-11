<?php
/*
Template Name: Page Template - Líneas de acción
*/


$current = 'lineas-de-accion';
$title = 'Líneas de acción';
$slides = get_field('slider_imagenes');


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
    <div class="slide first">
      <?php foreach($slides as $slide): ?>
          <div class="cont-img-slider">
            <img src="<?php echo $slide['imagen']['sizes']['w1600']; ?>">
            <?php if($slide['texto']): ?>
            <div class="container">
              <div class="row">
                <div class="col-md-5 col-sm-7">
                  <div class="slider-txt-content">
                    <h4 class="title line-title green"><?php echo $slide['texto']; ?></h4>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>


<section class="bajada-general">
	<div class="grid height-auto">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2>
						Estas son las líneas de trabajo de Fundación Colunga
					</h2>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Bloque ColungaFIS -->
<?php
  $colunga_fis_titulo = get_field('colunga_fis_titulo_2');
  $colunga_fis_bajada = get_field('colunga_fis_bajada_2');

  $colunga_fis_cta = get_field('colunga_fis_cta');
  $colunga_fis_label = get_field('colunga_fis_label');
  $colunga_fis_link = get_field('colunga_fis_link');
?>
<section id="colungafis" class="box-grey colungafis">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class=""><?=$colunga_fis_titulo;?></h1>
        <h2>
          <?php echo $colunga_fis_bajada; ?>
        </h2>
      </div>
    </div>

    <div class="row">

      <?php
        $args = array(
          'post_type' => 'fondos',
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
          <div class="col-sm-4 no-padding">
            <div class="no-style" >
              <div class="item -fondos">
                <h3 class="title line-title green"><?php echo $query_fondos->post->post_title; ?></h3>
                <?php if($query_fondos->post->descripcion_corta): ?>
                <p>
                  <?php echo $query_fondos->post->descripcion_corta; ?>
                </p>
                <?php endif; ?>
                <!--<div class="link">
                  Ir al formulario de postulación
                </div>-->
              </div>
            </div>
          </div>
      <?php
          }
        }
      ?>
    </div>
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <h3 class="line-title green">
          <?=$colunga_fis_cta;?>
        </h3>
        <a href="<?=$colunga_fis_link;?>" class="btn btn-green">
          <?=$colunga_fis_label;?>
        </a>
      </div>
    </div>
  </div>
</section>



<!-- BLOQUE COLUNGA HUB -->
<?php
/*
  $colunga_hub_bajada = get_field('colunga_hub_bajada');
  $colunga_hub_listado = get_field('colunga_hub_listado');
  $colunga_hub_espacios = get_field('colunga_hub_espacios');
?>
<section id="colungahub" class="colungahub">
  <div class="container">
    <div class="row">
      <!-- <div class="col-md-12">
        <h1>
          ColungaHUB
        </h1>
        <h2>
          <?php echo $colunga_hub_bajada; ?>
        </h2>
      </div> -->
      <div class="col-md-5">
        <h1 class="line-title green">
          ColungaHUB
        </h1>
        <h2>
          <?php echo $colunga_hub_bajada; ?>
        </h2>
        <ul class="">
          <?php foreach($colunga_hub_listado as $lista): ?>
          <li>
            <?php echo $lista['item']; ?>
          </li>
          <?php endforeach; ?>
        </ul>
        <a href="<?php echo SITE_URL; ?>/colungahub" class="btn btn-green">Ir a ColungaHUB</a>
      </div>
      <div class="col-md-7">
        <div class="slider-hub">
          <?php foreach ($colunga_hub_espacios as $espacio): ?>
            <?php $url_imagen = $espacio['imagen']['sizes']['w780']; ?>
          <div class="slide-hub">
            <img src="<?php echo $url_imagen; ?>" alt="">
            <?php if($espacio['titulo']!='' or $espacio['bajada']!='' ): ?>
            <div class="slide-txt">

              <?php if($espacio['titulo']!=''): ?>
              <strong>
                <?php echo $espacio['titulo']; ?>
              </strong>
              <?php endif; ?>

              <?php if($espacio['bajada']!=''): ?>
                <br>
                <?php echo $espacio['bajada']; ?>
              <?php endif; ?>
            </div>
            <?php endif; ?>

          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
<!--     <div class="row">
      <div class="col-md-5 col-md-offset-2">
        <h3>
          Ven a conocer ColungaHUB
        </h3>
      </div>
      <div class="col-md-5">
        <a href="http://www.colungahub.org" target="_blank" class="btn btn-green">Ir a ColungaHUB</a>
      </div>
    </div> -->
  </div>
</section>
<?php
*/
?>



<!-- BLOQUE COLUNGA LAB -->
<?php
  $colunga_lab_titulo = get_field('colunga_lab_titulo');
  $colunga_lab_bajada = get_field('colunga_lab_bajada');
  $colunga_lab_circulos = get_field('colunga_lab_circulos');

  $colunga_lab_cta = get_field('colunga_lab_cta');
  $colunga_lab_label = get_field('colunga_lab_label');
  $colunga_lab_link = get_field('colunga_lab_link');
?>
<section id="colungalab" class="colungahub colungalab">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>
          <?=$colunga_lab_titulo;?>
        </h1>
        <h2>
          <?php echo $colunga_lab_bajada; ?>
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        <div class="row">
          <?php if(count($colunga_lab_circulos)==3){
              $clase = 'col-xs-6 col-sm-4';
            }elseif(count($colunga_lab_circulos)==4){
              $clase = 'col-xs-6 col-sm-3';
            }
          ?>
          <?php foreach ($colunga_lab_circulos as $vez => $circulo): ?>
            <?php $url_imagen = $circulo['imagen']['sizes']['w500']; ?>
            <div class="<?php echo $clase; ?> col-sm-6 intro__context zoomIn wow"
              <?php if($vez>0): ?>data-wow-delay="<?php echo $vez; ?>s" <?php endif; ?>>
              <a class="img" data-toggle="modal" data-target="#impacto-modal<?php echo $vez; ?>">
                <img src="<?php echo $url_imagen; ?>" alt="<?php echo $circulo['texto']; ?>" class="intro__img">
                <div class="ver-mas">
                  Ver más
                </div>
              </a>
              <h4 class="intro__title"><?php echo $circulo['texto']; ?></h4>
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

    <?php
      $args_ca = array(
      'post_type' => 'convocatoria',
      'meta_query'  => array(
        array(
          'key'     => 'postulaciones_abiertas',
          'value'     => '1',
          'compare'   => '=',
        ),
      ),
      'tax_query' => array(
        array(
          'taxonomy' => 'categoria_convocatoria',
          'field'    => 'slug',
          'terms'    => 'labsocial',
        ),
      ),
      'orderby' => 'title',
      'order' => 'ASC',
      'posts_per_page' => -1
      );
      $convocatorias_abiertas = new WP_Query($args_ca);
    ?>

    <?php if($convocatorias_abiertas->have_posts()): ?>
    <div class="row">
      <div class="col-sm-5 col-md-offset-1 no-padding">
        <a class="no-style line-title green lab-buttons" href="<?php echo SITE_URL; ?>/convocatorias#abiertas">
          <div class="item -fondos">
            <p>
              Conoce todas las convocatorias que tenemos abiertas para que seas parte de nuestra red
            </p>
            <div class="btn btn-green mt-10">
              Convocatorias abiertas
            </div>
          </div>
        </a>
      </div>
      <div class="col-sm-5 no-padding">
        <a class="no-style line-title green lab-buttons" href="<?php echo SITE_URL; ?>/lineas-de-accion/innovacionsocial/">
          <div class="item -fondos">
            <p>
              Ven y ayúdanos a construir un mundo mucho mejor para todos
            </p>
            <div class="btn btn-green mt-10">
              Ir a LAB Social
            </div>
          </div>
        </a>
      </div>
    </div>
    <?php else: ?>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="item -fondos">
              <p>
                <?=$colunga_lab_cta;?>
              </p>
              <a class="no-style line-title green lab-buttons" href="<?=$colunga_lab_link;?>">
              <div class="btn btn-green mt-10">
                <?=$colunga_lab_label;?>
              </div>
            </a>
            </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_template_part( 'partials/widget', 'nuestrared' ); ?>

<?php include('footer.php'); ?>
