<?php
/*
Template Name: Page Template - Documentos de interés
*/

$current = 'documentos-de-interes';
$title = get_the_title();
$imagen_destacada = get_field('imagen_destacada');
$texto_imagen = get_field('texto_imagen');
$texto_iniciativa = get_field('texto_iniciativa', 'option');
$imagen_iniciativa = get_field('imagen_iniciativa', 'option');

include('header.php');

?>

  <div class="slide box-align-down first">
    <div class="cont-img-slider">
      <?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>
      <img src="<?php echo $url_imagen_destacada; ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-10">
            <?php if($texto_imagen): ?>
            <div class="slider-txt-content">
              <h4 class="line-title title green"><?php echo $texto_imagen; ?></h4>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="filtros">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1><?php echo $title; ?></h1>
        </div>
      </div>
      <div class="row filtro">
        <div class="col-md-8">
          <div>
            <button class="wrapper-dropdown fecha" tabindex="1">
            <i class="fa fa-play" aria-hidden="true"></i>
            Temas
            <span class="d-block">Filtrar por temas relacionados</span>
            </button>
            <ul class="dropdown">
              <?php
                $terms = get_terms('categoria_archivo', array('hide_empty' => true));
                foreach ($terms as $key => $categoria): ?>
                <li><a href="" data-filtro="categoria" data-categoria="<?php echo $categoria->slug; ?>" class="filtro-categoria filtro-archivos-interes"><?php echo $categoria->name ?> (<?php echo $categoria->count; ?>)</a></li>
              <?php endforeach; ?>
            </ul>
            <div class="delete-search">
              <a class="link link-green borrar-filtro-interes" href="">Borrar Filtro</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <select id="buscador_archivos">
              <option value=""></option>
              <?php
              $args = array('post_type' => 'archivo', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1);
              $archivos = new WP_Query($args);
              $vez = 1;
              if($archivos->have_posts())
              {

                while($archivos->have_posts())
                {
                  $archivos->next_post();
                  ?>
                  <option value="<?php echo $archivos->post->ID; ?>"><?php echo $archivos->post->post_title; ?></option>
                  <?php

                }
              }
              ?>
            </select>
        </div>
      </div>
      <div class="row mt-30">
        <div class="col-md-12">
          <ul id="page-content" class="archivos-list">


            <?php
              $args = array('post_type' => 'archivo', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1);
              $archivos = new WP_Query($args);
              $vez = 1;
              if($archivos->have_posts())
              {

                while($archivos->have_posts())
                {
                  $archivos->next_post();
                  if($vez>4){$clase='hide';}else{$clase='';}

              ?>

            <?php 
            $pdf = get_field( 'archivo', $archivos->post->ID );
            $url = get_field( 'url', $archivos->post->ID );

            if($pdf['url']): ?>

              <li class="<?php echo $clase; ?>">
                <div class="circle-green-content -pdf">
                  PDF
                </div>
                <div class="txt-content -pdf">
                  <?php
                  $terms = get_the_terms($archivos->post->ID, 'categoria_archivo' );
                  $cont = 1;
                  $categorias = '';
                  foreach($terms as $term) {
                    if($cont==1){
                      $categorias = $categorias.$term->name.' ';
                    }else{
                      $categorias = $categorias.', '.$term->name;
                    }
                    $cont++;
                  }
                  
                  ?>

                  <h4 class="light-green"><?php echo $categorias; ?></h4>
                  <h3 class="title"><?php echo $archivos->post->post_title; ?></h3>
                  <a href="<?php echo $pdf['url']; ?>" class="btn btn-xs btn-grey">Descargar documento</a>
                </div>
              </li>

            <?php elseif($url): ?>

              <li class="<?php echo $clase; ?>">
                <div class="circle-green-content -pdf">
                  URL
                </div>
                <div class="txt-content -pdf">
                  <?php
                  $terms = get_the_terms($archivos->post->ID, 'categoria_archivo' );
                  $cont = 1;
                  $categorias = '';
                  foreach($terms as $term) {
                    if($cont==1){
                      $categorias = $categorias.$term->name.' ';
                    }else{
                      $categorias = $categorias.', '.$term->name;
                    }
                    $cont++;
                  }
                  
                  ?>

                  <h4 class="light-green"><?php echo $categorias; ?></h4>
                  <h3 class="title"><?php echo $archivos->post->post_title; ?></h3>
                  <a target="_blank" href="<?php echo $url; ?>" class="btn btn-xs btn-grey">Visitar</a>
                </div>
              </li>

            <?php endif; ?>







            <?php
              $vez++;

              }
            }

             ?>
          </ul>
        </div>
      </div>

      <?php if($vez>4){$clase_btn = ''; }else{$clase_btn = 'hide'; } ?>
      <div class="row mt-30">
        <div class="col-md-12 text-center mt-30">
          <a href="" class="btn btn-light-green btn-md js-cargar-mas-archivos <?php echo $clase_btn; ?>">
            Ver más documentos
          </a>
        </div>
      </div>
    </div>
  </section>


  <div class="slide box-align-up">
    <div class="cont-img-slider">
      <?php $url_imagen_iniciativa = $imagen_iniciativa['sizes']['w1600prefooter']; ?>
      <img src="<?php echo $url_imagen_iniciativa; ?>" alt="<?php echo $imagen_iniciativa['alt']; ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-xs-10">
            <div class="slider-txt-content resize">
              <h1 class="line-title pink"><?php echo $texto_iniciativa; ?></h1>
              <a href="<?php echo SITE_URL; ?>/nuestra-red#iniciativas-fis" class="btn btn-light-green btn-md">Conoce las iniciativas</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php include('footer.php'); ?>
