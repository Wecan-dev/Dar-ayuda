<?php

$evento_destacado = get_field('evento_destacado', 'option');

?>

<?php if($evento_destacado): ?>
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
          <a href="<?php echo get_permalink($evento_destacado[0]->ID); ?>" <?php if(is_front_page()){ ?> onclick="ga('send', 'event', 'evento_destacado', clic', 'home');" <?php } ?>>
            <div class="evento-content">
              <h1 class="title"><?php echo $evento_destacado[0]->post_title; ?></h1>
              <ul class="fecha-evento">
                <?php
                  $formato_fecha = "l j F, Y";
                  $unixtimestamp = strtotime($evento_destacado[0]->fecha_inicio);
                  $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
                  $hora_evento = date_i18n('H:i', strtotime($evento_destacado[0]->hora_inicio));
                ?>
                <?php if($evento_destacado[0]->ubicacion): ?>
                <li><?php echo $evento_destacado[0]->ubicacion['address'];  ?></li>
                <?php endif; ?>
                <li><?php echo $fecha_evento; ?> </li>
                <li><?php echo $hora_evento; ?> horas</li>
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
  $args = array(
    'post_type' => 'eventos',
    //'meta_query' => array(array('key'   => 'fecha_inicio','compare' => '>=', 'value'   => $hoy,)),
    'meta_query' => array(
      'relation' => 'OR',
      array(
          'key'   => 'fecha_inicio',
          'compare' => '>=',
          'value'   => $hoy,
          'type'    => 'NUMERIC',
      ),
       array(
          'key'   => 'fecha_fin',
          'compare' => '>=',
          'value'   => $hoy,
          'type'    => 'NUMERIC',
      )
    ),
    'meta_key' => 'fecha_inicio',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'posts_per_page' => 1
  );

  $query_eventos = new WP_Query($args);
  if($query_eventos->have_posts())
  {
    while($query_eventos->have_posts())
      {
        $query_eventos->next_post();
        $formato_fecha = "l j F, Y";
        $unixtimestamp = strtotime($query_eventos->post->fecha_inicio);
        $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
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
            <a href="<?php echo get_permalink($query_eventos->post->ID); ?>" <?php if(is_front_page()){ ?> onclick="ga('send', 'event', 'evento_destacado', clic', 'home');" <?php } ?>>
              <div class="evento-content">
                <h1 class="title"><?php echo $query_eventos->post->post_title; ?></h1>
                <ul class="fecha-evento">
                  <?php
                    $formato_fecha = "l j F, Y";
                    $unixtimestamp = strtotime($query_eventos->post->fecha_inicio);
                    $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
                    $hora_evento = date_i18n('H:i', strtotime($query_eventos->post->hora_inicio));
                  ?>
                  <?php if($query_eventos->post->ubicacion): ?>
                  <li><?php echo $query_eventos->post->ubicacion['address'];  ?></li>
                  <?php endif; ?>
                  <li><?php echo $fecha_evento; ?> </li>
                  <li><?php echo $hora_evento; ?> horas</li>
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