<?php
    include('header.php');
    $preguntas_frecuentes = get_field('preguntas_frecuentes');
?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
?>
<section class="noticias-stage questions np-bottom">
          <div class="noticias-stage-bg" style="background-image: url(<?=get_template_directory_uri(); ?>/assets/img/fondo_preguntas_frecuentes.png);"></div>
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="text-right mt-5 c-white">&nbsp;</h1>
              </div>
            </div>
          </div>
</section>

<section class="questions_content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="text-center"><?=the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>

<section id="preguntas_frecuentes">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <h3 class="title line-title green mb-7"><?=the_content(); ?></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div id="accordion">
            <?php foreach ($preguntas_frecuentes as $index => $preguntas_frecuente): ?>
              <div class="card">
                <div class="card-header" id="<?=$index ?>">
                  <h5 class="mb-0 text-left">
                    <button class="btn btn-link w-100 text-left collapsed" data-toggle="collapse" data-target="#collapse<?=$index ?>" aria-expanded="false" aria-controls="collapse<?=$index ?>">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                      <?=$preguntas_frecuente["titulo"];?>
                    </button>
                  </h5>
                </div>

                <div id="collapse<?=$index ?>" class="show collapse" aria-labelledby="heading<?=$index ?>" data-parent="#accordion" aria-expanded="false" style="height: 0px;">
                  <div class="card-body">
                    <?=$preguntas_frecuente["texto"];?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
endwhile;
else:
?>

<?php
endif;
?>




<?php
  include('footer.php');
?>

<script type="text/javascript">
  $(window).load(function(){
    height = $('#calc_height a').children('div[class^="col-"]:first-child').height();
    $('#calc_height a').children('div[class^="col-"]:last-child').css('height', height+'px');
    console.log(height);
  });

  $('#preguntas_frecuentes .card-header .btn').click(function(e){
    $(this).find('.fa.fa-plus').toggleClass('fa-collapsed');
  });
</script>
