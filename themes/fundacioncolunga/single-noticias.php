<?php


if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    $current = 'noticias';
    $title = get_the_title();

    $autor = '';
    if(get_field('autor')){
      $autor = get_field('autor');
    }
    else{
      $autor = get_field('autor_noticias', 'option');
    }
    $fecha = get_the_time('j \d\e F, Y',$post->ID);

    $imagen_destacada = get_field('imagen_destacada');
    $imagen_destacada_generica = get_field('imagen_destacada_single_noticia', 'options');
    if($imagen_destacada){
      $url_imagen_destacada = $imagen_destacada['sizes']['w1600'];
    }else{
      $url_imagen_destacada = $imagen_destacada_generica['sizes']['w1600'];
    }


    include('header.php');
?>
  <section class="eventos-noticias first green-opacity" style="background-image: url(<?php echo $url_imagen_destacada; ?>)" >
    <div class="capa-color green-opacity"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 title-content">
          <div>
            <h1 class="title-destacado line-title green"><?php echo $title; ?></h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="noticia-evento-single" class="border-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h5 class="date" style="text-transform: lowercase;"><?php echo $fecha; ?></h5>
          <h5 class="autor-name"><?php echo $autor; ?></h5>
        </div>
      </div>

      <div class="row wp-content -noticia">
        <div class="col-md-8 col-md-offset-2">
          <?php echo the_content(); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="noticias single-noticia">
    <div class="container">
      <div class="row">
            <div class="col-md-6">
              <h5>Últimas noticias</h5>
            </div>
            <div class=" col-md-6 visible-md visible-lg link-ver text-right">
              <a class="link-grey" href="<?php echo SITE_URL; ?>/noticias">Ver todas las noticias</a>
            </div>
      </div>
      <div class="row mt-30">

    <?php
        $id_noticia_excluida = $post->ID;
        $args = array('post_type' => 'noticias', 'orderby' => 'date', 'posts_per_page' => 3, 'order' => 'DESC', 'post__not_in'  => array($id_noticia_excluida));
        $query_noticias = new WP_Query($args);
        $cont = 1;
        if($query_noticias->have_posts())
        {

          while($query_noticias->have_posts())
          {
            $query_noticias->next_post();
            $fecha = get_the_time('j F, Y',$query_noticias->post->ID);
    ?>

        <div class="col-md-4 no-padding">
          <a href="<?php echo get_permalink($query_noticias->post->ID); ?>">
              <div class="noticia-sec -hover">
                <h5 class="date text-lowercase"><?php echo $fecha; ?></h5>
                <h3 class="title"><?php echo $query_noticias->post->post_title; ?></h3>
                <h4 class="link d-inline-b">Seguir leyendo la noticia</h4>
              </div>
            </a>
        </div>

        <?php
          }
        }
        ?>
      </div>
      <div class="visible-sm visible-xs link-ver">
        <a class="link-grey" href="<?php echo SITE_URL; ?>/noticias">Ver todas las noticias</a>
      </div>
    </div>
  </section>

  <?php get_template_part( 'seccion', 'redes-sociales' ); ?>

<?php
  endwhile;
  include('footer.php');
else:
  //header('location:'.SITE_URL."/404/");
  //exit;
endif;
?>
