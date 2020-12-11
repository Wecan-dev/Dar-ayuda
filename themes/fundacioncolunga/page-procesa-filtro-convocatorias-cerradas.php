<?php
$categoria = null;
$todos = null;

if(isset($_POST["categoria"]) && !empty($_POST["categoria"])){
  $categoria = $_POST['categoria'];

}elseif(isset($_POST["todos"]) && !empty($_POST["todos"])){
  $todos = $_POST['todos'];

}

if($categoria){
	$args = array(
		'post_type' => 'convocatoria',
		'orderby' => 'title',
		'order' => 'ASC',
    'posts_per_page' => -1,
    'meta_query'	=> array(
			array(
				'key'	  	=> 'postulaciones_abiertas',
				'value'	  	=> '0',
				'compare' 	=> '=',
			),
		),
		'tax_query' => array(
			array(
				'taxonomy' => 'categoria_convocatoria',
				'field'    => 'slug',
				'terms'    => $categoria,
			),
		),

	);
}elseif($todos){
  $args = array(
    'post_type' => 'convocatoria',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => -1,
    'meta_query'	=> array(
			array(
				'key'	  	=> 'postulaciones_abiertas',
				'value'	  	=> '0',
				'compare' 	=> '=',
			),
		),
);
}

$elementos = array();

$wp_query_convocatorias = new WP_Query( $args );
if($wp_query_convocatorias->have_posts())
{
	while($wp_query_convocatorias->have_posts())
	{
		$wp_query_convocatorias->next_post();

		$titulo = $wp_query_convocatorias->post->post_title;
		$id = $wp_query_convocatorias->post->ID;
    $url_imagen = get_the_post_thumbnail_url( $id, 'w500' );
    if(!$url_imagen){
      $url_imagen = '';
    }

		$terms = get_the_terms( $wp_query_convocatorias->post->ID, 'categoria_convocatoria' );
    $cont = 1;
    $categoria = '';
    foreach($terms as $term) {
      if($cont==1){
        $categoria = $categoria.$term->name.' ';
      }else{
        $categoria = $categoria.', '.$term->name;
      }
      $cont++;
    }

    $descripcion_corta =  $wp_query_convocatorias->post->descripcion_corta;
    $url_single = get_permalink($wp_query_convocatorias->post->ID);

		$elementos[] = array('titulo' => $titulo, 'id' => $id, 'url_imagen' => $url_imagen, 'categoria' => $categoria, 'descripcion_corta' => $descripcion_corta, 'url_single' => $url_single );
	}
}else{
  $elementos = null;
}


$respuesta = array(
		'status' => 'ok',
		'listado' => $elementos
	);
echo json_encode($respuesta);


?>
