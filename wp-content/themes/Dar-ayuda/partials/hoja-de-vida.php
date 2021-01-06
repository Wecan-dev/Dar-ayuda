<!-- Register-->
<?php
    $text = get_theme_mod('banner1_titulo');
    $text2 = get_theme_mod('banner1_contenido');
    $img = get_theme_mod('banner1_imagen');
?>
<section class="main-register">
    <div class="container-grid">
        <div class="main-register__img">
            <img src="  <?php echo $img; ?>">
        </div>
        <div class="main-register__text">
            <img class="main-register__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_3.png">
            <img class="main-register__dotted main-register__dotted--bottom" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_3.png">
       
            <h1></h1>
            <h2 class="main-register__title">

                <?php echo $text; ?>
                <br>
                <span>
                <?php echo $text2; ?>
                </span>
            </h2>
            <form>
                <?php echo FrmFormsController::get_form_shortcode(array('id' => 1, 'title' => false, 'description' => false)); ?>
            </form>
        </div>
    </div>
</section>