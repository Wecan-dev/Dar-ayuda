<?php
/*
Template Name: Page Template - Página para Tests
*/

$current = 'archivos-de-transparencia';
$title = get_the_title();


$imagen_destacada = get_field('imagen_destacada');
$texto_imagen = get_field('texto_imagen');
$texto_iniciativa = get_field('texto_iniciativa', 'option');
$imagen_iniciativa = get_field('imagen_iniciativa', 'option');

include('header.php');

?>
<style media="screen">
#collapse-menu .menu-header-container .menu-item-has-children,
#collapse-menu .menu-header-container li{
  width: 50%;
  float: left;
}
#collapse-menu .menu-header-container li a{
  min-height: 75px;
  display: block;
}
#collapse-menu .menu-header-container .menu-item-has-children ul{
  margin-top: 0;
}
#collapse-menu .menu-header-container .menu-item-has-children li{
  width: 100%;
}
#collapse-menu .menu-header-container .menu-item-has-children li a{
  font-size: 18px;
  color: rgba(255,255,255,.7);
  font-weight: 300;
  min-height: 30px;
}
#collapse-menu .menu-header-container ul{
  width: 100%!important;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
#collapse-menu .menu-header-container ul li{
  margin-bottom: 0;
}
#collapse-menu .menu-header-container li a{
  font-size: 24px;
  margin-bottom: 0!important;
  font-weight: 500;
  color: #ffffff;
}
.clear-ul,
.clear-ul li{
  padding: 0!important;
  margin: 0!important;
}
</style>
<h1>Menú de tests</h1>
<h1>Menú de tests</h1>
<h1>Menú de tests</h1>
<h1>Menú de tests</h1>
<h1>Menú de tests</h1>
<h1>Menú de tests</h1>
<h1>Menú de tests</h1>


<!-- inicio nuevo header -->

<header>
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
      <ul class="nav visible-xs">
        <li class="pull-right"><span class="d-inline-b m-mobile-txt show-menu">Ver Menú</span><i class="fa fa-bars menu-icon show-menu"  aria-hidden="true"></i></li>
      </ul>
    </div>
  </div>
</div>
</header>
<!-- fin nuevo header -->

<!-- inico menu mobile -->
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
<!-- fin menu mobile -->


<?php include('footer.php'); ?>
