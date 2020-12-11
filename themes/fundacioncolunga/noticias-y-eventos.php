<?php
/*
Template Name: Page Template - Noticias y eventos
*/

$title = get_the_title();
$current = 'noticias-y-eventos';
$imagen_destacada = get_field('imagen_destacada');
$elemento_destacado = get_field('elemento_destacado');
$color = '';
$id_evento_excluido = 0;
$id_noticia_excluida = 0;

if($elemento_destacado && $elemento_destacado[0]->post_type == 'noticias'){
  $id_noticia_excluida = $elemento_destacado[0]->ID;
}elseif($elemento_destacado && $elemento_destacado[0]->post_type == 'eventos'){
  $clase_diferenciadora = 'eventos-stage';
  $id_evento_excluido = $elemento_destacado[0]->ID;
}

$noticias_destacadas = get_field('noticias_destacadas');
include('header.php');

?>


<?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>

<?php if($elemento_destacado): ?>
  <section class="noticias-stage <?php echo $clase_diferenciadora; ?>">
    <div class="noticias-stage-color"></div>
    <div class="noticias-stage-bg" style="background-image: url('<?php echo $url_imagen_destacada; ?>');"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-offset-0">
          <a href="<?php echo get_permalink($elemento_destacado[0]->ID); ?>" class="noticias-stage-text">
            <?php $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($elemento_destacado[0]->ID), 'w500')[0]; ?>
            <div class="noticias-stage-text-bg" style="background-image: url('<?php echo $url_imagen; ?>');"></div>
            <div class="row">
              <div class="col-md-8 col-md-offset-4">
                <div class="noticias-stage-text-content">

                  <?php if($elemento_destacado[0]->post_type == 'noticias'): ?>
                    <h3 class="line-title green">
                      <?php echo get_the_time('j \d\e F, Y',$elemento_destacado[0]->ID); ?>
                    </h3>
                    <h2>
                      <?php echo $elemento_destacado[0]->post_title; ?>
                    </h2>
                    <h4>
                      Seguir leyendo la noticia
                    </h4>

                  <?php elseif($elemento_destacado[0]->post_type == 'eventos'): ?>
                    <h3 class="line-title green">
                    </h3>
                    <h2>
                      <?php echo $elemento_destacado[0]->post_title; ?>
                    </h2>
                    <ul>
                      <?php if($elemento_destacado[0]->ubicacion): ?>
                        <li><?php echo $elemento_destacado[0]->ubicacion['address'];  ?></li>
                      <?php endif; ?>
                      <?php
                        $formato_fecha = "l j F, Y";
                        $unixtimestamp = strtotime($elemento_destacado[0]->fecha_inicio);
                        $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
                      ?>
                      <li><?php echo $fecha_evento; ?> </li>
                      <?php if($elemento_destacado[0]->hora_inicio):
                        $hora_evento = date_i18n('H:i', strtotime($elemento_destacado[0]->hora_inicio));
                      ?>
                      <li><?php echo $hora_evento; ?> horas</li>
                      <?php endif; ?>
                      <li><h4>Ver evento</h4></li>
                    </ul>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <?php
    $args = array('post_type' => 'noticias', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1);
    $query_noticia_destacada = new WP_Query($args);
    if($query_noticia_destacada->have_posts())
    {

      while($query_noticia_destacada->have_posts())
      {
        $query_noticia_destacada->next_post();
        $arreglo_noticias_excluidas = array($query_noticia_destacada->post->ID);
        $id_noticia_principal = $query_noticia_destacada->post->ID;
        $id_noticia_excluida = $query_noticia_destacada->post->ID;
       ?>

        <section class="noticias-stage">
          <div class="noticias-stage-color"></div>
          <div class="noticias-stage-bg" style="background-image: url('<?php echo $url_imagen_destacada; ?>');"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-md-offset-0">
                <a href="<?php echo get_permalink($id_noticia_principal); ?>" class="noticias-stage-text">
                  <?php $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($id_noticia_principal), 'w500')[0]; ?>
                  <div class="noticias-stage-text-bg" style="background-image: url('<?php echo $url_imagen; ?>');"></div>
                  <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                      <div class="noticias-stage-text-content">
                        <h3 class="line-title green">
                          <?php echo get_the_time('j \d\e F, Y',$query_noticia_destacada->post->ID); ?>
                        </h3>
                        <h2>
                          <?php echo $query_noticia_destacada->post->post_title; ?>
                        </h2>
                        <h4>
                            Seguir leyendo la noticia
                        </h4>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>
  <?php
      }
    }
  ?>
<?php endif; ?>



<?php
  $hoy = date('Ymd');
  $args_eventos = array(
    'post_type' => 'eventos',
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
    'post__not_in'  => array($id_evento_excluido),
    'orderby' => 'meta_value_num', 'order' => 'ASC', 'posts_per_page' => 2);
  $query_eventos = new WP_Query($args_eventos);
?>

<?php if($query_eventos->have_posts()): ?>

<section class="noticias">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5 class="subtitle">Noticias</h5>

        <?php
    $args = array(
      'post_type' => 'noticias',
      'orderby' => 'date',
      'order' => 'DESC',
      'posts_per_page' => 2,
      'post__not_in'  => array($id_noticia_excluida),
    );
    $query_noticias = new WP_Query($args);
    if($query_noticias->have_posts())
    {

      while($query_noticias->have_posts())
      {
        $query_noticias->next_post();
        $url_imagen = get_the_post_thumbnail_url( $query_noticias->post->ID, 'w500' );
        $fecha = get_the_time('j \d\e F\, Y',$query_noticias->post->ID);
     ?>

        <a href="<?php echo get_permalink($query_noticias->post->ID); ?>" class="post-noticia">
          <div class="destacado">
            <div class="img-destacada">
              <img src="<?php echo $url_imagen; ?>" alt="<?php echo $query_noticias->post->post_title; ?>"/>
            </div>
            <div class="text-content-left">
              <h5 class="date"><?php echo $fecha; ?></h5>
              <h1 class="title-destacado"><?php echo $query_noticias->post->post_title; ?></h1>
              <h4 class="link">Seguir leyendo la noticia</h4>
            </div>
          </div>
        </a>

    <?php
      }
    }
    ?>

        <a href="<?php echo SITE_URL; ?>/noticias" class="btn btn-green">
          Ver todas las noticias
        </a>
      </div>


      <div class="col-md-4 col-md-offset-1">
        <h5 class="subtitle">Eventos</h5>
          <?php
            if($query_eventos->have_posts())
            {
              while($query_eventos->have_posts())
              {
                $query_eventos->next_post();
                ?>
                <?php
                  $formato_fecha = "l j F, Y";
                  $unixtimestamp = strtotime($query_eventos->post->fecha_inicio);
                  $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
                  $hora_evento = date_i18n('H:i', strtotime($query_eventos->post->hora_inicio));
                ?>

                <a href="<?php echo get_permalink($query_eventos->post->ID); ?>" class="post-evento">
                  <div class="line-vertical"></div>
                  <div class="destacado">
                    <div class="text-content">
                      <h5 class="date"><?php echo $fecha_evento; ?></h5>
                      <h1 class="title-destacado"><?php echo $query_eventos->post->post_title; ?></h1>
                      <h6>
                        <?php if($query_eventos->post->ubicacion): ?>
                        <?php echo $query_eventos->post->ubicacion['address'];  ?><br>
                        <?php endif; ?>
                        <?php echo $hora_evento; ?> horas.
                      </h6>
                      <h4 class="link">Inscríbete al evento</h4>
                    </div>
                  </div>
                </a>

                <?php }
            }
            else
            //Trae eventos antiguos
            /*
            {
              $hoy = date('Ymd');
              $args = array(
                'post_type' => 'eventos',
                'meta_query' => array(
                  array(
                      'key'   => 'fecha_inicio',
                      'compare' => '<=',
                      'value'   => $hoy,
                      'type'    => 'NUMERIC',
                  )
                ),
                'meta_key' => 'fecha_inicio',
                'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page' => 2);
            $query_eventos_pasados = new WP_Query($args);

            if($query_eventos_pasados->have_posts())
            {
              while($query_eventos_pasados->have_posts())
              {
                $query_eventos_pasados->next_post();
                ?>
                <?php
                  $formato_fecha = "l j F, Y";
                  $unixtimestamp = strtotime($query_eventos_pasados->post->fecha_inicio);
                  $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
                  $hora_evento = date_i18n('H:i', strtotime($query_eventos_pasados->post->hora_inicio));
                ?>

                <a href="<?php echo get_permalink($query_eventos_pasados->post->ID); ?>" class="post-evento post-evento-pasado">
                  <div class="line-vertical"></div>
                  <div class="destacado">
                    <div class="text-content">
                      <h5 class="date"><?php echo $fecha_evento; ?></h5>
                      <h1 class="title-destacado"><?php echo $query_eventos_pasados->post->post_title; ?></h1>
                      <h6>
                        <?php if($query_eventos_pasados->post->ubicacion): ?>
                        <?php echo $query_eventos_pasados->post->ubicacion['address'];  ?><br>
                        <?php endif; ?>
                        <?php echo $hora_evento; ?> horas.
                      </h6>
                    </div>
                  </div>
                </a>
              <?php
              }
            }

          }*/
        ?>

        <a href="<?php echo SITE_URL; ?>/eventos" class="btn btn-pink">
          Ver todos los eventos
        </a>

      </div>
    </div>
  </div>
</section>

<?php else: ?>

<section class="noticias">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5 class="subtitle">Noticias</h5>

        <?php
    $args = array(
      'post_type' => 'noticias',
      'orderby' => 'date',
      'order' => 'DESC',
      'posts_per_page' => 2,
      'post__not_in'  => array($id_noticia_excluida),
    );
    $query_noticias = new WP_Query($args);
    if($query_noticias->have_posts())
    {

      while($query_noticias->have_posts())
      {
        $query_noticias->next_post();
        $url_imagen = get_the_post_thumbnail_url( $query_noticias->post->ID, 'w500' );
        $fecha = get_the_time('j \d\e F\, Y',$query_noticias->post->ID);
     ?>

        <a href="<?php echo get_permalink($query_noticias->post->ID); ?>" class="post-noticia">
          <div class="destacado">
            <div class="img-destacada">
              <img src="<?php echo $url_imagen; ?>" alt="<?php echo $query_noticias->post->post_title; ?>"/>
            </div>
            <div class="text-content-left">
              <h5 class="date"><?php echo $fecha; ?></h5>
              <h1 class="title-destacado"><?php echo $query_noticias->post->post_title; ?></h1>
              <h4 class="link">Seguir leyendo la noticia</h4>
            </div>
          </div>
        </a>

    <?php
      }
    }
    ?>

        <a href="<?php echo SITE_URL; ?>/noticias" class="btn btn-green">
          Ver todas las noticias
        </a>
      </div>


      <div class="col-md-4 col-md-offset-1">
        <?php if($query_eventos->have_posts()): ?>
          <h5 class="subtitle">Eventos</h5>
        <?php else: ?>
          <h5 class="subtitle">Eventos pasados</h5>
        <?php endif; ?>

          <?php
            if($query_eventos->have_posts())
            {
              while($query_eventos->have_posts())
              {
                $query_eventos->next_post();
                ?>
                <?php
                  $formato_fecha = "l j F, Y";
                  $unixtimestamp = strtotime($query_eventos->post->fecha_inicio);
                  $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
                  $hora_evento = date_i18n('H:i', strtotime($query_eventos->post->hora_inicio));
                ?>

                <a href="<?php echo get_permalink($query_eventos->post->ID); ?>" class="post-evento">
                  <div class="line-vertical"></div>
                  <div class="destacado">
                    <div class="text-content">
                      <h5 class="date"><?php echo $fecha_evento; ?></h5>
                      <h1 class="title-destacado"><?php echo $query_eventos->post->post_title; ?></h1>
                      <h6>
                        <?php if($query_eventos->post->ubicacion): ?>
                        <?php echo $query_eventos->post->ubicacion['address'];  ?><br>
                        <?php endif; ?>
                        <?php echo $hora_evento; ?> horas.
                      </h6>
                      <h4 class="link">Inscríbete al evento</h4>
                    </div>
                  </div>
                </a>

                <?php }
            }
            else
            //Trae eventos antiguos

            {
              $hoy = date('Ymd');
              $args = array(
                'post_type' => 'eventos',
                'meta_query' => array(
                  array(
                      'key'   => 'fecha_inicio',
                      'compare' => '<=',
                      'value'   => $hoy,
                      'type'    => 'NUMERIC',
                  )
                ),
                'meta_key' => 'fecha_inicio',
                'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page' => 2);
            $query_eventos_pasados = new WP_Query($args);

            if($query_eventos_pasados->have_posts())
            {
              while($query_eventos_pasados->have_posts())
              {
                $query_eventos_pasados->next_post();
                ?>
                <?php
                  $formato_fecha = "l j F, Y";
                  $unixtimestamp = strtotime($query_eventos_pasados->post->fecha_inicio);
                  $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);
                  $hora_evento = date_i18n('H:i', strtotime($query_eventos_pasados->post->hora_inicio));
                ?>

                <a href="<?php echo get_permalink($query_eventos_pasados->post->ID); ?>" class="post-evento">
                  <div class="line-vertical"></div>
                  <div class="destacado">
                    <div class="text-content">
                      <h5 class="date"><?php echo $fecha_evento; ?></h5>
                      <h1 class="title-destacado"><?php echo $query_eventos_pasados->post->post_title; ?></h1>
                      <h6>
                        <?php if($query_eventos_pasados->post->ubicacion): ?>
                        <?php echo $query_eventos_pasados->post->ubicacion['address'];  ?><br>
                        <?php endif; ?>
                        <?php echo $hora_evento; ?> horas.
                      </h6>
                    </div>
                  </div>
                </a>
              <?php
              }
            }

          }
        ?>

        <?php if($query_eventos->have_posts()): ?>
          <a href="<?php echo SITE_URL; ?>/eventos" class="btn btn-pink">
            Ver todos los eventos
          </a>
        <?php else: ?>
          <a href="<?php echo SITE_URL; ?>/eventos#pasados" class="btn btn-pink">
            Ver eventos pasados
          </a>
        <?php endif; ?>





      </div>
    </div>
  </div>
</section>

<?php /* ?>
<section class="noticias">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="subtitle">Noticias</h5>
        </div>

        <?php
          $args = array(
            'post_type' => 'noticias',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 4,
            'post__not_in'  => array($id_noticia_excluida),
          );
          $query_noticias = new WP_Query($args);
          if($query_noticias->have_posts())
          {

            while($query_noticias->have_posts())
            {
              $query_noticias->next_post();
              $url_imagen = get_the_post_thumbnail_url( $query_noticias->post->ID, 'w500' );
              $fecha = get_the_time('j \d\e F\, Y',$query_noticias->post->ID);
           ?>

              <div class="col-md-6">
                <a href="<?php echo get_permalink($query_noticias->post->ID); ?>" class="post-noticia">
                  <div class="destacado">
                    <div class="img-destacada">
                      <img src="<?php echo $url_imagen; ?>" alt="<?php echo $query_noticias->post->post_title; ?>"/>
                    </div>
                    <div class="text-content-left">
                      <h5 class="date"><?php echo $fecha; ?></h5>
                      <h1 class="title-destacado"><?php echo $query_noticias->post->post_title; ?></h1>
                      <h4 class="link">Seguir leyendo la noticia</h4>
                    </div>
                  </div>
                </a>
              </div>

        <?php
            }
          }
        ?>

        <div class="col-md-12">
          <a href="<?php echo SITE_URL; ?>/noticias" class="btn btn-green">
            Ver todas las noticias
          </a>
        </div>

      </div>

    </div>
  </section>
<?php */ ?>

<?php endif; ?>

  <?php  get_template_part( 'seccion', 'redes-sociales' ); ?>

<?php include('footer.php'); ?>
