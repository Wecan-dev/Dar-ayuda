<?php get_header(); ?>
<section class="banner-small">
<?php get_template_part('partials/rr-ss'); ?>

    <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/image.png">
    <div class="banner-small__text">
        <h2 class="banner-small__title">
            Buscador de empleo
        </h2>
    </div>
</section>
<section class="search-general search-content">
    <div class="padding-right-left padding-top-bottom">
        <h2 class="general-title">
            Oferta de Empleos
            <span></span>
        </h2>
        <div class="container-grid">
            <div class="search-general__list">
                <?php $args = array('post_type' => 'empleos', 'posts_per_page' => 6); ?>
                <?php $loop = new WP_Query($args); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <a class="search-general__item" href="<?php the_permalink(); ?>">
                        <div class="search-general__body">
                            <div class="search-general__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/image_1.png">
                                <div>
                                    <h2 class="search-general__title">
                                        <?php the_title(); ?>
                                    </h2>
                                    <ul>
                                        <li>
                                            <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/work@3x.png">
                                            <?php the_field('empresa'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="search-general__text">
                                <ul>
                                    <li>
                                        <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/location@3x.png">
                                        <?php the_field('ubicacion'); ?>
                                    </li>
                                    <li>
                                        <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/money@3x.png">
                                        <?php the_field('prestaciones'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    <?php wp_reset_postdata(); ?>
                <?php endwhile ?>

            </div>
            <div class="search-single">
                <div class="search-general__img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/image_1.png">
                    <div>
                        <h2 class="search-general__title">
                            <?php the_title(); ?>
                        </h2>
                        <ul>
                            <li>
                                <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/work@3x.png"> <?php the_field('empresa'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="search-general__text">
                    <ul>
                        <li>
                            <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/location@3x.png">
                            <?php the_field('ubicacion'); ?>
                        </li>
                        <li>
                            <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/buscador/money@3x.png">
                            <?php the_field('prestaciones'); ?>
                        </li>
                        <li>
                            <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/icon.png"> <?php the_field('horario'); ?>
                        </li>
                    </ul>
                </div>
                <p class="general-description">
                    <?php the_content(); ?>
                </p>
                <div class="d-flex justify-content-center">
                    <button style="border: none;" type="button" class="general-btn__green" data-toggle="collapse" data-target="#demo">Aplicar</button>
                </div>
                <div class="container" style="margin-top: 2rem;">
                    <div id="demo" class="collapse">
                    <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 5, 'title' => false, 'description' => false ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('partials/hoja-de-vida'); ?>
<?php get_footer(); ?>