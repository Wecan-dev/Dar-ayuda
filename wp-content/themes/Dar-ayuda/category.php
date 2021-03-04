<?php

/**
 * A Simple Category Template
 */

get_header(); ?>
     <?php
          $facebook = get_theme_mod('Redes_sociales_FB');
          $instagram = get_theme_mod('Redes_sociales_IG');
      ?>
<section class="banner-small">
<?php get_template_part('partials/rr-ss'); ?>

  <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/image.png">
  <div class="banner-small__text">
    <h2 class="banner-small__title">
      Blog
    </h2>
  </div>
</section>
<section class="blog-all">
  <div class="padding-top-bottom padding-right-left">
    <div class="container-grid">
      <div class="blog-all__sidebar">
        <div class="blog-all__card">
          <h2 class="general-title general-title--start">
            Buscar
            <span></span>
          </h2>
          <div class="blog-all__form">
            <form style="display: contents;" role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
              <input type="search" class="search-field" placeholder="Buscar" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
              <input type="hidden" name="post" value="post" />

              <input type="submit" value="" placeholder="" style="width: auto; background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/blog/search.png); background-repeat: no-repeat;background-position: right;background-size: contain;" />
            </form>

          </div>
        </div>
        <div class="blog-all__card">
          <h2 class="general-title general-title--start">
            Categorías
            <span></span>
          </h2>
          <ul>

            <?php
            $cat_argtos = array(
              'orderby' => 'name',
              'order' => 'ASC'
            );
            $categorias = get_categories($cat_argtos);
            foreach ($categorias as $categoria) {
              $args = array(
                'showposts' => -1,
                'category__in' => array($categoria->term_id),
                'caller_get_posts' => 0
              );
              $entradas = get_posts($args);
              if ($entradas) {
                echo '<li> <a class="general-description" href="' . get_category_link($categoria->term_id) . '" title="' . sprintf(__("Mostrar todas entradas en %s"), $categoria->name) . '" ' . '>' . $categoria->name . '</a> </li>';
              }
            }
            ?>

          </ul>
        </div>
        <div class="blog-all__card">
          <h2 class="general-title general-title--start">
            Post recientes
            <span></span>
          </h2>
          <?php $args = array('post_type' => 'post', 'posts_per_page' => 6); ?>
          <?php $loop = new WP_Query($args); ?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="blog-all__recent">
              <img style="width: 67px;height: 67px;object-fit: cover;" src="<?php echo get_the_post_thumbnail_url(); ?>">
              <div class="blog-all__text">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <p>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/icon.png"><?php the_date(); ?>
                </p>
              </div>
            </div>
          <?php endwhile ?>

        </div>
      </div>
      <div class="blog-all__content">
        <?php
        // Check if there are any posts to display
        if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <div class="about-blog__item">
              <a class="about-blog__img" href="<?php the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
              </a>
              <div class="about-blog__body">
                <a class="about-blog__title" href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
                <p class="general-description">
                  <?php the_excerpt(30); ?>
                </p>
                <div class="about-blog__meta">
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nuestra-empresa/user.png">
                    <?php the_author(); ?>
                  </a>
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nuestra-empresa/heart.png">
                    Lorem
                  </a>
                  <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nuestra-empresa/chat.png">
                    <?php $numero_de_comentarios = get_comments_number();
                    echo $numero_de_comentarios; ?>
                  </a>
                </div>
              </div>
            </div>
          <?php endwhile;
        else : ?>
          <section class="error-404">
            <div class=" padding-right-left">
              <h2 class="error-404__title">
                LO SENTIMOS
              </h2>
              <h2 class="error-404__subtitle">
                no podemos encontrar la categoría que estás buscando
              </h2>
        
            </div>
          </section>


        <?php endif; ?>
      </div>
    </div>
  </div>
</section>



<?php get_footer(); ?>