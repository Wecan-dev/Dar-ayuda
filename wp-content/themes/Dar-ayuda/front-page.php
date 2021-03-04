<?php get_header(); ?>
<!-- Banner-->
<section class="main-banner">
<?php get_template_part('partials/rr-ss'); ?>

    <div class="main-banner__content">
        <?php if (have_rows('banner')) : ?>
            <?php while (have_rows('banner')) : the_row(); ?>
                <div class="main-banner__item">
                    <div class="main-banner__text wow animated fadeIn" style="visibility: visible; animation-delay: .3s  ;">
                        <h2 class="main-banner__title">
                            <?php the_sub_field('titulo_del_banner'); ?>
                        </h2>
                        <p class="main-banner__subtitle">
                            <?php the_sub_field('subtitulo_del_banner'); ?>
                        </p>
                        <?php if (have_rows('boton')) : ?>
                            <?php while (have_rows('boton')) : the_row(); ?>

                                <?php $link_del_boton = get_sub_field('link_del_boton'); ?>
                                <?php if ($link_del_boton) : ?>
                                    <a class="main-general__button" href="<?php echo esc_url($link_del_boton); ?>"><?php the_sub_field('titulo_del_boton'); ?></a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="main-banner__img">
                        <?php if (get_sub_field('imagen_del_banner')) : ?>
                            <img alt="Imagen Banner" src="<?php the_sub_field('imagen_del_banner'); ?>" />
                        <?php endif ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>

<!-- About-->
<section class="main-about">
    <div class="padding-top-bottom padding-right-left">
        <img class="main-about__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_2.png">
        <div class="container-grid">
            <div class="main-about__img">
                <?php if (get_field('img_destacada')) : ?>
                    <img src="<?php the_field('img_destacada'); ?>" / alt="Sobre Nosotros">
                <?php endif ?>
            </div>
            <div class="main-about__text">
                <div class="general-titlexs">
                  Conoce
                </div>
                <h2 class="general-title general-title--start">
                    Quienes somos
                    <span></span>
                </h2>
                <p class="general-description">
                    <?php the_field('general'); ?>
                </p>
                <p class="main-about__description">
                    <?php the_field('text_principal'); ?>
                </p>
                <a class="general-btn__green" href="<?php echo bloginfo('url') . '/index.php/nuestra-empresa'; ?>">Leer más</a>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio-->
<section class="main-portfolio">
    <div class="padding-right-left padding-top-bottom">
        <div class="general-title">
            Nuestro Servicios
            <span></span>
        </div>
        <p class="general-description general-description--center">
            <?php the_field('text_portfolio'); ?>
        </p>
        <div class="main-services__flex">
            <div class="container-grid">
                <?php if (have_rows('procesos')) : ?>
                    <?php while (have_rows('procesos')) : the_row(); ?>
                        <?php $mostrar_portafolio = get_sub_field('mostrar_portafolio'); ?>
                        <?php if ($mostrar_portafolio) : ?>
                            <?php $post = $mostrar_portafolio; ?>
                            <?php setup_postdata($post); ?>
                            <a class="main-portfolio__item" href="<?php the_permalink(); ?>">
                                <div class="main-portfolio__img">
                                    <?php $icono = get_field('icono'); ?>
                                    <?php if ($icono) : ?>
                                        <img src="<?php echo esc_url($icono['url']); ?>" alt="<?php echo esc_attr($icono['alt']); ?>" />
                                    <?php endif; ?> </div>
                                <div class="main-portfolio__title">
                                    <?php the_title(); ?>
                                </div>
                            </a>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('partials/hoja-de-vida'); ?>


<!-- Search-->
<section class="main-search">
    <img class="main-search__bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/image.png">
    <img class="main-search__dotted main-search__dotted-left" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box-copy.png">
    <img class="main-search__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box@3x.png">
    <div class="padding-top-bottom padding-right-left">
        <h2><?php the_field('titulo_cta'); ?></h2>
        <h2><?php the_field('subtitulo_cta'); ?></h2>
        <p class="general-description general-description--center general-description--white">
            <?php the_field('descripcion_cta'); ?>
        </p>
        <div class="d-flex justify-content-center">
            <?php if (have_rows('boton_cta')) : ?>
                <?php while (have_rows('boton_cta')) : the_row(); ?>

                    <?php $boton_url = get_sub_field('boton_url'); ?>
                    <?php if ($boton_url) : ?>
                        <a class="main-general__button" href="<?php echo esc_url($boton_url); ?>"><?php the_sub_field('texto_boton'); ?></a>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Services-->
<section class="main-services">
    <div class="padding-right-left padding-top-bottom">
        <div class="general-title">
            Servicios en Línea
            <span></span>
        </div>
        <p class="general-description general-description--center">
            <?php the_field('descripcion_servicios'); ?>
        </p>
        <div class="main-services__flex">
            <div class="container-grid">
                <img class="main-services__bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/images.png">
                <?php if (have_rows('servicios')) : ?>
                    <?php while (have_rows('servicios')) : the_row(); ?>
                        <?php $imagen = get_sub_field('imagen'); ?>
                        <?php $link_del_servicio = get_sub_field('link_del_servicio'); ?>
                        <?php if ($link_del_servicio) : ?>
                            <a class="main-portfolio__item" href="<?php echo esc_url($link_del_servicio); ?>">
                                <div class="main-portfolio__img">
                                    <?php if ($imagen) : ?>
                                        <img src="<?php echo esc_url($imagen['url']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="main-portfolio__title">
                                    <?php the_sub_field('texto_del_servicio'); ?>
                                </div>
                            </a>
                        <?php else : ?>
                            <div class="main-portfolio__item">
                                <div class="main-portfolio__img">
                                    <?php if ($imagen) : ?>
                                        <img src="<?php echo esc_url($imagen['url']); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="main-portfolio__title">
                                    <?php the_sub_field('texto_del_servicio'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>