<?php
/*
Template Name: Page Template - Sin Violencia
*/

$current = 'sin-violencia';
$title = get_the_title();
$imagen_destacada = get_field('imagen_destacada');
$texto_imagen = get_field('texto_imagen');
$texto_iniciativa = get_field('texto_final');
$link_final = get_field('link_final');
$imagen_iniciativa = get_field('imagen_iniciativa', 'option');
$foto_final = get_field('foto_final');

$mostrar_formulario = get_field('mostrar_formulario');

include('header.php');
$preguntas_frecuentes = get_field('preguntas_frecuentes');
$videos = get_field('videos');
$archivos = get_field('archivos_de_interes');

?>
  <style>
    .contenido.row {
      padding-top: 5vh;
      padding-bottom: 3vh;
      background: #f7f7f7;
      display:flex;
    }
    .contenido div{
      max-width: 970px;
      margin: 0 auto;
    }

    .titulo{
      padding-bottom: 0px;
    }

    .titulo h2{
      font-size: 24px;
      font-weight: 600 !important;
      position:relative;
    }

    .titulo h2:before{
      display: block;
      position: absolute;
      top: -22px;
      left: 0px;
      background:#369158;
      width:30px;
      height: 5px;
      content:"";
    }

    #contenido-sv-tit{
      padding-bottom: 10px;
      padding-top: 80px;
    }

    #contenido-sv-tit h1{
      font-weight: 600;
    }

    #contenido-sv{
      background: #f7f7f7;
    }

    #contenido-sv p{
      font-size: 18px;
    }

    #preguntas_frecuentes{
      background: #fff;
    }

    #preguntas_frecuentes .card{
      background: #ffffff;
    }

    #faqsv .circle-green-content{
      color: #000;
      border: 5px solid #369158;
    }

    #faqsv h3.title{
      font-size: 20px;
    }

    input.wpcf7-form-control.wpcf7-submit{

      text-decoration: none;
      cursor: pointer;
      font-size: 18px;
      transition: all 0.3s ease-out;
      -webkit-transition: all 0.3s ease-out;
      -o-transition: all 0.3s ease-out;
      -moz-transition: all 0.3s ease-out;
      -ms-transition: all 0.3s ease-out;
      outline: none;
      display: inline-block;
      padding: 6px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 400;
      line-height: 1.42857143;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -ms-touch-action: manipulation;
      touch-action: manipulation;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-image: none;
      border: 1px solid transparent;
      border-radius: 4px;
      color: #ffffff;
      background-color: #369158;
      font-size: 18px;
      border-radius: 0;
      transition: all 0.3s ease-out;
      -webkit-transition: all 0.3s ease-out;
      -moz-transition: all 0.3s ease-out;
      -ms-transition: all 0.3s ease-out;
      -o-transition: all 0.3s ease-out;
      white-space: normal;
      padding: 15px 40px;
      outline: none;
      margin-top:10px;
    }

    input.wpcf7-form-control.wpcf7-submit:hover{
      outline: 0;
      text-decoration: none;
      color: #ffffff;
      background-color: #54B277;
    }

    .titulo-sin{
      margin-top: 15px;
      margin-bottom: 20px;
      font-weight: 600px;
    }

    .wpcf7-form-control.wpcf7-text.wpcf7-email.wpcf7-validates-as-required.wpcf7-validates-as-email, .wpcf7-form-control.wpcf7-textarea.wpcf7-validates-as-required, .wpcf7-form-control.wpcf7-select.wpcf7-validates-as-required{
      width: 600px;
      max-width: 92vw;
      background: #fff;
    }

    label{
      font-family: 'Catamaran', sans-serif !important;
      font-size: 16px !important;
      background-color: #FFFFFF !important;
      color: #32423B !important;
      font-weight: 200 !important;
    }

    .form-sv .textos{
      font-size: 18px !important;
      margin-bottom: 24px;
    }

    .form-sv .textos.explicacion{
      /*font-size: 16px !important;*/
    }

    .classemail-sv input, .classmsng-sv textarea, .menu-laboralointrafamiliar select{
      border: 1px solid #505050;
      -webkit-appearance: none;
      -webkit-border-radius: 0px;
      padding-left: 5px;
    }

    .menu-laboralointrafamiliar select{
      height: 29px;

    }
    .imagen-contenido-sin-violencia p{
      padding-bottom: 4px;
    }

    .imagen-contenido-sin-violencia h2 span strong a{
      font-size: 28px;
    }

    .imagen-contenido-sin-violencia h3 span strong a{
      font-size: 24px;
    }

    .imagen-contenido-sin-violencia h4 span strong a{
      font-size: 22px;
    }

    @media (max-width: 767px) {
      .imagen-contenido-sv{
        width: 100%;
        height: auto;
        margin-bottom: 15px;
      }

      .imagen-contenido-sin-violencia p img{
        width: 100%;
        height: auto;
        margin-bottom: 15px;
      }

      img.min768{
        display:none;
      }

      img.max768{
        display: block;
      }

      .info-img{
        position: absolute;
        top: 0;
      }

      .info-img .slider-txt-content.resize{
        background: transparent;
      }
    }
    @media (min-width: 768px) {
      img.min768{
        display:block;
      }

      img.max768{
        display: none;
      }
    }

  </style>

  <div class="slide box-align-down first">
    <div class="cont-img-slider">
      <?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>
      <img src="<?php echo $url_imagen_destacada; ?>">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-10">
            <?php if($texto_imagen): ?>
            <div class="slider-txt-content">
              <h4 class="line-title title green"><?php echo $texto_imagen; ?></h4>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- contenido inicial -->
  <section id="contenido-sv-tit">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1><?php echo $title; ?></h1>
        </div>
      </div>
    </div>
  </section>
  <section id="contenido-sv">
    <div class="container-fluid">
      <div class="row contenido">
        <div class="col-md-12 text-center imagen-contenido-sin-violencia">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
  <!-- fin contenido inicial -->

<?php if($mostrar_formulario == 'Si'){ ?>
  <!-- formulario -->
  <section class="titulo">
 <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Formulario de contacto</h2>
    </div>
  </div>
</div>
</section>
  <section class="formulario">
    <div class="container">
      <div class="row">
          <div id="consulta" class="col-xs-12">
            <?php echo do_shortcode( '[contact-form-7 id="8331" title="Sin Violencia Consulta Denuncia"]' ); ?>
          </div>
      </div>
    </div>
  </section>
  <!-- fin formulario -->
<?php } ?>


  <!-- videos -->
  <section class="titulo">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Videos</h2>
      </div>
    </div>
  </div>
  </section>
    <section class="videos">
    <div class="container">    
    <?php foreach ($videos as $index => $video): ?>
    <div class="row">
      <div class="col-xs-12 col-md-6">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$video["video"];?>" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <div class="col-xs-12 col-md-6">
        <!--<h4 class="light-green"><?=$video["categoria"];?></h4>-->
        <h3 class="titulo-sin"><?=$video["titulo"];?></h3>
        <p><?=$video["texto_video"];?></p>
      </div>
    </div>

    <?php endforeach; ?>
  </div>
  </section>
  <!-- fin videos -->

  <!-- archivos de interes -->
  <section class="titulo">
 <div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2>Archivos de interés</h2>
    </div>
  </div>
</div>
</section>
  <section id="faqsv">
   <div class="container">
     <div class="row mt-30">
       <div class="col-md-12">
         <ul id="page-content" class="archivos-list">
         <?php foreach ($archivos as $index => $archivo): ?>
          <li class="">
            <div class="circle-green-content -pdf">
              <?php 
                if($archivo["archivo"]!=""){
                  echo "PDF";
                }
                if($archivo["link"]!=""){
                  echo "URL";
                }
              ?>
            </div>
            <div class="txt-content -pdf">
              <h3 class="title"><?=$archivo["nombre"];?></h3>
              <?php if($archivo["archivo"]!=""){?>
              <a target="_blank" href="<?=$archivo["archivo"];?>" class="btn btn-xs btn-grey">Visitar</a>
                <?php } ?>
                <?php if($archivo["link"]!=""){?>
              <a target="_blank" href="<?=$archivo["link"];?>" class="btn btn-xs btn-grey">Visitar</a>
                <?php } ?>
            </div>
          </li>
          <?php endforeach; ?>
         </ul>
       </div>
     </div>
   </div>
  </section>
<!-- fin archivos de interes -->




  <!-- preguntas frecuentes -->
  <section class="titulo">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Preguntas frecuentes</h2>
        </div>
      </div>
    </div>
  </section>
  <section id="preguntas_frecuentes">
    <div class="container-fluid">
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
  <!-- fin preguntas frecuentes -->

<!-- foto final -->
  <div class="slide box-align-up">
    <div class="cont-img-slider">
      <img class="min768" src="<?php echo $foto_final["sizes"]["w1600prefooter"]; ?>">
      <img class="max768" src="<?php echo $foto_final['url']; ?>">
      <div class="container info-img">
        <div class="row">
          <div class="col-md-6 col-xs-10">
            <div class="slider-txt-content resize">
              <h1 class="line-title pink"><?php echo $texto_iniciativa; ?></h1>
              <a href="<?php echo $link_final; ?>" target="_blank" class="btn btn-light-green btn-md">Conoce más de Colunga HUB</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- fin foto final -->


<?php include('footer.php'); ?>
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