<?php get_header(); ?>

<section class="banner-small">
<?php get_template_part('partials/rr-ss'); ?>

    <?php if (have_rows('banner')) : ?>
        <?php while (have_rows('banner')) : the_row(); ?>
            <?php if (get_sub_field('imagen_banner')) : ?>
                <img class="banner-small__img" src="<?php the_sub_field('imagen_banner'); ?>" />
            <?php endif ?>

            <div class="banner-small__text">
                <h2 class="banner-small__title">
                    <?php the_sub_field('texto_del_banner'); ?>
                </h2>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>
</section>
<section class="portfolio-general">
    <div class="padding-right-left padding-top-bottom">
        <div class="general-titlexs general-titlexs--center">
            Bienvenidos a
        </div>
        <h2 class="general-title general-title">
            <?php the_title(); ?>
            <span></span>
        </h2>
        <p class="general-description general-description--center">
            <?php the_field('texto_descriptivo'); ?>
        </p>
        <div class="container-grid">
            <div class="portfolio-general__sidebar">
                <?php $args = array('post_type' => 'Portafolio', 'order' => 'ASC', 'posts_per_page' => -1); ?>
                <?php $loop = new WP_Query($args); ?>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>

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

                <?php endwhile; ?>
            </div>
            <div class="portfolio-general__content">
                <?php if (have_rows('informacion')) : ?>
                    <img class="portfolio-general__img" src="<?php echo get_the_post_thumbnail_url(); ?>)">
                    <?php while (have_rows('informacion')) : the_row(); ?>
                        <?php if (get_sub_field('titulo')) : ?>
                            <h2 class="general-title general-title--start">
                                <?php the_sub_field('titulo'); ?>
                                <span></span>
                            </h2>
                        <?php endif; ?>
                        <?php if (have_rows('texto_informativo')) : ?>
                            <?php while (have_rows('texto_informativo')) : the_row(); ?>
                                <?php if (have_rows('parrafos')) : ?>
                                    <?php while (have_rows('parrafos')) : the_row(); ?>

                                        <?php if (get_sub_field('destacado') == 1) : ?>
                                            <p class="portfolio-general__description">
                                                <?php the_sub_field('parrafo'); ?>
                                                <span></span>
                                            </p>
                                        <?php else : ?>
                                            <p class="general-description">
                                                <?php the_sub_field('parrafo'); ?>
                                            </p>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                        <?php if (have_rows('items')) : ?>
                            <div class="portfolio-general__list">
                                <ul class="about-politics__list">
                                    <?php while (have_rows('items')) : the_row(); ?>
                                        <li> <?php the_sub_field('item'); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>