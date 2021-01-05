<?php get_header(); ?>
<section class="banner-small">
    <div class="main-banner__rrss">
        <a href="" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb_2.png">
        </a>
        <a href="" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ig_2.png">
        </a>
    </div>
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
                                        <?php the_field('presataciones'); ?>
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
                    <?php echo do_shortcode(   get_field( 'formulario' ) ); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-register">
    <div class="container-grid">
        <div class="main-register__img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/image_2.png">
        </div>
        <div class="main-register__text">
            <img class="main-register__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_3.png">
            <img class="main-register__dotted main-register__dotted--bottom" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_3.png">
            <h2 class="main-register__title">
                Ingresa tu
                <br>
                <span>
                    hoja de vida
                </span>
            </h2>
            <?php echo FrmFormsController::get_form_shortcode(array('id' => 1, 'title' => false, 'description' => false)); ?>
    <!--         <form>
                <label>
                    Nombre*
                    <input type="text">
                </label>
                <label>
                    Apellido*
                    <input type="text">
                </label>
                <label>
                    Correo*
                    <input type="text">
                </label>
                <label>
                    Puesto de trabajo deseado*
                    <input type="text">
                </label>
                <label>
                    Adjuntar hoja de vida (pdf)*
                    <input type="file">
                </label>
            </form> -->
        </div>
    </div>
</section><?php get_footer(); ?>