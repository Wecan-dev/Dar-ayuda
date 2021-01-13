<?php get_header(); ?>
<?php
$direction = get_theme_mod('contacto_direction');
$phone = get_theme_mod('contacto_phone');
$email = get_theme_mod('contacto_email');

$facebook = get_theme_mod('Redes_sociales_FB');
$instagram = get_theme_mod('Redes_sociales_IG');
?>

<section class="banner-small">
<?php get_template_part('partials/rr-ss'); ?>

    <img class="banner-small__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/contacto/image.png">
    <div class="banner-small__text">
        <h2 class="banner-small__title">
            Contacto
        </h2>
    </div>
</section>
<section class="contact-info">
    <img class="contact-info__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_2.png">
    <img class="contact-info__dotted contact-info__dotted--bottom" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_2.png">
    <div class="padding-top-bottom padding-right-left">
        <div class="container-grid">
            <div class="contact-info__form">
                <h2 class="general-title general-title--start">
                    Escríbenos
                    <span></span>
                </h2>
                <?php echo FrmFormsController::get_form_shortcode(array('id' => 3, 'title' => false, 'description' => false)); ?>

            </div>
            <div class="contact-info__rrss">
                <h2 class="general-title general-title--start">
                    Contáctanos
                    <span></span>
                </h2>
                <ul class="contact-info__list">
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/place.png">
                        <a href="#">
                            <span>
                                Dirección
                            </span>
                            <?php echo $direction; ?>
                        </a>
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-call.png">
                        <a href="tel:<?php echo $phone; ?>">
                            <span>
                                Teléfono
                            </span>
                            <?php echo $phone; ?>
                        </a>
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/envelope.png">
                        <a href="mailto:<?php echo $email; ?>">
                            <span>
                                Correo
                            </span>
                            <?php echo $email; ?>
                        </a>
                    </li>
                </ul>
                <div class="main-footer__rrss">
                    <a class="rrss__item" href="<?php echo $facebook; ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb.png">
                    </a>
                    <a class="rrss__item" href="<?php echo $instagram; ?>" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>