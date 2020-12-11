

<?php
  $noticias_destacadas = get_field('noticias_destacadas', 'option');
 ?>


<?php
  //EVENTOS
  $cantidad_noticias = 4;
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
    'orderby' => 'meta_value_num', 'order' => 'ASC', 'posts_per_page' => 2);
    $query_eventos = new WP_Query($args_eventos);

    if($query_eventos->have_posts()){
      $cantidad_noticias = 4;
    }else{
      $cantidad_noticias = 4;
    }
?>


<?php if($query_eventos->have_posts()): ?>
  <section class="noticias">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h5 class="subtitle">Noticias destacadas</h5>
          <div class="grid row">
            <div class="grid-sizer"></div>
          <?php if($noticias_destacadas): ?>

            <?php $vez=1;
              foreach($noticias_destacadas as $noticia): ?>
              <?php
                  $url_imagen = get_the_post_thumbnail_url( $noticia->ID, 'thumbnail' );
                  $imagen = get_the_post_thumbnail( $noticia->ID, 'destacado_home' );
                  $imagen = ($imagen)?$imagen:'<img width="320" height="200" src="'.get_template_directory_uri().'/assets/img/imagen_generica.png" class="attachment-destacado_home size-destacado_home wp-post-image" alt="">';
                  $n_title = (strlen($noticia->post_title)>=70)?substr($noticia->post_title, 0, 70).'...':$noticia->post_title;

                  $fecha = get_the_time('j \d\e F\, Y',$noticia->ID);
                ?>
                <div class="grid-item col-lg-6 px-30">
                  <div class="grid-content">
                    <a href="<?php echo get_permalink($noticia->ID); ?>" class="post-noticia">
                      <div class="card destacado">
                        <?=$imagen ?>
                        <!-- <img src="<?php echo $url_imagen; ?>" alt="noticia destacada"/> -->
                        <div class="card-body box-content transition">
                          <h3><?php echo $n_title; ?></h3>
                          <h5 class="date text-lowercase"><?php echo $fecha; ?></h5>
                        </div>
                      </div>
                    </a>
                  </div>
								</div>

            <?php
            if($vez%2==0 && $vez != $cantidad_noticias){
              echo '</div><div class="grid row"><div class="grid-sizer"></div>';
            }
              if($vez==$cantidad_noticias){
                break;
              }
              $vez++;
              endforeach; ?>
          <?php else: ?>

            <?php
            $args = array('post_type' => 'noticias', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $cantidad_noticias);
            $query_noticias_izq = new WP_Query($args);

            if($query_noticias_izq->have_posts())
            {
              while($query_noticias_izq->have_posts())
              {
                $query_noticias_izq->next_post();
                ?>
                <?php

                  $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($query_noticias_izq->post->ID), 'w500')[0];
                  $imagen = get_the_post_thumbnail( $query_noticias_izq->post->ID, 'destacado_home' );
                  $imagen = ($imagen)?$imagen:'<img width="320" height="200" src="'.get_template_directory_uri().'/assets/img/imagen_generica.png" class="attachment-destacado_home size-destacado_home wp-post-image" alt="">';
                  $fecha = get_the_time('j \d\e F\, Y',$query_noticias_izq->post->ID);
                  $n_title = (strlen($query_noticias_izq->post->post_title)>=135)?substr($query_noticias_izq->post->post_title, 0, 135).'...':$query_noticias_izq->post->post_title;
                ?>
                <div class="grid-item col-lg-6 px-30">
                  <div class="grid-content">
                    <a href="<?php echo get_permalink($query_noticias_izq->post->ID); ?>" class="post-noticia">
                      <div class="card destacado d_s">
                        <?=$imagen; ?>
                        <!-- <img src="<?php echo $url_imagen; ?>" alt="noticia destacada"/> -->
                        <div class="card-body box-content transition">
                          <h3><?php echo $n_title; ?></h3>
                          <h5 class="date text-lowercase"><?php echo $fecha; ?></h5>
                        </div>
                      </div>
                    </a>
                  </div>
								</div>
            <?php }
            }
          ?>

          <?php endif; ?>
          </div>
          <a href="<?php echo SITE_URL; ?>/noticias" class="btn btn-green mt-4">
            Ver más
          </a>
        </div>

        <div class="col-md-4">
          <h5 class="subtitle mt-sub">Eventos</h5>

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
                <div class="evento">
                  <p class="date first-letter-uppercase text-lowercase"><?php echo $fecha_evento; ?></p>
                  <a href="<?php echo get_permalink($query_eventos->post->ID); ?>" class="post-evento">
                    <div class="bs-callout bs-callout-pink">
                      <h4 class="title"><?php echo $query_eventos->post->post_title; ?></h4>
                      </div>
                      <?php if($query_eventos->post->ubicacion): ?>
                        <p>
                          <?php echo $query_eventos->post->ubicacion['address'];  ?>
                        </p>
                      <?php endif; ?>
                      <p>
                        <?php echo $hora_evento; ?> horas.
                      </p>
                      <?php if($query_eventos->post->url_formulario): ?>
                        <h4 class="link">Inscríbete al evento</h4>
                      <?php endif; ?>
                  </a>
                </div>
            <?php }
            }else
            /*
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
            Ver más
          </a>
        </div>
      </div>
    </div>
  </section>

<?php else: ?>

  <section class="noticias">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="subtitle">Noticias destacadas</h5>
        </div>
      </div>
      <div class="row grid">
        <div class="grid-sizer"></div>

          <?php if($noticias_destacadas): ?>

            <?php $vez=1;
              foreach($noticias_destacadas as $noticia): ?>
                <?php
                  $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($noticia->ID), 'w500')[0];
                  $imagen = get_the_post_thumbnail( $noticia->ID, 'destacado_home' );
                  $imagen = ($imagen)?$imagen:'<img width="320" height="200" src="'.get_template_directory_uri().'/assets/img/imagen_generica.png" class="attachment-destacado_home size-destacado_home wp-post-image" alt="">';
                  $fecha = get_the_time('j \d\e F\, Y',$noticia->ID);
                  $n_title = (strlen($noticia->post_title)>=55)?substr($noticia->post_title, 0, 55).'...':$noticia->post_title;
                ?>
                <div class="grid-item col-lg-3 px-30">
                  <div class="grid-content">
                    <a href="<?php echo get_permalink($noticia->ID); ?>" class="post-noticia">
                      <div class="card destacado">
                        <?=$imagen; ?>
                        <div class="card-body box-content transition">
                          <h3><?php echo $n_title; ?></h3>
                          <h5 class="date text-lowercase"><?php echo $fecha; ?></h5>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
            <?php
              $vez++;
              if($vez==$cantidad_noticias){
                break;
              }
              endforeach; ?>

          <?php else: ?>

            <?php
            $args_nfull = array('post_type' => 'noticias', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $cantidad_noticias);
            $query_noticias_full = new WP_Query($args_nfull);

            if($query_noticias_full->have_posts())
            {
              while($query_noticias_full->have_posts())
              {
                $query_noticias_full->next_post();
                ?>
                <?php
                  $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($query_noticias_full->post->ID), 'w500')[0];
                  $imagen = get_the_post_thumbnail( $query_noticias_full->post->ID, 'destacado_home' );
                  $imagen = ($imagen)?$imagen:'<img width="320" height="200" src="'.get_template_directory_uri().'/assets/img/imagen_generica.png" class="attachment-destacado_home size-destacado_home wp-post-image" alt="">';
                  $fecha = get_the_time('j \d\e F\, Y',$query_noticias_full->post->ID);
                  $n_title = (strlen($query_noticias_full->post->post_title)>=55)?substr($query_noticias_full->post->post_title, 0, 55).'...':$query_noticias_full->post->post_title;
                ?>
                <div class="grid-item col-lg-3 px-30">
                  <div class="grid-content">
                    <a href="<?php echo get_permalink($query_noticias_full->post->ID); ?>" class="post-noticia">
                      <div class="card destacado">
                        <?=$imagen; ?>
                        <div class="card-body box-content transition">
                          <h3><?php echo $n_title; ?></h3>
                          <h5 class="date text-lowercase"><?php echo $fecha; ?></h5>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

            <?php }
            }
          ?>

          <?php endif; ?>

      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <a href="<?php echo SITE_URL; ?>/noticias" class="btn btn-green">
            Ver más
          </a>
        </div>
      </div>

    </div>
  </section>



<?php endif; ?>
