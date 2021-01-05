<?php
get_header();
global $wp_query;
?>
<section class="hero-wrap hero-wrap-2" style="background-position: center; background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/services.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php bloginfo('url'); ?>">Inicio <i class="ion-ios-arrow-forward"></i></a></span> </p>
                <h1 class="mb-0 bread">Nuestros Envases</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section" id="products">
    <div class="container-fluid px-md-4">
        <?php $cat_argtos = array(
            'orderby' => 'name',
            'order' => 'ASC'
        );
        $categorias = get_categories($cat_argtos);
        foreach ($categorias as $categoria) {
            $args = array(
                'showposts' => -1,
                'category__in' => array($categoria->term_id),
                'caller_get_posts' => 1
            );
            $entradas = get_posts($args);
            if ($entradas) {
        ?>
                <div class="row justify-content-center pb-5">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <?php
                        echo '<h2>Categoría: <span> <a href="' . get_category_link($categoria->term_id) . '" title="' . sprintf(__("Mostrar todas entradas en %s"), $categoria->name) . '" ' . '>' . $categoria->name . '</a> </span> </h2> ';
                        ?>
                    </div>
                </div>
                <div class="row justify-content-center ">
                    <?php
                    foreach ($entradas as $post) {
                        setup_postdata($post); ?>
                        <div class="col-md-3 ftco-animate">
                            <div class="work products-img mb-4 img d-flex align-items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
                                <a href="<?php the_permalink(); ?>" class="icon image-popup d-flex justify-content-center align-items-center">
                                    <span class="fa fa-plus"></span>
                                </a>
                                <div class="desc w-100 px-4">
                                    <div class="text w-100 mb-3">
                                        <span><?php the_category(); ?></span>
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
        <?php
            }
        } ?>
    </div>
</section>

<?php get_footer(); ?>