<style media="screen">
  iframe{
    height: 100%;
    max-height: 90px;
  }
</style>
<?php


if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    $current = 'eventos';
    $title = get_the_title();
    $imagen_destacada = get_field('imagen_destacada');
    $imagen_destacada_generica = get_field('imagen_destacada_single_noticia', 'options');
    if($imagen_destacada){
      $url_imagen_destacada = $imagen_destacada['sizes']['w1600'];
    }else{
      $url_imagen_destacada = $imagen_destacada_generica['sizes']['w1600'];
    }
    $evento_destacado = get_field('evento_destacado', 'option');
    $id_evento_excluido = $post->ID;
    include('header.php');

?>

   <section class="eventos-noticias green-opacity" style="background-image: url(<?php echo $url_imagen_destacada; ?>)" >
    <div class="capa-color pink-opacity"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 title-content">
          <div>
            <h1 class="title-destacado line-title pink"><?php echo $title; ?></h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="noticia-evento-single">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <table class="table-ficha">
            <?php if( get_field('ubicacion') ): ?>
			  <tr>
              <td>Lugar:</td>
              <td><?php echo $post->ubicacion['address']; ?> <span></span> <a class="link-pink" href="https://www.google.cl/maps/dir/<?php echo $post->ubicacion['lat']; ?>,<?php echo $post->ubicacion['lng']; ?>/" target="_blank" >Ver en el mapa</a></td>
            </tr>
			  <?php endif; ?>

            <?php
              $formato_fecha = "l j F, Y";
              $unixtimestamp = strtotime($post->fecha);
              $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
              $hora_evento = date_i18n('H:i', strtotime($post->hora));


              $fecha_inicio = date_i18n($formato_fecha, strtotime($post->fecha_inicio));
              $hora_inicio = date_i18n('H:i', strtotime($post->hora_inicio));
              $fecha_fin = date_i18n($formato_fecha, strtotime($post->fecha_fin));
              $hora_fin = date_i18n('H:i', strtotime($post->hora_fin));
              $tabla = get_field('tabla');
            ?>
            <tr>
              <td>Inicio:</td>
              <td class="first-letter-uppercase text-lowercase"><?php echo ucfirst(strtolower($fecha_inicio));?> &bull; <?php echo $hora_inicio;?> horas</td>
            </tr>
            <tr>
              <td>Término:</td>
              <td class="first-letter-uppercase text-lowercase"><?php echo ucfirst(strtolower($fecha_fin));?> &bull; <?php echo $hora_fin;?> horas</td>
            </tr>
            <?php if($post->texto_item): ?>
            <tr>
              <td><?php echo $post->texto_item; ?></td>
              <td><?php echo $post->contenido_item; ?></td>
            </tr>
            <?php endif; ?>

            <?php if($tabla): ?>
              <?php foreach ($tabla as $key => $fila): ?>
                <tr>
                <td><?php echo $fila['item']; ?>:</td>
                <td><?php echo $fila['valor']; ?></td>
              </tr>
              <?php endforeach; ?>
            <?php endif; ?>

          </table>
        </div>
      </div>
      <div class="row wp-content -noticia">
        <div class="col-md-8 col-md-offset-2">
          <?php echo the_content(); ?>
        </div>
      </div>
    </div>
  </section>

  <section id="evento-inscripcion" class="form-inscripcion border-bottom">
    <div class="container">

    <?php if($post->url_formulario): ?>
      <div class="col-md-8 col-md-offset-2">
      <a target="_blank" href="<?php echo $post->url_formulario; ?>" class="btn btn-green">
          INSCRÍBETE AQUÍ
      </a>
      </div>
    <?php else: ?>

      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1><?php echo $post->encabezado_formulario; ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <p class="parrafo-lg">
            <?php echo $post->descripcion_formulario; ?>
          </p>
        </div>
        <div class="col-md-8 col-md-offset-2 form-content">
          <?php echo do_shortcode($post->formulario); ?>
        </div>
      </div>

  <?php endif; ?>
    </div>
  </section>

  <?php if($evento_destacado &&  $evento_destacado[0]->ID!=$post->ID ): ?>
  <section class="eventos">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h5>Evento destacado</h5>
        </div>
        <div class="col-md-6 text-right hidden-sm hidden-xs">
          <a class="link-grey" href="<?php echo SITE_URL; ?>/eventos">Ver más eventos</a>
        </div>
      </div>
      <div class="row mt-30">
        <div class="col-md-offset-1 col-md-10 evento-dest">
          <a href="<?php echo get_permalink($evento_destacado[0]->ID); ?>">
            <div class="evento-content">
              <h1 class="title"><?php echo $evento_destacado[0]->post_title; ?></h1>
              <ul class="fecha-evento">
                <li><?php echo $evento_destacado[0]->ubicacion['address'];  ?></li>
                <?php
                    $formato_fecha = "l j F, Y";
                    $unixtimestamp = strtotime($evento_destacado[0]->fecha_inicio);
                  ?>
                <li class="first-letter-uppercase text-lowercase"><?php echo date_i18n($formato_fecha, ucfirst(strtolower($unixtimestamp)));?></li>
                <?php if($evento_destacado[0]->hora_inicio):
                $hora_evento = date_i18n('H:i', strtotime($evento_destacado[0]->hora_inicio));
                ?>
                <li><?php echo $hora_evento;  ?> horas</li>
                <?php endif; ?>
                <li><h4 class="link-pink">Ver evento</h4></li>
              </ul>
            </div>
          </a>
        </div>
      </div>
      <div class="visible-sm visible-xs link-ver">
        <a class="link-grey" href="<?php echo SITE_URL; ?>/eventos">Ver más eventos</a>
      </div>
    </div>
  </section>
<?php else: ?>

  <?php
  $hoy = date('Ymd');
  $args = array('post_type' => 'eventos', 'meta_query' => array(array('key'   => 'fecha_inicio','compare' => '>=',
              'value'   => $hoy,)), 'meta_key' => 'fecha_inicio', 'orderby' => 'meta_value_num', 'order' => 'ASC', 'post__not_in'  => array($id_evento_excluido),  'posts_per_page' => 1);
  $query_evento_proximo = new WP_Query($args);
  if($query_evento_proximo->have_posts())
  {
    while($query_evento_proximo->have_posts())
      {
        $query_evento_proximo->next_post();
        $formato_fecha = "l j F, Y";
        $unixtimestamp = strtotime($query_evento_proximo->post->fecha_inicio);
        $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
        $id_evento_excluido = $query_evento_proximo->post->ID;
    ?>


    <section class="eventos">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h5>Evento destacado</h5>
          </div>
          <div class="col-md-6 text-right hidden-sm hidden-xs">
            <a class="link-grey" href="<?php echo SITE_URL; ?>/eventos">Ver más eventos</a>
          </div>
        </div>
        <div class="row mt-30">
          <div class="col-md-offset-1 col-md-10 evento-dest">
            <a href="<?php echo get_permalink($evento_destacado[0]->ID); ?>">
              <div class="evento-content">
                <h1 class="title"><?php echo $query_evento_proximo->post->post_title; ?></h1>
                <ul class="fecha-evento">
                  <li><?php echo $query_evento_proximo->post->ubicacion['address'];  ?></li>
                  <?php
                      $formato_fecha = "l j F, Y";
                      $unixtimestamp = strtotime($query_evento_proximo->post->fecha_inicio);
                    ?>
                  <li><?php echo date_i18n($formato_fecha, $unixtimestamp);?></li>
                  <?php
                    $hora_evento = date_i18n('H:i', strtotime($query_evento_proximo->post->hora_inicio));
                  ?>
                  <li><?php echo $hora_evento;  ?> horas</li>
                  <li><h4 class="link-pink">Ver evento</h4></li>
                </ul>
              </div>
            </a>
          </div>
        </div>
        <div class="visible-sm visible-xs link-ver">
          <a class="link-grey" href="<?php echo SITE_URL; ?>/eventos">Ver más eventos</a>
        </div>
      </div>
    </section>


  <?php
    }
  }
  ?>

<?php endif; ?>

  <?php get_template_part( 'seccion', 'redes-sociales' ); ?>

<?php
  endwhile;
  include('footer.php');
else:
  header('location:'.SITE_URL."/404/");
  exit;
endif;
?>
