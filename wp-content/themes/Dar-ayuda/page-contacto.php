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
                <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 3, 'title' => false, 'description' => false ) ); ?>
                <!-- <form>
                    <label>
                        Nombre*
                        <input type="text">
                    </label>
                    <label>
                        Correo*
                        <input type="text">
                    </label>
                    <label>
                        Teléfono*
                        <input type="text">
                    </label>
                    <label>
                        Mensaje
                        <textarea></textarea>
                    </label>
                    <div class="d-flex justify-content-center">
                        <a class="general-btn__green" href="">Enviar</a>
                    </div>
                </form> -->
            </div>
            <div class="contact-info__rrss">
                <h2 class="general-title general-title--start">
                    Contáctanos
                    <span></span>
                </h2>
                <ul class="contact-info__list">
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/place.png">
                        <a href="">
                            <span>
                                Dirección
                            </span>
                            Carrera 67 # 78-157
                        </a>
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-call.png">
                        <a href="">
                            <span>
                                Teléfono
                            </span>
                            57 (4) 444 56 78
                        </a>
                    </li>
                    <li>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/envelope.png">
                        <a href="">
                            <span>
                                Correo
                            </span>
                            info@darayuda.com
                        </a>
                    </li>
                </ul>
                <div class="main-footer__rrss">
                    <a class="rrss__item" href="" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb.png">
                    </a>
                    <a class="rrss__item" href="" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.png">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>