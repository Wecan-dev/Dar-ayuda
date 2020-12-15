<?php
/*
Template Name: Page Template - Convocatorias
*/

$current = 'convocatorias';
$title = get_the_title();
$slides = get_field('slider_imagenes');

include('header.php');

?>

<?php if($slides): ?>
  <div class="slider-wrapper">
    <div class="slide-custom-arrows">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="slide-custom-arrows-block">
              <div class="slide-custom-arrow prev"></div>
              <div class="slide-custom-arrow next"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="slide first">
      <?php foreach($slides as $slide): ?>
          <div class="cont-img-slider">
            <img src="<?php echo $slide['imagen']['sizes']['w1600']; ?>">
            <?php if($slide['texto']): ?>
            <div class="container">
              <div class="row">
                <div class="col-md-5 col-sm-7">
                  <div class="slider-txt-content">
                    <h4 class="title line-title green"><?php echo $slide['texto']; ?></h4>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>

<div id="convocatoria-stage">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>
					<?php echo $title; ?>
				</h2>
			</div>
		</div>
	</div>
</div>

<?php
	$args_ca = array(
		'post_type' => 'convocatoria',
		'meta_query'	=> array(
			array(
				'key'	  	=> 'postulaciones_abiertas',
				'value'	  	=> '1',
				'compare' 	=> '=',
			),
		),
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page' => -1
	);
  $convocatorias_abiertas = new WP_Query($args_ca);
  $cantidad_convocatorias_abiertas = $convocatorias_abiertas->post_count;

?>

<?php
	$args_cc = array(
		'post_type' => 'convocatoria',
		'meta_query'	=> array(
			array(
				'key'	  	=> 'postulaciones_abiertas',
				'value'	  	=> '0',
				'compare' 	=> '=',
			),
		),
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page' => -1
	);
  $convocatorias_cerradas = new WP_Query($args_cc);
  $cantidad_convocatorias_cerradas = $convocatorias_cerradas->post_count;

?>

	<div id="convocatorias-tab">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul>
						<li>
							<a id="tab-abiertas" href="" class="active" data-convocatoria="abiertas">
								Convocatorias abiertas (<?php echo $cantidad_convocatorias_abiertas; ?>)
							</a>
						</li>
						<li>
							<a id="tab-cerradas" href="" data-convocatoria="cerradas">
								Convocatorias cerradas (<?php echo $cantidad_convocatorias_cerradas; ?>)
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="convocatorias-content">
		<div class="container active" id="abiertas">
			<div class="row">
				<div class="col-md-12">
					<div class="convocatorias-filter">
						<ul>
							<li>
								<p>
									Filtrar convocatorias
								</p>
							</li>
							<li>
								<a href="" data-filtro="todos" class="active filtro-convocatorias-abiertas">
									Ver todo (<?php echo $cantidad_convocatorias_abiertas; ?>)
								</a>
							</li>
							<?php
                $terms = get_terms('categoria_convocatoria', array('hide_empty' => true));
                foreach ($terms as $key => $categoria): ?>
                  <?php
                    $args_items_ca = array(
                    'post_type' => 'convocatoria',
                    'fields' => 'ids',
                    'meta_query'  => array(
                      array(
                        'key'     => 'postulaciones_abiertas',
                        'value'     => '1',
                        'compare'   => '=',
                      ),
                    ),
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'categoria_convocatoria',
                        'field'    => 'slug',
                        'terms'    => $categoria->slug,
                      ),
                    ),
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => -1
                  );
                  $post_conv_abiertas_por_cat = new WP_Query($args_items_ca);
                  $cantidad_conv_abiertas_por_cat = $post_conv_abiertas_por_cat->post_count;
                   ?>
                  <?php if($cantidad_conv_abiertas_por_cat>0): ?>
                  <li>
                    <a href="" data-filtro="categoria" data-categoria="<?php echo $categoria->slug; ?>" class="filtro-categoria filtro-convocatorias-abiertas"><?php echo $categoria->name; ?> (<?php echo $cantidad_conv_abiertas_por_cat; ?>)</a>
                  </li>
                  <?php endif; ?>
              <?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="row">
				<div id="divresultados" class="col-md-12">
					<ul id="lista-convocatorias-abiertas" class="convocatorias-wrapper">
						<?php
							$vez_ca = 1;
							if($convocatorias_abiertas->have_posts())
				      {
				        while($convocatorias_abiertas->have_posts())
				        {
				          $convocatorias_abiertas->next_post();
				          if($vez_ca>8){$clase='hide';}else{$clase='show';}
				      ?>

						<li class="<?php echo $clase; ?>">
							<a href="<?php echo get_permalink($convocatorias_abiertas->post->ID); ?>" class="box-proyecto">
								<?php $imagen_destacada_convocatoria = get_the_post_thumbnail_url( $convocatorias_abiertas->post->ID, 'w500' ); ?>
							  <img class="box-proyecto__img" src="<?php echo $imagen_destacada_convocatoria; ?>" alt="<?php echo $convocatorias_abiertas->post->post_title; ?>">
							  <div class="box-proyecto__category">
							    <?php
				            $terms = get_the_terms( $convocatorias_abiertas->post->ID, 'categoria_convocatoria' );
				            $cont = 1;
				            foreach($terms as $term) {
				              if($cont==1){
				                echo $term->name.' ';
				              }else{
				                echo ', '.$term->name;
				              }
				              $cont++;
				            }
				          ?>
							  </div>
							  <p class="box-proyecto__title">
							    <?php echo $convocatorias_abiertas->post->post_title; ?>
							  </p>
							  <p class="box-proyecto__text">
							    <?php echo $convocatorias_abiertas->post->descripcion_corta; ?>
							  </p>
							  <p class="estado-convocatoria">
							    Convocatoria abierta
							  </p>
							  <p class="btn-convocatoria">
							    ¡Postula ahora!
							  </p>
							</a>
						</li>

					<?php
							$vez_ca++;
						}
					}
					?>
					</ul>
				</div>
			</div>

      <div class="row">
        <div class="col-md-12">
            <?php if($vez_ca>8){$clase_btn = ''; }else{$clase_btn = 'hide'; } ?>
            <a href="" class="btn btn-green js-cargar-mas-convocatorias-abiertas <?php echo $clase_btn; ?>">
              Carga más convocatorias
            </a>
        </div>
      </div>
		</div>


		<div class="container" id="cerradas">
			<div class="row">
				<div class="col-md-12">
					<div class="convocatorias-filter">
						<ul>
							<li>
								<p>
									Filtrar convocatorias
								</p>
							</li>
							<li>
								<a href="" data-filtro="todos" class="active filtro-convocatorias-cerradas">
									Ver todo (<?php echo $cantidad_convocatorias_cerradas; ?>)
								</a>
							</li>

							<?php
                $terms = get_terms('categoria_convocatoria', array('hide_empty' => true));
                foreach ($terms as $key => $categoria): ?>
                  <?php
                    $args_items_cc = array(
                    'post_type' => 'convocatoria',
                    'fields' => 'ids',
                    'meta_query'  => array(
                      array(
                        'key'     => 'postulaciones_abiertas',
                        'value'     => '0',
                        'compare'   => '=',
                      ),
                    ),
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'categoria_convocatoria',
                        'field'    => 'slug',
                        'terms'    => $categoria->slug,
                      ),
                    ),
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => -1
                  );
                  $post_conv_cerradas_por_cat = new WP_Query($args_items_cc);
                  $cantidad_conv_cerradas_por_cat = $post_conv_cerradas_por_cat->post_count;
                   ?>
                  <?php if($cantidad_conv_cerradas_por_cat > 0): ?>
                  <li>
                    <a href="" data-filtro="categoria" data-categoria="<?php echo $categoria->slug; ?>" class="filtro-categoria filtro-convocatorias-cerradas"><?php echo $categoria->name; ?> (<?php echo $cantidad_conv_cerradas_por_cat; ?>)</a>
                  </li>
                  <?php endif; ?>
              <?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<ul id="lista-convocatorias-cerradas" class="convocatorias-wrapper">
						<?php
							$vez_cc = 1;
							if($convocatorias_cerradas->have_posts())
				      {
				        while($convocatorias_cerradas->have_posts())
				        {
				          $convocatorias_cerradas->next_post();
				          if($vez_cc>8){$clase='hide';}else{$clase='mostrado';}
				      ?>

						<li class="<?php echo $clase; ?>">
							<a href="<?php echo get_permalink($convocatorias_cerradas->post->ID); ?>" class="box-proyecto">
								<?php $imagen_destacada_convocatoria = get_the_post_thumbnail_url( $convocatorias_cerradas->post->ID, 'w500' ); ?>
							  <img class="box-proyecto__img" src="<?php echo $imagen_destacada_convocatoria; ?>" alt="<?php echo $convocatorias_cerradas->post->post_title; ?>">
							  <div class="box-proyecto__category">
							    <?php
				            $terms = get_the_terms( $convocatorias_cerradas->post->ID, 'categoria_convocatoria' );
				            $cont = 1;
				            foreach($terms as $term) {
				              if($cont==1){
				                echo $term->name.' ';
				              }else{
				                echo ', '.$term->name;
				              }
				              $cont++;
				            }
				          ?>
							  </div>
							  <p class="box-proyecto__title">
							    <?php echo $convocatorias_cerradas->post->post_title; ?>
							  </p>
							  <p class="box-proyecto__text">
							    <?php echo $convocatorias_cerradas->post->descripcion_corta; ?>
							  </p>
							  <p class="estado-convocatoria">
							    Convocatoria cerrada
							  </p>
							  <p class="btn-convocatoria">
							    Ver detalles
							  </p>
							</a>
						</li>

					<?php
						}
					}
					?>
					</ul>

          <?php if($vez_cc>8){$clase_btn = ''; }else{$clase_btn = 'hide'; } ?>
					<a href="" class="btn btn-green js-cargar-mas-convocatorias-cerradas <?php echo $clase_btn; ?>">
          	Cargar más convocatorias
        	</a>


				</div>
			</div>

		</div>
	</div>

	<?php get_template_part( 'partials/widget', 'tebrindamos' ); ?>
	<?php get_template_part( 'partials/widget', 'nuestrared' ); ?>

<?php include('footer.php'); ?>
