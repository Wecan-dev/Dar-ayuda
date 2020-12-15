<?php
$area = null;
$tipo = null;
$id_fundacion = null;
$todos = null;

if (isset($_POST["area"]) && !empty($_POST["area"])) {
  $area = $_POST['area'];
}

if(isset($_POST["tipo"]) && !empty($_POST["tipo"])){
  $tipo = $_POST['tipo'];
}

if(isset($_POST["id_fundacion"]) && !empty($_POST["id_fundacion"])){
  $id_fundacion = $_POST['id_fundacion'];
}

if(isset($_POST["todos"]) && !empty($_POST["todos"])){
  $todos = $_POST['todos'];
}

//Posts ordenados por año descendente
              $id_posts_ordenados = $wpdb->get_results( "SELECT id FROM wp_fc_posts WHERE
post_type = 'fundacion' AND post_status = 'publish' ORDER BY YEAR(post_date) DESC, post_title ASC" );

//Traspaso los id a un arreglo.
foreach ($id_posts_ordenados as $value)
  $arreglo_ids[] = $value->id;

if($id_fundacion){
	$args = array(
    'p' => $id_fundacion,
    'post_type' => 'fundacion'
  );
}else{


	if(!$tipo and $area){
		$args = array(
			'post_type' => 'fundacion',
			/*'orderby' => 'title',
			'order' => 'ASC',*/
      'orderby'        => 'post__in',
      'post__in'       => $arreglo_ids,
      'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'area_fundacion',
					'field'    => 'slug',
					'terms'    => $area,
				),
			),

		);
	}else{
		if($tipo and !$area){
			$args = array(
				'post_type' => 'fundacion',
				/*'orderby' => 'title',
				'order' => 'ASC',*/
        'orderby'        => 'post__in',
        'post__in'       => $arreglo_ids,
        'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'tipo_proyecto',
						'field'    => 'slug',
						'terms'    => $tipo,
					),
				),

			);
		}else{
			$args = array(
				'post_type' => 'fundacion',
				/*'orderby' => 'title',
				'order' => 'ASC',*/
        'orderby'        => 'post__in',
        'post__in'       => $arreglo_ids,
        'posts_per_page' => -1,
				'tax_query' => array(
					'relation' => 'AND',
				    array(
				        'taxonomy' => 'area_fundacion',
				        'field'    => 'slug',
				        'terms'    => $area,
				    ),
				    array(
				        'taxonomy' => 'tipo_proyecto',
				        'field'    => 'slug',
				        'terms'    => $tipo,
				    ),
				),

			);
		}
	}
}
$elementos = array();

$wp_query_fundaciones = new WP_Query( $args );
if($wp_query_fundaciones->have_posts())
{
	while($wp_query_fundaciones->have_posts())
	{
		$wp_query_fundaciones->next_post();
		$titulo = $wp_query_fundaciones->post->post_title;
		$id = $wp_query_fundaciones->post->ID;
    $url_image = get_the_post_thumbnail_url( $id, 'w780' );
    if(!$url_image){
      $url_image = '';
    }

		$terms = get_the_terms( $wp_query_fundaciones->post->ID, 'area_fundacion' );
    $cont = 1;
    $area = '';
    foreach($terms as $term) {
      if($cont==1){
        $area = $area.$term->name.' ';
      }else{
        $area = $area.', '.$term->name;
      }
      $cont++;
    }

    $tipo_proyecto = '';
    $terms = get_the_terms( $wp_query_fundaciones->post->ID, 'tipo_proyecto' );
    foreach($terms as $term) {
      $tipo_proyecto = $term->name;
    }

    $cont_tipo = 1;
	  foreach($terms as $term) {
	    if($cont_tipo==1){
	      $tipo_proyecto = $term->name.' ';
	    }else{
	      $tipo_proyecto = $tipo_proyecto.', '.$term->name;
	    }
	    $cont_tipo++;
	  }

    $anio_de_apoyo = get_field('anio_de_apoyo', $wp_query_fundaciones->post->ID);
    if($anio_de_apoyo){
      $anio_de_apoyo = 'Año: '.$anio_de_apoyo;
    }else{
      $anio_de_apoyo = '';
    }


    $descripcion_corta =  $wp_query_fundaciones->post->descripcion_corta;
    if($descripcion_corta){
      $descripcion_corta = '<p>'.$descripcion_corta.'</p>';
    }else{
      $descripcion_corta = '';
    }



    $email = $wp_query_fundaciones->post->email;
    $url_fundacion = get_permalink($wp_query_fundaciones->post->ID);

		$elementos[] = array('titulo' => $titulo, 'id' => $id, 'url_image' => $url_image, 'area' => $area, 'tipo_proyecto' => $tipo_proyecto, 'anio_de_apoyo' => $anio_de_apoyo, 'descripcion_corta' => $descripcion_corta, 'email' => $email, 'url_fundacion' => $url_fundacion );
	}
}else{
  $elementos = null;
}


$respuesta = array(
		'status' => 'ok',
		'area' => $area,
		'tipo' => $tipo,
		'listado' => $elementos
	);
echo json_encode($respuesta);


?>
