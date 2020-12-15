<?php
$categoria = null;
$id_archivo = null;
$todos = null;

if (isset($_POST["categoria"]) && !empty($_POST["categoria"])) {
  $categoria = $_POST['categoria'];
}elseif(isset($_POST["id_archivo"]) && !empty($_POST["id_archivo"])){
  $id_archivo = $_POST['id_archivo'];
}elseif(isset($_POST["todos"]) && !empty($_POST["todos"])){
  $todos = $_POST['todos'];
}

if($categoria){
  $args = array(
    'post_type' => 'archivo',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => 'categoria_archivo',
        'field'    => 'slug',
        'terms'    => $categoria,
      ),
    ),

  );
}elseif($id_archivo){
  $args = array(
    'p' => $id_archivo, // id of a page, post, or custom type
    'post_type' => 'archivo'
  );
}elseif($todos){
  $args = array(
    'post_type' => 'archivo',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1
  );
}

$elementos = array();

$wp_query_archivos = new WP_Query( $args );
if($wp_query_archivos->have_posts())
{
  while($wp_query_archivos->have_posts())
  {
    $wp_query_archivos->next_post();

    $nombre = $wp_query_archivos->post->post_title;
    $id = $wp_query_archivos->post->ID;

    $terms = get_the_terms( $wp_query_archivos->post->ID, 'categoria_archivo' );
    $cont = 1;
    $categorias = '';
    foreach($terms as $term) {
      if($cont==1){
        $categorias = $categorias.$term->name.' ';
      }else{
        $categorias = $categorias.', '.$term->name;
      }
      $cont++;
    }

    $pdf = get_field( 'archivo', $wp_query_archivos->post->ID );
    $pdf = $pdf['url'];
    $link = get_field( 'url', $wp_query_archivos->post->ID );


    $elementos[] = array('nombre' => $nombre, 'id' => $id, 'categorias' => $categorias, 'pdf' => $pdf, 'link' => $link);
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
