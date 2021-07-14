<?php get_header(); ?>
<?php
$direction1 = get_theme_mod('contacto_direction1');
$direction2 = get_theme_mod('contacto_direction2');
$direction3 = get_theme_mod('contacto_direction3');
$direction4 = get_theme_mod('contacto_direction4');

$urldirection1 = get_theme_mod('urldirection1');
$urldirection2 = get_theme_mod('urldirection2');
$urldirection3 = get_theme_mod('urldirection3');
$urldirection4 = get_theme_mod('urldirection4');

$phone = get_theme_mod('contacto_phone');
$phone2 = get_theme_mod('contacto_phone2');
$phone3 = get_theme_mod('contacto_phone3');
$phone4 = get_theme_mod('contacto_phone4');


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
                      
					
						<strong><p>Medellín</p>	</strong>
							   <?php echo $direction1; ?> <br>
						<?php echo $phone; ?>
						</li>
					<li>
					
						<strong><p>Bogotá</p>	</strong>
							   <?php echo $direction2; ?>
<br> <?php echo $phone2; ?>
					
						           </li>
						<li>
				
						<strong><p>Cali</p>	</strong>
							   <?php echo $direction3; ?>
<br> <?php echo $phone3; ?>
				
							           </li>
							<li>
				
						<strong><p>Pereira</p></strong>
							   <?php echo $direction4; ?>
<br>  <?php echo $phone4; ?>
				
         
                    </li>
                    <li>
                       
                   
					     
                   <div class="contact-title__box" >
			           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/envelope.png">
                  	<h2 class="contact-title" >
                                Correo
                            </h2>
					   </div>

                    <li>
             
                        <a href="mailto:<?php echo $email; ?>">
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