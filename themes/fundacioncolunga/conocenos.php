<?php
/*
Template Name: Page Template - Conócenos
*/


$current = 'conocenos';
$title = get_the_title();
$slides = get_field('slider_imagenes');

$mision = get_field('mision');
$vision = get_field('vision');
$valores = get_field('valores');

$nuestro_impacto_bajada = get_field('nuestro_impacto_bajada');
$impactos = get_field('impactos');


$titulo_infografia = get_field('titulo_infografia');

/*$nuestra_historia_imagen = get_field('nuestra_historia_imagen');*/

$historia_titulo = get_field('historia_titulo');
$historia_contenido = get_field('historia_contenido');
$historia_imagen = get_field('historia_imagen');


$titulo_directorio = get_field('titulo_directorio');
$directorio = get_field('directorio');

$titulo_equipo_ejecutivo = get_field('titulo_equipo_ejecutivo');
$equipo_ejecutivo = get_field('equipo_ejecutivo');

$transparencia_bajada = get_field('transparencia_bajada');
$transparencia_imagen = get_field('transparencia_imagen');

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

<section id="nuestra-historia">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-md-10">
        <h1><?php echo $historia_titulo; ?></h1>
      </div>
    </div>
    <div class="row mt-30">
      <div class="col-md-10 col-md-offset-1 texto-enriquecido">
        <?php echo $historia_contenido; ?>
        <!--<p>Somos una fundación que reúne a organizaciones de la sociedad civil chilena y latinoamericana en una red colaborativa. En los últimos cuatro años hemos apoyado a más de 65 organizaciones y beneficiado a cerca de 24 mil personas en condiciones de vulnerabilidad.</p>
        <p>Realizamos inversiones de impacto social que buscan implementar y mejorar las políticas sociales, para así avanzar en la construcción de una sociedad más justa e inclusiva.</p>
        <p>Nuestra labor es promover y apoyar a organizaciones de la sociedad civil que desarrollan soluciones innovadoras en las áreas de superación de la pobreza y educación,  de modo que sean un aporte a las políticas públicas del país, y que logren impactar positivamente en la vida de niñas, niños y adolescentes, tanto en Chile como otros países de la región.</p>

        <p>Fundación Colunga nace el año 2012 al alero de la Familia Cueto Plaza, y debe su nombre a un pequeño pueblo ubicado en el Principado de Asturias en España, lugar de origen paterno de la familia.  El padre, Juan Cueto Sierra, llegó a Chile en 1939 en medio de la Guerra Civil Española. Por esta razón, la fundación tiene dos referentes desde los cuales situarse: el lugar de origen familiar, con su tradición y sus valores; y el país que los recibió, con sus oportunidades y nuevos desafíos.</p>
        <p>El desafío que Fundación Colunga enfrenta hoy es trabajar para las personas que se encuentran situaciones de vulnerabilidad y por lo sectores más excluidos de la sociedad,  y de ese modo, ser un aporte para transformar y transformarnos en una sociedad más justa y equitativa.</p>-->
      </div>
    </div>
    <?php
    /*
    <div class="row mt-30">
      <div class="col-md-10 col-md-offset-1">
        <?php $url_imagen_historia = $historia_imagen['url']; ?>
        <img src="<?php echo $url_imagen_historia; ?>" alt="<?php echo $historia_imagen['alt']; ?>">
      </div>
    </div>
    */
    ?>

  </div>
</section>

<section id="mision">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <?php if($mision): ?>
        <h3>
          Misión
        </h3>
        <p>
          <?php echo $mision; ?>
        </p>
        <?php endif; ?>

        <?php if($vision): ?>
        <h3>
          Visión
        </h3>
        <p>
          <?php echo $vision; ?>
        </p>
        <?php endif; ?>

        <?php if($valores): ?>
        <h3>
          Valores
        </h3>
        <ul>
          <?php foreach ($valores as $val):?>
            <li><?php echo $val['valor']; ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      </div>
    </div>
  </div>
</section>


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

<?php if($impactos): ?>
<section id="nuestro-impacto">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <h1>Nuestro impacto</h1>
      </div>
      <div class="col-md-10 col-md-offset-1">
        <p class="parrafo-lg"><?php echo $nuestro_impacto_bajada; ?></p>
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

<div id="transparencia" class="content-half -grey">
  <div class="box-img-content -right hidden-xs">
    <?php $url_imagen_transparencia = $transparencia_imagen['sizes']['w1200transparencia']; ?>
    <img src="<?php echo $url_imagen_transparencia; ?>" alt="<?php echo $transparencia_imagen['alt']; ?>">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="description -transparencia">
          <h1 class="title line-title pink">Transparencia</h1>
          <p><?php echo $transparencia_bajada; ?></p>
          <a href="<?php echo SITE_URL; ?>/archivos-de-transparencia" class="btn btn-xs btn-light-green">Ver documentos</a>
        </div>
      </div>
    </div>
  </div>
  <div class="visible-xs box-img-content">
    <img src="<?php echo $url_imagen_transparencia; ?>" alt="<?php echo $transparencia_imagen['alt']; ?>">
  </div>
</div>

<?php get_template_part( 'partials/widget', 'tebrindamos' ); ?>





<?php /* ?>
<div id="diagrama">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="bajada">
          <h2>
            <?php echo $titulo_infografia; ?>
          </h2>
        </div>
        <img src="<?php echo TEMPLATE_URL; ?>/assets/img/diagrama.jpg" alt="Diagrama">
      </div>
    </div>
  </div>
</div>
<?php */ ?>


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
