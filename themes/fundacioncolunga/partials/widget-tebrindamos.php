<?php

$te_brindamos_titulo = get_field('te_brindamos_titulo', 'option');
$te_brindamos_subtitulo = get_field('te_brindamos_subtitulo', 'option');

$bloque_fis_imagen = get_field('bloque_fis_imagen', 'option');
$bloque_fis_descripcion = get_field('bloque_fis_descripcion', 'option');
$bloque_fis_label = get_field('bloque_fis_label', 'option');
$bloque_fis_link = get_field('bloque_fis_link', 'option');
$bloque_fis_mostrar = get_field('bloque_fis_mostrar', 'option');

$bloque_colungahub_imagen = get_field('bloque_colungahub_imagen', 'option');
$bloque_colungahub_descripcion = get_field('bloque_colungahub_descripcion', 'option');
$bloque_colungahub_label = get_field('bloque_colungahub_label', 'option');
$bloque_colungahub_link = get_field('bloque_colungahub_link', 'option');
$bloque_colungahub_mostrar = get_field('bloque_colungahub_mostrar', 'option');

$bloque_colungalab_imagen = get_field('bloque_colungalab_imagen', 'option');
$bloque_colungalab_descripcion = get_field('bloque_colungalab_descripcion', 'option');
$bloque_colungalab_label = get_field('bloque_colungalab_label', 'option');
$bloque_colungalab_link = get_field('bloque_colungalab_link', 'option');
$bloque_colungalab_mostrar = get_field('bloque_colungalab_mostrar', 'option');

?>


<section class="proyectos">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center"><?php echo $te_brindamos_titulo; ?></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2 class="proyectos__sub-title"><?php echo $te_brindamos_subtitulo; ?></h2>
      </div>
    </div>
    <div class="row d-flex justify-content-center">
      <!-- FIS -->
      <?php
      if($bloque_fis_mostrar == "si"){
        ?>
        <div class="col-md-4">
          <div class="box-proyecto">
            <a href="<?=$bloque_fis_link;?>" class="no-style">
              <img class="box-proyecto__img" src="<?php echo $bloque_fis_imagen['sizes']['w500']; ?>" alt="<?php echo $bloque_fis_imagen['alt']; ?>">
            </a>
            <p class="box-proyecto__text">
              <?php echo strip_tags($bloque_fis_descripcion); ?>
            </p>
            <a href="<?=$bloque_fis_link;?>" class="btn btn-green"><?=$bloque_fis_label;?></a>
          </div>
        </div>
        <?php
      }
      ?>

      <!-- HUB -->
      <?php
      if($bloque_colungahub_mostrar == "si"){
        ?>
        <div class="col-md-4">
          <div class="box-proyecto">
            <a href="<?=$bloque_colungahub_link;?>" class="no-style">
              <img class="box-proyecto__img" src="<?php echo $bloque_colungahub_imagen['sizes']['w500']; ?>" alt="<?php echo $bloque_colungahub_imagen['alt']; ?>">
            </a>
            <p class="box-proyecto__text">
              <?php echo strip_tags($bloque_colungahub_descripcion); ?>
            </p>
            <a href="<?=$bloque_colungahub_link;?>" class="btn btn-green"><?=$bloque_colungahub_label;?></a>
          </div>
        </div>
        <?php
      }
      ?>

      <!-- LAB -->
      <?php
      if($bloque_colungalab_mostrar == "si"){
        ?>
        <div class="col-md-4">
          <div class="box-proyecto">
            <a href="<?=$bloque_colungalab_link;?>" class="no-style">
              <img class="box-proyecto__img" src="<?php echo $bloque_colungalab_imagen['sizes']['w500']; ?>" alt="<?php echo $bloque_colungalab_imagen['alt']; ?>">
            </a>
            <p class="box-proyecto__text">
              <?php echo strip_tags($bloque_colungalab_descripcion); ?>
            </p>
            <a href="<?=$bloque_colungalab_link;?>" class="btn btn-green"><?=$bloque_colungalab_label;?></a>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</section>
