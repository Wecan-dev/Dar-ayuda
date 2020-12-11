<?php
if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    $current = 'nuestra-red';

    $title = get_the_title();

    if(get_field('imagen_destacada')){
      $imagen_destacada = get_field('imagen_destacada');
    }else{
      $imagen_destacada = get_field('imagen_generica_single_fundacion', 'option');
    }


    $titulo_imagen = get_field('titulo_imagen');
    $texto_imagen = get_field('texto_imagen');

    $proyecto = get_field('proyecto');
    //$fondo = get_field('fondo');
    $anio_de_apoyo = get_field('anio_de_apoyo');

    //$alianza_de_apoyo = get_field('alianza_de_apoyo');

    $impacto = get_field('impacto');
    $beneficiarios = get_field('publico_objetivo');

    $material_de_interes = get_field('material_de_interes');

    $contacto_texto = get_field('contacto_texto');
    $sitio_web = get_field('sitio_web');

    $tipo_de_cargo = get_field('tipo_de_cargo');
    $persona_a_cargo = get_field('persona_a_cargo');

    $email = get_field('email');
    $ubicacion = get_field('ubicacion');
    $contacto_imagen = get_field('contacto_imagen');
    $url_facebook = get_field('url_facebook');
    $url_twitter = get_field('url_twitter');
    $url_youtube = get_field('url_youtube');
    $url_instagram = get_field('url_instagram');

    $imagen_iniciativa = get_field('imagen_iniciativa', 'options');
    $texto_iniciativa = get_field('texto_iniciativa', 'options');

    include('header.php');

?>

  <div class="slide box-align-down first">
    <div class="cont-img-slider">
      <?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>
      <img src="<?php echo $url_imagen_destacada; ?>">
      <?php if($titulo_imagen != ''): ?>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-10">
            <div class="slider-txt-content">
              <h1 class="title line-title pink"><?php echo $titulo_imagen; ?></h1>
              <p>
                <?php echo $texto_imagen; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
    </div>
  </div>

  <section class="border-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center">
          <?php /* <h1>Ficha Técnica FIS</h1>*/ ?>
          <h1><strong><?php echo $title; ?></strong></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-offset-1 col-md-10">
          <table class="table-ficha">
            <tr>
              <td>Área de trabajo:</td>
              <td><?php
                $terms = get_the_terms( $post->ID, 'area_fundacion' );
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
              </td>
            </tr>

            <tr>
              <td>Tipo de apoyo:</td>
              <td><?php
                $terms = get_the_terms( $post->ID, 'tipo_proyecto' );
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
              </td>
            </tr>

            <?php /* if($alianza_de_apoyo):  ?>
            <tr>
              <td>Alianza de apoyo:</td>
              <td>
                <?php
                  $cont_alianza = 0;
                  foreach($alianza_de_apoyo as $alianza) {
                    if($cont_alianza==0){
                      echo $alianza['label'].' ';
                    }else{
                      echo ', '.$alianza['label'];
                    }
                    $cont_alianza++;
                  }
                  ?>
              </td>
            </tr>
            <?php endif; */ ?>

            <?php if($proyecto):  ?>
            <tr>
              <td>Proyecto:</td>
              <td><?php echo $proyecto; ?></td>
            </tr>
            <?php endif; ?>

            <?php if($anio_de_apoyo):  ?>
            <tr>
              <td>Año de apoyo:</td>
              <td><?php echo $anio_de_apoyo; ?></td>
            </tr>
            <?php endif; ?>

            <?php if($beneficiarios): ?>
            <tr>
              <td>Beneficiarios:</td>
              <td><?php echo $beneficiarios; ?></td>
            </tr>
            <?php endif; ?>

            <?php if($impacto): ?>
            <tr>
              <td>Impacto:</td>
              <td><?php echo $impacto; ?></td>
            </tr>
            <?php endif; ?>

          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <?php echo the_content(); ?>
        </div>
      </div>
    </div>
  </section>

<?php if($material_de_interes): ?>
  <section class="material-descargable">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h1 class="title line-title pink">Descarga material de interés</h1>
        </div>
      </div>
      <?php $vez = 1; ?>
      <?php foreach($material_de_interes as $material): ?>
        <?php if($vez == 1): ?>
          <div class="row">
        <?php endif; ?>
            <div class="col-sm-4 no-padding">
              <a href="<?php echo $material['archivo']['url'] ?>">
                    <div class="material-content">
                      <h3 class="title line-title green"><?php echo $material['nombre'] ?></h3>
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


  <div class="content-half fis -grey">
    <div class="box-img-content -right">
      <?php
      $imagen_destacada_generica = get_field('imagen_contacto_single_fundacion', 'options');
      if($contacto_imagen){
        $url_imagen_destacada = $contacto_imagen['sizes']['w800'];
      }else{
        $url_imagen_destacada = $imagen_destacada_generica['sizes']['w800'];
      }
      ?>
      <img src="<?php echo $url_imagen_destacada; ?>">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-5">
        <div class="description">
          <h1 class="title line-title pink"><?php echo $contacto_texto; ?></h1>
          <table class="table-contacto">
            <?php if($tipo_de_cargo && $persona_a_cargo): ?>
            <tr>
              <td><?php echo $tipo_de_cargo; ?>:</td>
              <td><?php echo $persona_a_cargo; ?></td>
            </tr>
            <?php endif; ?>

            <?php if($email): ?>
            <tr>
              <td>Correo:</td>
              <td><a class="link" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
            </tr>
            <?php endif; ?>
            <?php if($sitio_web): ?>
            <tr>
              <td>Sitio web:</td>
              <td><a class="link" target="_blank" href="<?php echo $sitio_web; ?>"><?php echo $sitio_web; ?></a></td>
            </tr>
            <?php endif; ?>
            <?php if($ubicacion): ?>
            <tr>
              <td>Ubicación: </td>
              <td><a class="link" target="_blank" href="https://www.google.cl/maps/dir/<?php echo $ubicacion['lat']; ?>,<?php echo $ubicacion['lng']; ?>/" target="_blank"><?php echo $ubicacion['address']; ?></a></td>
            </tr>
            <?php endif; ?>
            <tr>
              <td> </td>
              <td>
                <?php if($url_facebook): ?>
                <a class="fb -grey" href="<?php echo $url_facebook; ?>" target="_blank"><i class="fa fa-facebook-official transition" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if($url_twitter): ?>
                <a href="<?php echo $url_twitter; ?>" target="_blank" class="twit -grey"><i class="fa fa-twitter transition" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if($url_youtube): ?>
                <a href="<?php echo $url_youtube; ?>" target="_blank" class="yt -grey" href="#"><i class="fa fa-youtube-play transition" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if($url_instagram): ?>
                <a href="<?php echo $url_instagram; ?>" target="_blank" class="inst -grey"><i class="fa fa-instagram transition" aria-hidden="true"></i></a>
                <?php endif; ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-sm-7"></div>
      </div>
    </div>
  </div>

  <div class="slide box-align-up">
    <div class="cont-img-slider">
      <?php $url_imagen_iniciativa = $imagen_iniciativa['sizes']['w1600prefooter']; ?>
      <img src="<?php echo $url_imagen_iniciativa; ?>" alt="<?php echo $imagen_iniciativa['alt']; ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-10">
            <div class="slider-txt-content  resize">
              <h1 class="title line-title pink"><?php echo $texto_iniciativa ?></h1>
              <a href="<?php echo SITE_URL; ?>/nuestra-red#iniciativas-fis" class="btn btn-light-green btn-md">Conoce las iniciativas</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  endwhile;
  include('footer.php');
else:
  header('location:'.SITE_URL."/404/");
  exit;
endif;
?>