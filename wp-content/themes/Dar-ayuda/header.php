<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta name="keywords" content="empleo, vacantes, dar ayuda, dar, temporal, temporales, trabajo, ofertas de empleo, empleos temporales, trabajo temporal, operario, mensajero, bodega, cajero, conductor, secretaria, auxiliar"/>
	<meta name="description" content="Dar Ayuda Temporal S.A. es una compañía con una trayectoria de más de 40 años, dedicada a seleccionar y contratar trabajadores en misión, al servicio de empresas usarías."/>
	
  <title> <?php if (is_home()) {
                       echo 'Inicio ';

            echo ' | ';
	 echo bloginfo('name');
          } elseif (is_category()) {
            single_cat_title();
            echo ' | ';
            echo bloginfo('name');
          } elseif (is_single() || is_page()) {
            echo bloginfo('name');
         
            echo ' | ';
   single_post_title();         
} else {
	      echo bloginfo('name');
           
            echo ' | ';
       wp_title('', true);
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
<style>
	.portfolio-general .general-description {
    margin-bottom: 27px;
    text-align: center;
}
	
	body > section.portfolio-general > div > div.container-grid > div.portfolio-general__content > div > ul > li:nth-child(11):before{
		content: none;
	}
	
	body > section.interest-general.about-history > div > div > div.interest-text > .about-politics__list{
		text-align: justify;
	}
	.main-portfolio__item {
    
    height: auto;

}
	
* {box-sizing: border-box;}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

ul li {
  line-height: 35px;
				font-size: .8em;
				display: inline-block;
	
}
	.fixed .marquesina{
		display: none;
	}

.marquesina {
  height: 35px;
  overflow: hidden;
  padding: 0 1em;
	
    background: #1c3348;
    border-bottom: 1px solid rgb(255 255 255 / 46%);

}

.colgado {
  text-transform: uppercase; 
  font-size: 14px;
  color: white;
font-weight: 600;
					display: inline;
}

a {
					text-decoration: none;
					display: inline;
}

li:after {
  content: url(http://cero.lared21.com/wp-content/themes/lared21/images/arr.gif);
  padding: 0 1em;
}	
	.none-marquesina{
		opacity:0;
	}
	
	</style>
<body>
  <header class="fixed-top navbar-fixed-js">
	  	<div class="marquesina">
				<ul>
          <li><span class="colgado">Salario Mínimo Mensual: $ 908,526.00</span><span class="none-marquesina">loremloremwertyuioiuytrewertyui</span></li>
          <li><span class="colgado">Salario por día: $ 30,284.20</span><span class="none-marquesina">loremloremwertyuioiuytrewertyui</span></li>
          <li><span class="colgado">Auxilio de transporte: $ 106,454</span><span class="none-marquesina">loremloremwertyuioiuytrewertyui</span></li>
          <li><span class="colgado">Tasa de desempleo: 14,2%</span><span class="none-marquesina">loremloremwertyuioiuytrewertyui</span></li>
          <li><span class="colgado">UVT: $36.308</span><span class="none-marquesina">loremloremwertyuioiuytrewertyui</span></li>
          
        </ul>			
  </div>
    <div class="pre-navbar">
		
      <div class="pre-navbar__flex">
        <a target="_blank" class="pre-navbar__btn" href="http://190.7.156.170:5443/NGMidasoft/login/01">Empleados</a>
        <a target="_blank" class="pre-navbar__btn" data-toggle="modal" data-target="#exampleModal" href="#">Empresas</a>
      </div>
		
		
		<div class="pre-navbar__flex">
      <a target="_blank" class="pre-navbar__btn" href="http://190.7.156.170:5443/NGms/categoriasvacantes">Consulta vacantes</a>
		  <a target="_blank" class="pre-navbar__btn" href="http://190.7.156.170:5443/NGms/categoriasvacantes">Ingresa hoja de vida</a>
		
		   </div>
		
    </div>
    <nav class="navbar navbar-expand-lg">
      <div class="main-brand__top">
        <div class="main-brand">
          <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">
            <img alt="Logo Dar ayuda" id="iso" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_2.png">
          </a>
        </div>
      </div>
      <div class="main-brand__fixed">
        <div class="main-brand">
          <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">
            <img alt="" id="iso" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_2.png">
          </a>
        </div>
      </div>
      <div class="main-brand brand-responsive">
        <a class="navbar-brand" href="<?php echo bloginfo('url'); ?>">
          <img alt="" id="iso" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
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
			   <li class="nav-item">
            <a class="nav-link nav-link-p" data="offcanvas" href="<?php echo bloginfo('url') . '/index.php/buscador-de-empleo'; ?>" role="button">
              Buscador de empleo
            </a>
          </li>
         <li class="nav-item ">
            <a aria-expanded="false" aria-haspopup="true" class="nav-link" href="<?php echo bloginfo('url');?>/de_su_interes/nueva-actualidad/" >
              Actualidad Laboral
            </a>
            
          </li>
       
          <!--<li class="nav-item">
            <a class="nav-link nav-link-p" data="offcanvas" href="<?php echo bloginfo('url') . '/index.php/blog'; ?>" role="button">
              Blog
            </a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link nav-link-p" data="offcanvas" href="<?php echo bloginfo('url') . '/index.php/contacto'; ?>">
              Contacto
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
