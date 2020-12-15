<?php

//Fecha Ymd (hoy, mañana)
$fecha_exacta = null;
$fecha_inicio = null;
$fecha_fin = null;
$todos = false;
$pasados = false;

if (isset($_POST["fecha_exacta"]) && !empty($_POST["fecha_exacta"])) {
  $fecha_exacta = $_POST['fecha_exacta'];
}

//Fechas Ymd (Proximo mes, viene la fecha del primer dia del mes deseado y el primer dia del mes siguiente,
// EJ: 20160101 y 20160201 para buscar por ese rango. )
if (isset($_POST["fecha_inicio"]) && !empty($_POST["fecha_inicio"])) {
  $fecha_inicio = $_POST['fecha_inicio'];
}

if (isset($_POST["fecha_fin"]) && !empty($_POST["fecha_fin"])) {
  $fecha_fin = $_POST['fecha_fin'];
}

if (isset($_POST["todos"]) && !empty($_POST["todos"])) {
  $todos = $_POST['todos'];
}

if (isset($_POST["pasados"]) && !empty($_POST["pasados"])) {
  $pasados = $_POST['pasados'];
}

//var_dump($todos);
//var_dump($pasados);
//Rango fechas (Próximo mes)
//$calendario = $_POST['tipo'];

if($fecha_exacta){

  $args = array(
    'post_type' => 'eventos',
    'meta_query' => array(
      array('key'   => 'fecha_inicio',
            'compare' => '=',
            'value'   => $fecha_exacta,
            )
    ),
    'meta_key' => 'hora_inicio',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    //'post__not_in'  => array($id_evento_excluido),
    'posts_per_page' => -1
  );

}

elseif($fecha_inicio && $fecha_fin){
  $args = array(
    'post_type' => 'eventos',
    'posts_per_page' => 50,
    'post_status' => 'publish',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
      'relation' => 'AND',
      array(
          'key'   => 'fecha_inicio',
          'compare' => '>=',
          'value'   => $fecha_inicio,
          'type'    => 'NUMERIC',
      ),
       array(
          'key'   => 'fecha_inicio',
          'compare' => '<',
          'value'   => $fecha_fin,
          'type'    => 'NUMERIC',
      )


    )
    //'meta_key' => 'fecha',

    //'post__not_in'  => array($id_evento_excluido),

  );
}elseif($pasados=='true'){
  $hoy = date('Ymd');
  $args = array(
    'post_type' => 'eventos',
    'meta_key' => 'fecha_inicio',
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'meta_query' => array(
      array(
        'key'   => 'fecha_inicio',
        'compare' => '<=',
        'value'   => $hoy,
        )
    ),
    'posts_per_page' => -1
  );
}elseif($todos=='true'){
  $hoy = date('Ymd');
  $args = array(
    'post_type' => 'eventos',
    'meta_key' => 'fecha_inicio',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key'   => 'fecha_inicio',
        'compare' => '>=',
        'value'   => $hoy,
        'type'    => 'NUMERIC',
        )
    ),
    'posts_per_page' => -1
  );
}



$elementos = array();

$wp_query_eventos = new WP_Query( $args );
if($wp_query_eventos->have_posts())
{
  while($wp_query_eventos->have_posts())
  {
    $wp_query_eventos->next_post();
    $titulo = $wp_query_eventos->post->post_title;
    $id = $wp_query_eventos->post->ID;


    $formato_fecha = "l j F, Y";
    $unixtimestamp = strtotime($wp_query_eventos->post->fecha_inicio);
    $fecha = date_i18n($formato_fecha, $unixtimestamp);
    $hora = date_i18n('H:i', strtotime($wp_query_eventos->post->hora_inicio));
    $url = get_permalink($wp_query_eventos->post->ID);
    $ubicacion = $wp_query_eventos->post->ubicacion['address'];

    $elementos[] = array(
      'titulo' => $titulo,
      'url' => $url,
      'fecha' => $fecha,
      'hora' => $hora,
      'ubicacion' => $ubicacion
    );
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
