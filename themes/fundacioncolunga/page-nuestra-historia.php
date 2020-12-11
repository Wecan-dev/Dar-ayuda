<?php


$current = 'conocenos';
$title = get_the_title();
$slides = get_field('slider_imagenes');

$mision = get_field('mision');
$vision = get_field('vision');
$valores = get_field('valores');

/*$nuestra_historia_imagen = get_field('nuestra_historia_imagen');*/

$historia_titulo = get_field('historia_titulo');
$historia_contenido = get_field('historia_contenido');
$historia_imagen = get_field('historia_imagen');

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

<section id="nuestra-historia">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-md-10">
        <h1><?php echo $title; ?></h1>
      </div>
    </div>
    <div class="row mt-30">
      <div class="col-md-10 col-md-offset-1 texto-enriquecido">
        <?php the_content(); ?>
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

<?php
endwhile;
endif;
?>


<?php include('footer.php'); ?>
