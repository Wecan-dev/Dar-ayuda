<?php
    $title = 'Noticias';
    $current = 'noticias';
    $noticia_principal_destacada = get_field('noticia_principal_destacada', 'option');
    $imagen_destacada = get_field('imagen_destacada_single_noticia', 'option');
    $url_imagen_destacada = $imagen_destacada['sizes']['w1600'];
    include('header.php');
?>

<section class="noticias-stage np-bottom">
          <!-- <div class="noticias-stage-color"></div> -->
          <div class="noticias-stage-bg" style="background-image: url('<?=get_template_directory_uri(); ?>/assets/img/fondo_noticias_1.jpg');"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="text-right mt-5 c-white">NOTICIAS</h1>
              </div>
            </div>
          </div>
</section>


    <section class="noticias" id="noticias">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
          <h5 class="noticias_breadcrumb">Noticias</h5>
        </div>
      </div>

      <div id="todas-las-noticias">
      <?php
        $args = array('post_type' => 'noticias', 'orderby' => 'date', 'order' => 'DESC', 'post__not_in'  => array($id_noticia_excluida), 'posts_per_page' => -1);
        $query_noticias = new WP_Query($args);
        $cont = 1;
        $vez_not = 1; $clase_not = '';
        if($query_noticias->have_posts())
        {

          while($query_noticias->have_posts())
          {
            $query_noticias->next_post();
            if($vez_not>6){$clase_not='hide';}else{$clase_not='';}
        ?>
        <?php if($cont == 1): ?>
          <div class="fila-noticia row mt-30 <?php echo $clase_not; ?>">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="row grid list">
        <?php endif; ?>
          <div class="col-md-4 no-padding grid-item">
              <div>
                <a href="<?php echo get_permalink($query_noticias->post->ID); ?>" class="post-noticia" title="<?=$query_noticias->post->post_title ?>">
                  <div class="card destacado">
                    <div class="grid-content">
                      <?php
                      $imagen = get_the_post_thumbnail( $query_noticias->post->ID, 'destacado_home' );
                      $imagen = ($imagen)?$imagen:'<img width="320" height="200" src="'.get_template_directory_uri().'/assets/img/imagen_generica.png" class="attachment-destacado_home size-destacado_home wp-post-image" alt="">';
                      // $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($query_noticias->post->ID), 'w500')[0];
                      // $url_imagen = ($url_imagen)?$url_imagen:get_template_directory_uri().'/assets/img/imagen_generica.png';
                      ?>
                    <!-- <img src="<?php echo $url_imagen; ?>" alt="noticia destacada"/> -->
                    <?=$imagen ?>
                    <div class="card-body box-content transition">

                      <?php $fecha = get_the_time('j \d\e F, Y',$query_noticias->post->ID); ?>
                      <h5 class="date text-lowercase"><?php echo $fecha; ?></h5>
                      <?php
                      $n_title = (strlen($query_noticias->post->post_title)>=90)?substr($query_noticias->post->post_title, 0, 90).'...':$query_noticias->post->post_title;
                      ?>
                      <h3 class="title"><?php echo $n_title; ?></h3>
                    </div>
                    </div>
                  </div>
                </a>
              </div>
          </div>
        <?php if($cont == 3): $cont=0; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <?php
          $cont=$cont+1;
          $vez_not = $vez_not+1;
          }
          if($cont!= 1){
            echo '</div></div></div>';
          }
        }
        ?>
      <?php if($vez_not>7): ?>
      <div class="row mt-30">
        <div class="col-md-12 text-center mt-30">
          <a href="" class="btn btn-light-green btn-md js-cargar-mas-noticias">
            Cargar más noticias
          </a>
        </div>
      </div>
      <?php endif; ?>


      </div><!-- todas noticias-->


    </div>
  </section>




<?php
  include('footer.php');
?>

<script type="text/javascript">
  $(window).load(function(){
    height = $('#calc_height a').children('div[class^="col-"]:first-child').height();
    $('#calc_height a').children('div[class^="col-"]:last-child').css('height', height+'px');
    console.log(height);
  });
</script>
