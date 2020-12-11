<?php

$red_titulo = get_field('red_titulo', 'option');
$red_bajada = get_field('red_bajada', 'option');
$fundaciones_destacadas = get_field('fundaciones_destacadas', 'option');

?>

<div class="content-half -grey nuestra-red-home">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1 class="title">
            <?php echo $red_titulo; ?>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="description nuestra-red">
            <p class="line-title pink">
            <?php echo $red_bajada; ?>
            </p>
            <a href="<?php echo SITE_URL; ?>/nuestra-red" class="btn btn-md btn-light-green hidden-xs">Conoce los integrantes de la red</a>
          </div>
        </div>
        <div class="col-sm-7 no-padding">
          <div class="red-colunga-slider">
            <div class="slide-custom-arrows">
              <div class="row">
                <div class="col-md-12">
                  <div class="slide-custom-arrows-block">
                    <div class="slide-custom-arrow prev"></div>
                    <div class="slide-custom-arrow next"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="slider-half">
              <?php if($fundaciones_destacadas): ?>
              <?php foreach($fundaciones_destacadas as $fundacion): ?>
                <?php $url = get_the_post_thumbnail_url( $fundacion->ID, 'w780' ); ?>
                  <div class="content-slider">
                    <a href="<?php echo get_permalink($fundacion->ID); ?>">
                      <img src="<?php echo $url ?>" alt="<?php echo $fundacion->post_title; ?>">
                      <div class="slide-txt">
                        <strong>
                          <?php echo $fundacion->post_title; ?>
                        </strong>
                        <br>
                        Apoyo: <?php
                          $terms = get_the_terms( $fundacion->ID, 'tipo_proyecto' );
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
                        $anio_de_apoyo = get_field('anio_de_apoyo', $fundacion->ID);
                        if($anio_de_apoyo):  ?>
                          <br>
                          Año: <?php echo $anio_de_apoyo; ?>
                        <?php endif; ?>
                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
          <a href="<?php echo SITE_URL; ?>/nuestra-red" class="btn btn-md btn-light-green slider-button">Conoce los integrantes de la red</a>
        </div>
      </div>
    </div>
  </div>
</div>
