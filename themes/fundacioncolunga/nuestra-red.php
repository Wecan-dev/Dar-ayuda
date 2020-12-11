<?php
/*
Template Name: Page Template - Nuestra Red
*/
  $current = 'nuestra-red';
  $title = get_the_title();
  $imagen_destacada = get_field('imagen_destacada');
  $descripcion_imagen = get_field('descripcion_imagen');
  $red_de_partners = get_field('partners');
  //$noticia_principal_destacada = get_field('noticia_principal_destacada', 'option');
  //$noticias_destacadas = get_field('noticias_destacadas', 'option');

  include('header.php');

 ?>

  <div class="slide box-align-down first">
    <div class="cont-img-slider">
      <?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>
      <img src="<?php echo $url_imagen_destacada; ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-10">
            <?php if($descripcion_imagen): ?>
            <div class="slider-txt-content">
              <h4 class="line-title title green"><?php echo $descripcion_imagen; ?></h4>
            </div>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="iniciativas-fis" class="fundacion-box">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h1>Conoce a nuestros miembros, súmate y colabora con nuestra red</h1>
        </div>
      </div>

      <div class="row filtro">
          <div class="col-md-12"><p>Filtrar por el área de impacto y/o el tipo de fondo adjudicado</p></div>
          <div class="col-sm-4">
            <div>
              <button class="wrapper-dropdown same" tabindex="1">
                 <i class="fa fa-play" aria-hidden="true"></i>
                Áreas
                <span class="d-block">Filtrar por áreas de impacto</span>
              </button>
              <ul id="lista-area" class="dropdown">
                <?php
                  $terms = get_terms('area_fundacion', array('hide_empty' => true));
                  foreach ($terms as $key => $area): ?>
                    <li><a href="" data-filtro="area" data-area="<?php echo $area->slug; ?>" class="filtro-area filtro-colunga"><?php echo $area->name; ?> (<?php echo $area->count; ?>)</a></li>
                  <?php endforeach; ?>
              </ul>
              <div class="delete-search">
                <a class="link link-green" href="<?php echo SITE_URL; ?>/nuestra-red#iniciativas-fis">Borrar Filtro</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div>
              <button class="wrapper-dropdown same" tabindex="1">
                 <i class="fa fa-play" aria-hidden="true"></i>
                Tipos de apoyo
              <span class="d-block">Filtrar por el tipo de apoyo</span>
              </button>
              <ul id="lista-tipo" class="dropdown">
                <?php
                  $terms = get_terms('tipo_proyecto', array('hide_empty' => true));
                  foreach ($terms as $key => $tipo): ?>
                    <li>
                      <a href="" data-filtro="tipo" data-tipo="<?php echo $tipo->slug; ?>" class="filtro-tipo filtro-colunga"><?php echo $tipo->name; ?> (<?php echo $tipo->count; ?>)</a>
                    </li>
                  <?php endforeach; ?>
              </ul>
              <div class="delete-search">
                <a class="link link-green" href="<?php echo SITE_URL; ?>/nuestra-red#iniciativas-fis">Borrar Filtro</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <select id="buscador_fundaciones">
              <option value=""></option>
              <?php
              $args = array('post_type' => 'fundacion', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1);
              $bfundaciones = new WP_Query($args);
              $vez = 1;
              if($bfundaciones->have_posts())
              {

                while($bfundaciones->have_posts())
                {
                  $bfundaciones->next_post();
                  ?>
                  <option value="<?php echo $bfundaciones->post->ID; ?>"><?php echo $bfundaciones->post->post_title; ?></option>
                  <?php

                }
              }
              ?>
            </select>
        </div>
      </div>

      <div class="row">
        <div id="divresultados" class="col-md-12">
          <ul id="lista-fundaciones" class="list-fundacion">
            <?php
              //Posts ordenados por año descendente
              $id_posts_ordenados = $wpdb->get_results( "SELECT id FROM wp_posts WHERE post_type = 'fundacion' AND post_status = 'publish'" );

              //Traspaso los id a un arreglo.
              foreach ($id_posts_ordenados as $value)
                $arreglo_ids[] = $value->id;

              $args = array(
                'post_type' => 'fundacion',
                //'orderby' => array( 'post_date' => 'DESC', 'title' => 'ASC' ),
                //'orderby' => array( 'title' => 'ASC' ,'post_date' => 'DESC', ),
                // 'orderby'        => 'post__in',
                'meta_key'			=> 'anio_para_ordenar',
              	'orderby'			=> array(
                  'meta_value' => 'DESC',
                  'post_title' => 'ASC'
                ),
                'post__in'       => $arreglo_ids,
                'posts_per_page' => -1
              );

              $fundaciones = new WP_Query($args);
              $vez = 1;
              if($fundaciones->have_posts())
              {

                while($fundaciones->have_posts())
                {
                  $fundaciones->next_post();
                  if($vez>4){$clase='hide';}else{$clase='';}
              ?>
              <li class="<?php echo $clase; ?>">
                <a href="<?php echo get_permalink($fundaciones->post->ID); ?>">

                  <?php $imagen_destacada_fundacion = get_the_post_thumbnail_url( $fundaciones->post->ID, 'w780' ); ?>
                  <div class="bg-img-fundacion" style="background-image: url(<?php echo $imagen_destacada_fundacion; ?>)">
                    <div class="capa-color"></div>
                    <div class="fundacion-name">
                      <strong>
                        <?php echo $fundaciones->post->post_title; ?>
                      </strong>
                      <br>
                      Apoyo: <?php
                        $terms = get_the_terms( $fundaciones->post->ID, 'tipo_proyecto' );
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
                      <?php
                      $anio_de_apoyo = get_field('anio_de_apoyo', $fundaciones->post->ID);
                      if($anio_de_apoyo):  ?>
                        <br>
                        Año: <?php echo $anio_de_apoyo; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </a>
                <div class="info-fundacion">
                  <h4 class="proyecto-title light-green">Área de trabajo:
                  <?php
                  $terms = get_the_terms( $fundaciones->post->ID, 'area_fundacion' );
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
                  </h4>
                  <?php /* ?>
                  <h4 class="proyecto-title light-green">Tipo de apoyo:
                  <?php
                  $terms = get_the_terms( $fundaciones->post->ID, 'tipo_proyecto' );
                  $cont_tipo = 1;
                  foreach($terms as $term) {
                    if($cont_tipo==1){
                      echo $term->name.' ';
                    }else{
                      echo ', '.$term->name;
                    }
                    $cont_tipo++;
                  }
                  ?>
                  </h4>
                  <?php */ ?>
                  <?php if($fundaciones->post->descripcion_corta): ?>
                  <p><?php echo $fundaciones->post->descripcion_corta; ?></p>
                  <?php endif; ?>
                  <?php if($fundaciones->post->email): ?>
                  <h4>Email: <a class="link" href="mailto:<?php echo $fundaciones->post->email; ?> "><?php echo $fundaciones->post->email; ?></a></h4>
                  <?php endif; ?>
                  <a href="<?php echo get_permalink($fundaciones->post->ID); ?>" class="btn btn-xs btn-grey">Conoce la fundación</a>
                </div>


              </li>

              <?php
                  $vez++;

                  }
                }
              ?>
          </ul>
        </div>
      </div>

      <?php // if($vez>4): ?>
      <?php if($vez>4){$clase_btn = ''; }else{$clase_btn = 'hide'; } ?>
      <div class="row">
        <div class="col-md-12 text-center">
          <a href="" class="btn btn-light-green btn-md js-cargar-mas-fundaciones <?php echo $clase_btn; ?>">
            Cargar más
          </a>
        </div>
      </div>
      <?php //endif; ?>
    </div>
  </section>

<?php if($red_de_partners): ?>
  <section id="partners" class="partners">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="bold">Colaboradores</h3>
        </div>
      </div>
      <?php $vez = 1; ?>
      <?php foreach($red_de_partners as $partner): ?>
        <?php if($vez == 1): ?>
          <div class="row">
        <?php endif; ?>
          <div class="col-sm-4">
            <a href="<?php echo $partner['link']; ?>" target="_blank">
              <div class="partners-name">
                <h4 class="title"><?php echo $partner['nombre_partner']; ?></h4>
              </div>
            </a>
          </div>
          <?php if($vez == 3): $vez=0; ?>
          </div>
        <?php
          endif;
          $vez=$vez+1;
        ?>
      <?php endforeach; ?>

    </div>
  </section>
<?php endif; ?>

<?php get_template_part( 'seccion', 'noticias' ); ?>

<?php /* if($noticia_principal_destacada): ?>
  <section class="noticias">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h5 class="">Noticias destacadas</h5>
        </div>
        <div class="col-md-6 text-right hidden-sm hidden-xs">
          <a  class="link-grey" href="<?php echo SITE_URL; ?>/noticias" >Ver todas las noticias</a>
        </div>
      </div>
      <div class="row mt-30">

        <?php if($noticia_principal_destacada): ?>
          <?php $fecha = get_the_time('j · F · Y',$noticia_principal_destacada[0]->ID); ?>
          <?php $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($noticia_principal_destacada[0]->ID), 'thumbnail')[0]; ?>
          <a href="<?php echo get_permalink($noticia_principal_destacada[0]->ID); ?>">
            <div class="col-md-7 destacado">
              <div class="img-destacada">
                <img src="<?php echo $url_imagen;?>" alt="noticia destacada"/>
              </div>
              <div class="text-content-left">
                <h5 class="date"><?php echo $fecha; ?></h5>
                <h1 class="title-destacado"><?php echo $noticia_principal_destacada[0]->post_title; ?></h1>
                <h4 class="link transition">Seguir leyendo la noticia</h4>
              </div>
            </div>
          </a>
        <?php endif; ?>


        <div class="col-md-5 noticias-2c -flex">
        <?php if($noticias_destacadas): ?>
          <?php foreach($noticias_destacadas as $noticia): ?>
            <?php $fecha = get_the_time('j · F · Y',$noticia->ID); ?>
            <a href="<?php echo get_permalink($noticia->ID); ?>">
              <div class="noticia-content">
                <h5 class="date"><?php echo $fecha; ?></h5>
                <h3 class="title"><?php echo $noticia->post_title; ?></h3>
                <h4 class="link transition">Seguir leyendo la noticia</h4>
              </div>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
        </div>

      </div>
      <div class="visible-sm visible-xs link-ver">
        <a class="link-grey" href="<?php echo SITE_URL; ?>/noticias">Ver todas las noticias</a>
      </div>
    </div>
  </section>
<?php endif; */?>

<?php include('footer.php'); ?>
