<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();

    $current = 'convocatorias';
    $title = get_the_title();

    $imagen_destacada = get_field('imagen_destacada');
    $descripcion_imagen = get_field('descripcion_imagen');


    $tabla = get_field('tabla');


    $mostrar_bloque_postulaciones = get_field('postulaciones_abiertas');
    $fecha_postulaciones = get_field('fecha_postulaciones');

    $pagina_formulario = get_field('url_formulario');
    $bases = get_field('bases');

    //$convocatorias = get_field('convocatorias', 101);


    $requisitos_bajada = get_field('requisitos_bajada');
    $requisitos = get_field('requisitos');

    $criterios_bajada = get_field('criterios_bajada');

    $criterios_de_inversion = get_field('criterios_de_inversion');

    $beneficios_fondo_item_1 = get_field('beneficios_fondo_item_1');
    $beneficios_fondo_item_2 = get_field('beneficios_fondo_item_2');
    $beneficios_fondo_item_3 = get_field('beneficios_fondo_item_3');
    $beneficios_fondo_item_4 = get_field('beneficios_fondo_item_4');

    $imagen_iniciativa = get_field('imagen_iniciativa', 'options');
    $texto_iniciativa = get_field('texto_iniciativa', 'options');

    $proceso_de_seleccion = get_field('linea_de_tiempo');

    include('header.php');

?>


<div class="slide box-align-down first">
  <div class="cont-img-slider">
    <?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>
    <img src="<?php echo $url_imagen_destacada; ?>">
  </div>
</div>

<section class="single-convocatoria">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h2>
          <?php
            $terms = get_the_terms( $post->ID, 'categoria_convocatoria' );
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
        </h2>
        <h3>
          <?php echo $title; ?>
        </h3>
        <?php if($tabla): ?>
        <div class="ficha">
          <?php foreach ($tabla as $key => $fila): ?>
            <div class="ficha-item">
              <div class="row">
                <div class="col-md-5">
                  <p>
                    <?php echo $fila['item']; ?>:
                  </p>
                </div>
                <div class="col-md-7">
                  <p>
                    <?php echo $fila['valor']; ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>


        <div class="texto-enriquecido">
          <?php echo the_content(); ?>
        </div>

        <?php if($mostrar_bloque_postulaciones): ?>
          <?php if($pagina_formulario): ?>
          <a target="_blank" href="<?php echo $pagina_formulario; ?>" class="btn btn-green">
          Completa la ficha de registro
          </a>
          <?php endif; ?>

          <?php if($bases): ?>
            <br>
            <a href="<?php echo $bases['url']; ?>" target="_blank"  class="link">
              Descarga las bases
            </a>
          <?php endif; ?>

        <?php endif; ?>

      </div>
    </div>
  </div>
</section>



<?php if($requisitos): ?>
<section class="box-grey colungafis requisitos">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="">Requisitos</h1>
        <h2><?php echo $requisitos_bajada; ?></h2>
      </div>
    </div>
    <?php $cont = 1; ?>
    <?php foreach ($requisitos as $requisito): ?>
      <?php if($cont == 1): ?>
        <div class="row">
      <?php endif; ?>
        <div class="col-sm-3 no-padding">
          <div class="item -fondos">
            <h4 class="title line-title green"><?php echo $requisito['requisito']; ?></h4>
          </div>
        </div>
      <?php if($cont == 4): $cont=0; ?>
        </div>
      <?php
        endif;
        $cont=$cont+1;
      ?>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>


<?php if($proceso_de_seleccion): ?>
  <section class="proceso-seleccion">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-md-offset-4">
          <h1>Línea de tiempo</h1>
        </div>
      </div>
      <div class="row mt-30">
        <div class="col-12 col-md-6 col-md-offset-4">
          <ul class="list-proceso-select">
            <?php $num = 1; ?>
            <?php foreach($proceso_de_seleccion as $proceso): ?>
              <li class="wow fadeInLeft" data-wow-delay=".3s">
              <div class="circle-green-content">
                <?php echo $num; ?>
              </div>
              <div class="txt-content">
                <p class="bold"><?php echo $proceso['titulo']; ?></p>
                <p><?php echo $proceso['descripcion']; ?></p>
              </div>
              </li>
              <?php $num = $num +1; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>


<?php if($mostrar_bloque_postulaciones): ?>
<section>
  <div class="container d-none">
    <div class="row mt-30">
      <div class="col-sm-5 col-md-offset-1">
        <h1 class="bold mt-10"><?php echo $fecha_postulaciones; ?></h1>
      </div>
      <div class="col-md-5 col-sm-6 text-left">
        <!--a target="_blank" href="<?php echo $pagina_formulario; ?>" class="btn-light-green btn btn-sm mt-10">
          Completa la ficha de registro
        </a>
        <a href="<?php echo $bases['url']; ?>" target="_blank" class="link d-block mt-30">Descarga las bases del <?php echo $title; ?></a-->
      </div>
    </div>
  </div>
</section>
<?php else: ?>
<section>
  <div class="container">
    <div class="row mt-30">
      <div class="col-sm-12">
        <h1 class="bold mt-10"><?php echo $fecha_postulaciones; ?></h1>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<?php
  $args = array(
    'post_type' => 'convocatoria',
    'meta_query'  => array(
      array(
        'key'     => 'postulaciones_abiertas',
        'value'     => '1',
        'compare'   => '=',
      ),
    ),
    'orderby' => 'rand',
    'post__not_in'  => array($post->ID),
    'posts_per_page' => 4
  );
  $convocatoria = new WP_Query($args);
?>

<?php if($convocatoria->have_posts()): ?>
  <section class="convocatorias box-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="proyectos__sub-title">Convocatorias</h2>
        </div>
      </div>
      <div class="row">
      <?php
        if($convocatoria->have_posts())
        {

          while($convocatoria->have_posts())
          {
            $convocatoria->next_post(); ?>

          <?php $url_imagen = get_the_post_thumbnail_url( $convocatoria->post->ID, 'w500' ); ?>
          <a href="<?php echo get_permalink($convocatoria->post->ID); ?>" class="box-proyecto col-md-3">
            <img class="box-proyecto__img" src="<?php echo $url_imagen; ?>" alt="Proyecto Lorem">
            <div class="box-proyecto__category">
              <?php
                $terms = get_the_terms( $convocatoria->post->ID, 'categoria_convocatoria' );
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
              <?php echo $convocatoria->post->post_title; ?>
            </p>
            <p class="box-proyecto__text">
              <?php echo $convocatoria->post->descripcion_corta; ?>
            </p>
            <?php if($convocatoria->post->postulaciones_abiertas): ?>
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


        <?php
           }
          }
        else{
          $args_todas = array(
            'post_type' => 'convocatoria',
            'orderby' => 'rand',
            'post__not_in'  => array($post->ID),
            'posts_per_page' => 4
          );
          $convocatorias_todas = new WP_Query($args_todas);

          if($convocatorias_todas->have_posts())
          {

            while($convocatorias_todas->have_posts())
            {
              $convocatorias_todas->next_post(); ?>

            <?php $url_imagen = get_the_post_thumbnail_url( $convocatorias_todas->post->ID, 'w500' ); ?>
            <a href="<?php echo get_permalink($convocatorias_todas->post->ID); ?>" class="box-proyecto col-md-3">
              <img class="box-proyecto__img" src="<?php echo $url_imagen; ?>" alt="Proyecto Lorem">
              <div class="box-proyecto__category">
                <?php
                  $terms = get_the_terms( $convocatorias_todas->post->ID, 'categoria_convocatoria' );
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
                <?php echo $convocatorias_todas->post->post_title; ?>
              </p>
              <p class="box-proyecto__text">
                <?php echo $convocatorias_todas->post->descripcion_corta; ?>
              </p>
              <?php if($convocatorias_todas->post->postulaciones_abiertas): ?>
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


          <?php
             }
            }
          }
      ?>
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

<?php
  endwhile;
  include('footer.php');
else:
  header('location:'.SITE_URL."/404/");
  exit;
endif;
?>
