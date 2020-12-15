<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    wp_head();
    if($title == 'Inicio'){
    $titulo_pagina = $siteName;
    } else{
      $titulo_pagina = $title.$siteName;
    }
    $facebook = get_field('facebook', 'option');
    $twitter = get_field('twitter', 'option');
    $youtube = get_field('youtube', 'option');
    $flickr = get_field('flickr', 'option');
	$linkedin = get_field('linkedin', 'option');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="author" content="Ilógica - www.ilogica.cl"/>
    <title><?php echo $titulo_pagina; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Catamaran:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo TEMPLATE_URL; ?>/assets/img/favicon.png"/>
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/assets/css/sources.css?v=1.1.1">
    <link rel="stylesheet" href="<?php echo TEMPLATE_URL; ?>/assets/css/style.css?v=1.1.7">
    <!-- js -->
    <script src="<?php echo TEMPLATE_URL; ?>/assets/js/sources.js?v=1.1.1"></script>
    <script src="<?php echo TEMPLATE_URL; ?>/assets/js/javascript.js?v=1.1.1"></script>
    <script src="<?php echo TEMPLATE_URL; ?>/assets/js/functions.js?v=1.1.2"></script>
    <script type="text/javascript">
      SITE_URL = '<?php echo get_bloginfo('url'); ?>';
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-N4DWZXZ');</script>
    <!-- End Google Tag Manager -->

  </head>


  <body<?php if(is_front_page())echo ' class="page-home"'; ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N4DWZXZ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-89426504-1', 'auto');
      ga('send', 'pageview');
    </script>
    <header>
      <div class="container-fluid">
        <!-- inicio header buscar -->
        <div class="row top-header">
          <div class="col-lg-10 col-lg-offset-1">
            <div class="row">
              <div class="col-lg-6 col-xs-12 hidden-md hidden-sm hidden-xs">
                <form class="form-search" action="<?php echo get_bloginfo('url'); ?>/busqueda" method="POST">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Buscar" name="search">
                  </div>
                </form>
              </div>
              <div class="col-lg-6 col-xs-12 v-align block-mobile links-justify-content no-padding-mobile">

                <div class="links hidden-md hidden-sm hidden-xs">
                  <a href="<?php echo SITE_URL; ?>/preguntas-frecuentes">
                    Preguntas frecuentes
                  </a>             
                </div>
                <div class="socials desk">
					 <a target="_blank" href="<?php echo $flickr; ?>" class="flickr">
                    <i class="fa fa-flickr" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="<?php echo $facebook; ?>" class="facebook">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="<?php echo $twitter; ?>" class="twitter">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="https://www.instagram.com/fundacioncolunga/" class="instagram">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="<?php echo $youtube; ?>" class="youtube">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                  </a>
					  <a target="_blank" href="<?php echo $linkedin; ?>" class="linkedin">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="only-desktop">
                  <?php echo do_shortcode("[language-switcher]"); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- fin header buscar -->
      </div>
      <div class="subheader">
        <div class="container">
          <div class="row">
            <div class="col-xs-3 col-md-2 col-sm-2 logo-header">
              <div class="colunga-logo transition">
                <a href="<?php echo SITE_URL; ?>">
                  <img class="img-logo" src="<?php echo TEMPLATE_URL; ?>/assets/img/logo-colunga.png" alt="logo colunga">
                </a>
              </div>
            </div>
            <div class="col-md-offset-0 col-xs-9 col-sm-10 col-md-12 text-right">
              <?php
              $languaje_switch = "<div class='only-tablet'>".do_shortcode("[language-switcher]")."</div>";
              wp_nav_menu( array(
                'theme_location' => 'header-menu',
                'menu_class' => 'nav hidden-xs text-left dblock',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $languaje_switch
               ) );
              ?>
            </div>
              <!-- <ul class="nav hidden-xs text-left dblock dipad">
                <li class="d-none"><a href="index.php"></a></li>
                <li><h6>Lineas de acción:</h6></li>
                <li><a href="<?php echo SITE_URL; ?>/lineas-de-accion/desarrollosocial/">FIS</a></li>
                <li><a target="_blank" href="http://www.colungahub.org">HUB</a></li>
                <li><a href="<?php echo SITE_URL; ?>/lineas-de-accion/colungalab/">LAB</a></li>
              </ul> -->
              <ul class="nav visible-xs">
                <li class="pull-right"><span class="d-inline-b m-mobile-txt show-menu">Ver Menú</span><i class="fa fa-bars menu-icon show-menu"  aria-hidden="true"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="subheader">
        <div class="container">
          <div class="row">
            <div class="col-md-offset-4 col-xs-9 col-sm-9 col-md-8 text-right">
              <ul class="nav hidden-xs text-left dblock dblock">
                <li class="d-none"><a href="index.php"></a></li>
                <li><h6>Lineas de acción:</h6></li>
                <li><a href="<?php echo SITE_URL; ?>/lineas-de-accion/desarrollosocial/">FIS</a></li>
                <li><a target="_blank" href="http://www.colungahub.org">HUB</a></li>
                <li><a href="<?php echo SITE_URL; ?>/lineas-de-accion/colungalab/">LAB</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->
    </header>

    <div class="fixed" id="collapse-menu">
      <div class="btn bg-black btn-md pull-right btn-closet transition">cerrar <img src="<?php echo TEMPLATE_URL; ?>/assets/img/x.png" height="13" width="13" alt="cerrar"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <ul class="clear-ul">
              <li>
                <a href="/">Inicio</a>
              </li>
            </ul>
            <?php
            $custom_items = '
              <li><a href="<?php echo SITE_URL; ?>/preguntas-frecuentes">Preguntas frecuentes</a> </li>
              <li><a target="_blank" href="<?php echo $flickr; ?>">Galeria</a> </li>
            ';
            wp_nav_menu( array(
              'theme_location' => 'header-menu',
              'menu_class' => '',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $custom_items
             ) );
            ?>
            <!--<ul class="list-dest">
              <li class="menu-hub"><a href="http://www.colungahub.org">Conoce ColungaHUB <img class="arrow" src="<?php //echo TEMPLATE_URL; ?>/assets/img/arrow-header.png" alt=""></a></li>
            </ul>-->
            <ul class="list-filtro">
              <li class="filtro">
                <form action="<?php echo get_bloginfo('url'); ?>/busqueda" method="POST">
                  <input type="text" class="form-control search -bg-transparent" placeholder="Buscar" name="search" />
                </form>
              </li>
            </ul>
            <ul class="ul-social">
              <li>
                <div class="socials">
                  <a target="_blank" href="<?php echo $facebook; ?>" class="facebook">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="<?php echo $twitter; ?>" class="twitter">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="https://www.instagram.com/fundacioncolunga/" class="instagram">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="<?php echo $youtube; ?>" class="youtube">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                  </a>
                </div>
              </li>
            </ul>
            <div class="only-mobile menu">
              <?php echo do_shortcode("[language-switcher]"); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
