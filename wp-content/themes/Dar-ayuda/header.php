<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> <?php if (is_home()) {
            echo bloginfo('name');
            echo ' | ';
            echo 'Inicio ';
          } elseif (is_category()) {
            single_cat_title();
            echo ' | ';
            echo bloginfo('name');
          } elseif (is_single() || is_page()) {
            single_post_title();
            echo ' | ';
            echo bloginfo('name');
          } else {
            wp_title('', true);
            echo ' | ';
            echo bloginfo('name');
          }    ?> </title>
  <?php wp_head(); ?>
  <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" rel="shortcut icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900|Open+Sans:300,400,600,700,800|Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
</head>

<body>
  <header class="fixed-top navbar-fixed-js">
    <div class="pre-navbar">
      <div class="pre-navbar__flex">
        <a class="pre-navbar__btn" href="">Empleados</a>
        <a class="pre-navbar__btn" href="">Empresas</a>
      </div>
      <a class="pre-navbar__btn" href="">Regístrate</a>
    </div>
    <nav class="navbar navbar-expand-lg">
      <div class="main-brand__top">
        <div class="main-brand">
          <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">
            <img alt="Logo Ekored" id="iso" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_2.png">
          </a>
        </div>
      </div>
      <div class="main-brand__fixed">
        <div class="main-brand">
          <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">
            <img alt="Logo Ekored" id="iso" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_2.png">
          </a>
        </div>
      </div>
      <div class="main-brand brand-responsive">
        <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">
          <img alt="Logo Ekored" id="iso" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
        </a>
        <button class="navbar-toggler p-2 border-0 hamburger hamburger--elastic ml-autos" data-toggle="offcanvas" type="button">
          <span class="hamburger-box"></span>
          <span class="hamburger-inner"></span>
        </button>
      </div>
      <div class="navbar-collapse offcanvas-collapse">
        <ul class="navbar-nav mr-autos">
          <li class="nav-item">
            <a class="nav-link nav-link-p" data="offcanvas" href="<?php echo bloginfo('url'); ?>">
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-p" data="offcanvas" href="<?php echo bloginfo('url') . '/index.php/nuestra-empresa'; ?>">
              Nuestra empresa
            </a>
          </li>
          <li class="nav-item dropdown">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">
              Portafolio
            </a>
            <div aria-labelledby="navbarDropdown" class="dropdown-menu">
              <?php $args = array('post_type' => 'Portafolio', 'order' => 'ASC', 'posts_per_page' => -1); ?>
              <?php $loop = new WP_Query($args); ?>
              <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <a class="dropdown-item" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php wp_reset_postdata(); ?>
              <?php endwhile; ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">
              De su interés
            </a>
            <div aria-labelledby="navbarDropdown" class="dropdown-menu">
              <?php $args = array('post_type' => 'De_su_interes', 'order' => 'ASC', 'posts_per_page' => -1); ?>
              <?php $loop = new WP_Query($args); ?>
              <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <a class="dropdown-item" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php wp_reset_postdata(); ?>
              <?php endwhile; ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-p" data="offcanvas" href="<?php echo bloginfo('url') . '/index.php/buscador-de-empleo'; ?>" role="button">
              Buscador de empleo
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-p" data="offcanvas" href="<?php echo bloginfo('url') . '/index.php/blog'; ?>" role="button">
              Blog
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-p" data="offcanvas" href="<?php echo bloginfo('url') . '/index.php/contacto'; ?>">
              Contacto
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>