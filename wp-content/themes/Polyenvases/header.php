<!DOCTYPE html>
<html lang="es">
<head>
<?php wp_head(); ?>
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
			}		?> </title>
	<!-- <title>Polyenvases S, A. Fabricantes de botellas plásticas</title> -->
	<META NAME="Title" CONTENT="Polyenvases S, A. Fabricantes de botellas plásticas">
	<META NAME="Description"
		CONTENT="Polyenvases S, A. Fabricantes de botellas plásticas, Fábrica de envases plásticos fabricados en PVC, PET y Poliuretano.">
	<META NAME="Keywords" CONTENT="Polyenvases S, A. Fabricantes de botellas plásticas">
	<META NAME="Language" CONTENT="Spanish">
	<META NAME="Revisit" CONTENT="1 day">
	<META NAME="Distribution" CONTENT="Global">
	<META NAME="Robots" CONTENT="All">
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/icon.png" type="image/png" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/flaticon.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
</head>
<body>
	<div class="fix"> 
		<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-8 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2 row">
								<a href="tel:5072296330" class="mr-2"><span class="fa fa-phone mr-1"></span> 507 + 229-6330 / 229-6335</a>
								<a href="mailto:info@polyenvases.com"><span class="fa fa-paper-plane mr-1"></span>info@polyenvases.com</a>
								<a target="_blank" href="https://www.instagram.com/polyenvases85/"><span style="margin: 0px 5px;" class="fa fa-instagram"></span>Polyenvases85</a>
						</p>
					</div>
					<!-- <div class="col-md-6 d-flex justify-content-md-end">
						<div class="social-media">
							<p class="mb-0 d-flex">
								<a target="_blank" href="https://www.instagram.com/polyenvases85/" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
							</p>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
				<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="logo" alt="<?php bloginfo('name'); ?>">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
					aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span> 
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item item-nav"><a href="<?php echo bloginfo('url').'/#';?>" class="nav-link">Inicio</a></li>
						<li class="nav-item item-nav"><a href="<?php echo bloginfo('url').'/#services';?>" class="nav-link">Servicios</a></li>
						<li class="dropdown nav-item">
							<a class="dropdown-toggle nav-link" type="button" id="menu1" data-toggle="dropdown">
								Áreas
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/cosmeticos';?>">Cósmeticos</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/quimicos';?>">Químicos</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/lubricantes';?>">Lubricantes</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/limpieza';?>">Limpieza</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/alimentos';?>">Alimentos</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/escolares';?>">Escolares</a>
								</li>

							</ul>
						</li>
						<li class="nav-item item-nav"><a href="<?php echo bloginfo('url').'/#about';?>" class="nav-link">Quienes somos</a></li>
						<li class="nav-item item-nav"><a href="<?php echo bloginfo('url').'/index.php/envases';?>" class="nav-link">Envases</a></li>
						<li class="nav-item item-nav"><a href="#contact" class="nav-link">Contacto</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<nav class="navbar dis-nav navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
				<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="logo" alt="<?php bloginfo('name'); ?>">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
					aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span>
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item item-nav"><a href="<?php echo bloginfo('url').'/#';?>" class="nav-link">Inicio</a></li>
						<li class="nav-item item-nav"><a href="<?php echo bloginfo('url').'/#services';?>" class="nav-link">Servicios</a></li>
						<li class="dropdown nav-item">
							<a class="dropdown-toggle nav-link" type="button" id="menu1" data-toggle="dropdown">
								Áreas
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/cosmeticos';?>">Cósmeticos</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/quimicos';?>">Químicos</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/lubricantes';?>">Lubricantes</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/limpieza';?>">Limpieza</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/alimentos';?>">Alimentos</a>
								</li>
								<li role="presentation">
									<a role="menuitem" href="<?php echo bloginfo('url').'/index.php/category/escolares';?>">Escolares</a>
								</li>

							</ul>
						</li>
						<li class="nav-item item-nav"><a href="<?php echo bloginfo('url').'/#about';?>" class="nav-link">Quienes somos</a></li>
						<li class="nav-item item-nav"><a href="<?php echo bloginfo('url').'/index.php/envases';?>" class="nav-link">Envases</a></li>
						<li class="nav-item item-nav"><a href="#contact" class="nav-link">Contacto</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>