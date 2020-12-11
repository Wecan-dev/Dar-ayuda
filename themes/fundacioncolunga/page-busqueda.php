<?php

$title = 'Resultados de búsqueda';
if(isset($_POST['search'])){
	$busqueda = $_POST['search'];
}else{
	$busqueda = '';
}

include('header.php');




if($busqueda != ''){

	$fundacion = array(
		'post_type' => 'fundacion',
		's'=> $busqueda,
		'posts_per_page' => -1
	);

	$noticia = array(
		'post_type' => 'noticias',
		's'=> $busqueda,
		'posts_per_page' => -1
	);

	$evento = array(
		'post_type' => 'eventos',
		's'=> $busqueda,
		'posts_per_page' => -1
	);

	$convocatoria = array(
		'post_type' => 'convocatoria',
		's'=> $busqueda,
		'posts_per_page' => -1
	);

	/*$q1 = new WP_Query( array(
    'post_type' => 'fondo',
    'posts_per_page' => -1,
    's' => $busqueda
	));

	$q2 = new WP_Query( array(
	    'post_type' => 'fondo',
	    'posts_per_page' => -1,
	    'meta_query' => array(
	        array(
	           'key' => 'texto_postulaciones',
	           'value' => $busqueda,
	           'compare' => 'LIKE'
	        )
	     )
	));*/



	/*

	$entrada = array(
			'post_type' => 'post',
			's'=> $busqueda,
			'posts_per_page' => -1
		);

	$entradas = new WP_Query($entrada);

	$profesor = array(
			'post_type' => 'profesor',
			's'=> $busqueda,
			'posts_per_page' => -1
		);*/
}else{

	$fundacion = array(
		'post_type' => 'fundacion',
		'posts_per_page' => -1
	);

	$noticia = array(
		'post_type' => 'noticias',
		'posts_per_page' => -1
	);

	$evento = array(
		'post_type' => 'eventos',
		'posts_per_page' => -1
	);

	$convocatoria = array(
		'post_type' => 'convocatoria',
		'posts_per_page' => -1
	);


}

	$fundaciones = new WP_Query($fundacion);
	$eventos = new WP_Query($evento);
	$noticias = new WP_Query($noticia);
	$convocatorias = new WP_Query($convocatoria);
	$total = $fundaciones->post_count+$eventos->post_count+$noticias->post_count+$convocatorias->post_count;


?>

<div class="slide box-align-down first">
	<div class="cont-img-slider">
	  <img src="<?php echo TEMPLATE_URL; ?>/assets/img/slide-nuestra-red.png">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-6 col-sm-10">
	        <div class="slider-txt-content error">
	          <h4 class="line-title title pink">Resultados de búsqueda</h4>
	          <p>
	          </p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>

<section class="busqueda-content">
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div id="sidebar-internal" class="hidden-xs hidden-sm pinned">
				<?php
				if(isset($_POST['search'])){
					?>
					<h3><?php echo $total; ?> Resultados para <?php echo $busqueda; ?></h3>
					<?php
				}
				?>

				<ul>
					<li><a data-scroll href="#fundaciones"><?php echo $fundaciones->post_count; ?> Fundaciones</a></li>
					<li><a data-scroll href="#convocatorias"><?php echo $convocatorias->post_count; ?> Convocatorias</a></li>
					<li><a data-scroll href="#eventos"><?php echo $eventos->post_count; ?> Eventos</a></li>
					<li><a data-scroll href="#noticias"><?php echo $noticias->post_count; ?> Noticias</a></li>
				</ul>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-1">
				<?php
				if(isset($_POST['search'])){
					?>
					<h1>Se han encontrado <?php echo $total; ?> coincidencias para <?php echo $busqueda; ?></h1>
					<?php
				}else{
					?>
					<h1>Todos los resultados disponibles</h1>
					<?php
				}

				?>

				<div class="result-list" id="fundaciones">
					<h2 class="title-busqueda line-title green">Fundaciones</h2>
					<div class="resultados">
						<ul>
							<?php
							if($fundaciones->have_posts())
						     {
						          while($fundaciones->have_posts())
						          {
						               $fundaciones->next_post();
						               $titulo = $fundaciones->post->post_title;
						               $content = $fundaciones->post->post_content;
						               $id = $fundaciones->post->ID;
						               ?>
						               <li>
											<h3><a href="<?php echo get_permalink($id); ?>"><?php echo $titulo; ?></a></h3>
										</li>
						               <?php
						            }
					       	 }
					       	 else
					       	 {
					       	 	?>
					       	 	<p>Sin resultados</p>
					       	 	<?php
					       	 }
							?>

						</ul>
					</div>
				</div>

				<div class="result-list" id="convocatorias">
					<h2 class="title-busqueda line-title green">Convocatorias</h2>
					<div class="resultados">
						<ul>
							<?php
							if($convocatorias->have_posts())
						     {
						          while($convocatorias->have_posts())
						          {
						               $convocatorias->next_post();
						               $titulo = $convocatorias->post->post_title;
						               $id = $convocatorias->post->ID;
						               ?>
						               <li>
											<h3><a href="<?php echo get_permalink($id); ?>"><?php echo $titulo; ?></a></h3>
										</li>
						               <?php
						            }
					       	 }
					       	 else
					       	 {
						       ?>
						       	 <p>Sin resultados</p>
						       	<?php

					       	 }
							?>

						</ul>

					</div>
				</div>

				<div class="result-list" id="eventos">
					<h2 class="title-busqueda line-title green">Eventos</h2>
					<div class="resultados">
						<ul>
							<?php
							if($eventos->have_posts())
						     {
						          while($eventos->have_posts())
						          {
						               $eventos->next_post();
						               $titulo = $eventos->post->post_title;
						               $content = $eventos->post->post_content;
						               $id = $eventos->post->ID;
						               ?>
						               <li>
											<h3><a href="<?php echo get_permalink($id); ?>"><?php echo $titulo; ?></a></h3>
										</li>
						               <?php
						            }
					       	 }
					       	 else
					       	 {
						       ?>
						       	 <p>Sin resultados</p>
						       	<?php

					       	 }
							?>

						</ul>
					</div>
				</div>

				<div class="result-list" id="noticias">
					<h2 class="title-busqueda line-title green">Noticias</h2>
					<div class="resultados">
						<ul>
							<?php
							if($noticias->have_posts())
						     {
						          while($noticias->have_posts())
						          {
						               $noticias->next_post();
						               $titulo = $noticias->post->post_title;
						               $id = $noticias->post->ID;
						               ?>
						               <li>
											<h3><a href="<?php echo get_permalink($id); ?>"><?php echo $titulo; ?></a></h3>
										</li>
						               <?php
						            }
					       	 }
					       	 else
					       	 {
						       ?>
						       	 <p>Sin resultados</p>
						       	<?php

					       	 }
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>






<?php include('footer.php'); ?>
