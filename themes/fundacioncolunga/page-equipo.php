<?php


$current = 'conocenos';
$title = get_the_title();
$slides = get_field('slider_imagenes');


$titulo_infografia = get_field('titulo_infografia');

$titulo_directorio = get_field('titulo_directorio');
$directorio = get_field('directorio');

$titulo_equipo_ejecutivo = get_field('titulo_equipo_ejecutivo');
$equipo_ejecutivo = get_field('equipo_ejecutivo');

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

    <?php if($directorio): ?>
      <section id="equipo">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1><?php echo $titulo_directorio; ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 no-padding">
              <ul class="directorio-content ">

                <?php foreach ($directorio as $vez_directorio => $persona): ?>
                  <?php $url_imagen = $persona['imagen']['sizes']['w500']; ?>
                  <li>
                  <div class="border-pink-content relative">
                    <div class="capa-color transition">
                    </div>
                    <img src="<?php echo $url_imagen; ?>" alt="<?php echo $persona['nombre']; ?>">
                    <?php if($persona['resumen']): ?>
                    <button type="button" class="btn bg-pink btn-md hidden-xs" data-toggle="modal" data-target="#directorio<?php echo $vez_directorio; ?>">
                      Ver más
                    </button>
                    <?php endif; ?>
                  </div>
                  <div class="txt-content">
                    <h4 class="bold"><?php echo $persona['nombre']; ?></h4>
                    <h4><?php echo $persona['cargo']; ?></h4>
                    <?php if($persona['resumen']): ?>
                    <button type="button" class="btn-modal link-pink visible-xs" data-toggle="modal" data-target="#directorio<?php echo $vez_directorio; ?>">
                        Ver más
                    </button>
                    <?php endif; ?>
                  </div>
                </li>

                <!-- Modal -->
                <div id="directorio<?php echo $vez_directorio; ?>" class="modal fade directorio-modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><?php echo $persona['nombre']; ?></h3>
                        <h4><?php echo $persona['cargo']; ?></h4>
                      </div>
                      <div class="modal-body">
                        <?php echo $persona['resumen']; ?>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <?php endforeach ?>
              </ul>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php if($equipo_ejecutivo): ?>
      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1><?php echo $titulo_equipo_ejecutivo; ?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 no-padding">
              <ul class="directorio-content">
                <?php foreach ($equipo_ejecutivo as $vez_equipo => $persona): ?>
                  <?php $url_imagen = $persona['imagen']['sizes']['w500']; ?>
                  <li>
                    <div class="border-pink-content relative">
                      <div class="capa-color transition">
                      </div>
                      <img src="<?php echo $url_imagen; ?>" alt="<?php echo $persona['nombre']; ?>">
                      <?php if($persona['resumen']): ?>
                      <button type="button" class="btn bg-pink btn-md hidden-xs" data-toggle="modal" data-target="#equipo<?php echo $vez_equipo; ?>">
                        Ver más
                      </button>
                      <?php endif; ?>
                    </div>

                    <div class="txt-content">
                      <h4 class="bold"><?php echo $persona['nombre']; ?></h4>
                      <h4><?php echo $persona['cargo']; ?></h4>
                      <?php if($persona['resumen']): ?>
                      <button type="button" class="btn-modal link-pink visible-xs" data-toggle="modal" data-target="#equipo<?php echo $vez_equipo; ?>">
                          Ver más
                      </button>
                      <?php endif; ?>
                    </div>
                  </li>

                <!-- Modal -->
                <div id="equipo<?php echo $vez_equipo; ?>" class="modal fade directorio-modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title"><?php echo $persona['nombre']; ?></h3>
                        <h4><?php echo $persona['cargo']; ?></h4>
                      </div>
                      <div class="modal-body">
                        <?php echo $persona['resumen']; ?>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <?php endforeach ?>
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



<?php include('footer.php'); ?>
