<?php
define("SITE_URL",get_bloginfo('url'));
define("TEMPLATE_URL",get_bloginfo('template_url'));

#Tamaños de imagenes
add_action( 'after_setup_theme', 'mytheme_setup' );

function mytheme_setup()
{
    add_image_size('w500',500,500, true); //Directorio
    add_image_size('w780',780,480, true); //Nuestra red: Fundacion
    add_image_size('w800',800,625, true); //Single Fundacion: Foto contacto
    add_image_size('w1080',1080,685, true); //Slider fundaciones
    //add_image_size('w1200fundacion',1200,761, true); //Home: Slider fundaciones
    add_image_size('w1200transparencia',1200,600, true); //Conocenos->Transparencia
    add_image_size('w1600',1600,563, true); //Banner interno
    add_image_size('w1040',1040,780, true); //Imagen hub
    add_image_size('w1600prefooter',1600,713, true); //Imagen antes del footer
    add_image_size('w1600home',1600,813, true); //Slider home
}

add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyC0XY0ANrRvlWBH-6Kqxg-BtLbtadUlWdw';
});

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

function browser() {
    if(strpos($_SERVER['HTTP_USER_AGENT'],"MSIE")){
        if(strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 6")) return 'ie ie6';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 7")) return 'ie ie7';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 8")) return 'ie ie8';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 9")) return 'ie ie9';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"MSIE 10")) return 'ie ie10';
        else {echo 'ie';}
    }
    else if(strpos($_SERVER['HTTP_USER_AGENT'],"AppleWebKit")){
        if(strpos($_SERVER['HTTP_USER_AGENT'],"iPhone")) return 'webkit iphone';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"iPad")) return 'webkit ipad';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"iPod")) return 'webkit ipod';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"Safari")) return 'webkit safari';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"Chrome")) return 'webkit chrome';
        else if(strpos($_SERVER['HTTP_USER_AGENT'],"Android")) return 'webkit android';
        else if(preg_match('/BlackBerry?/', $_SERVER['HTTP_USER_AGENT'])) return 'webkit blackberry';
        else {return 'webkit';}
    }
    else if(strpos($_SERVER['HTTP_USER_AGENT'],"Presto")) return 'opera';
    else if(strpos($_SERVER['HTTP_USER_AGENT'],"Trident/7.0; rv:11.0")) return 'ie ie11';
    else if(strpos($_SERVER['HTTP_USER_AGENT'],"Firefox")) return 'firefox';
    else if(strpos($_SERVER['HTTP_USER_AGENT'],"IEMobile")) return 'iemobile';
    else if(preg_match('/BlackBerry?/', $_SERVER['HTTP_USER_AGENT'])) return 'blackberry5';
    else return '';
};

function isiOS(){
    if(strpos($_SERVER['HTTP_USER_AGENT'],"iPhone") or strpos($_SERVER['HTTP_USER_AGENT'],"iPad") or strpos($_SERVER['HTTP_USER_AGENT'],"iPod")) return true;
    else return false;
}

function isMobile() {
    if(isiOS() or strpos($_SERVER['HTTP_USER_AGENT'],"IEMobile") or strpos($_SERVER['HTTP_USER_AGENT'],"Android") or preg_match('/BlackBerry?/', $_SERVER['HTTP_USER_AGENT'])) return true;
    else return false;
}


// get OS via user agent
function os() {
    if(strpos($_SERVER['HTTP_USER_AGENT'],"Windows")) return 'ms';
    else if(strpos($_SERVER['HTTP_USER_AGENT'],"Macintosh")) return 'mac';
    else return '';
};
// print class to current nav link
function param($value){global $current;if($current == $value)echo 'active';}

$browser = (browser());
define('BROWSER',$browser);
$os = (os());
define('OS',$os);
$mobile = (isMobile() ? 'mobile' : '');
define('MOBILE',$mobile);


function get_breadcrumb($page_id)
{
    $pages = array();

    $post = get_post($page_id);
    $pages[] = array('titulo' => $post->post_title , 'url' => get_permalink($post->ID));
    while($post->post_parent)
    {
        $post = get_post($post->post_parent);
        $pages[] = array('titulo' => $post->post_title , 'url' => get_permalink($post->ID));

    }
    return $pages;
}

function get_parent($page_id = null)
{

    if($page_id != null)
    {
        $post_aux = get_post($page_id);
    }
    else
    {
        global $post;
        $post_aux = $post;
    }

    $page = array('titulo' => $post_aux->post_title , 'url' => get_permalink($post_aux->ID), 'ID' => $post_aux->ID);
    while($post_aux->post_parent)
    {
        $post_aux = get_post($post_aux->post_parent);
        $page = array('titulo' => $post_aux->post_title , 'url' => get_permalink($post_aux->ID), 'ID' => $post_aux->ID);

    }
    return $page;
}

if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );
add_image_size( 'destacado_home', 320, 200, true );

// default variables
$title = '';
$siteName = ' · '.get_bloginfo('name');
$description = get_bloginfo('description');
$browser = (browser());
$os = (os());
$mobile = (isMobile() ? 'mobile' : '');

define("URLSITE",get_bloginfo('url'));
define("URLTHEME",get_bloginfo('template_url'));

function get_current_parent($post)
    {
        $parent = $post->post_parent;
        $post_p = $post;
        while ($parent != 0)
        {
            $post_p = get_post($parent);
            $parent = $post_p->post_parent;
        }
        return $post_p->post_name;

    }

function get_current_parent_object($post)
    {
        $parent = $post->post_parent;
        $post_p = $post;
        while ($parent != 0)
        {
            $post_p = get_post($parent);
            $parent = $post_p->post_parent;
        }
        return $post_p;

    }






//Se ejecuta al guardar una Noticia
function enviar_noticia_a_hub( $post_id ) {

    $post_local = get_post($post_id);

    if ( get_post_status( $post_id ) == 'publish' and (get_post_type($post_id) == "noticias") and has_category('colunga-hub', $post_local) ) {

    $titulo = $post_local->post_title;
    $descripcion = get_field('descripcion_corta', $post_id);
    $contenido = $post_local->post_content;
    $imagen_destacada = get_field('imagen_destacada', $post_local->ID);
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post_local->ID), 'full')[0];
    $autor = get_field('autor', $post_local->ID);
    $fecha = get_the_time('Y-m-d H:m:s', $post_local->ID);
    $slug = $post_local->post_name;
    $id_original = $post_id;

    $clave = md5($id_original.'ColungaHUB201siete'.$slug);

    //$subject = 'Carlos ha guardado una noticia en el sitio de Fundacion Colunga';
    //$message = "Funciona el hook ;) Se ha actualizado lo siguiente:\n\n";
    //$message .= $titulo . ": " . $url;

    // Send email to admin.
    //wp_mail( 'carlos@ilogica.cl', $subject, $message );


    $postdata = http_build_query(
        array(
            'titulo_fc' => $titulo,
            'descripcion_fc' => $descripcion,
            'contenido_fc' => $contenido,
            'imagen_destacada_fc' => $imagen_destacada['url'],
            'thumbnail_fc' => $thumbnail,
            'autor_fc' => $autor,
            'fecha_fc' => $fecha,
            'id_original_fc' => $id_original,
            'slug_fc' => $slug,
            'clave_fc' => $clave,
        )
    );


    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );


    $context  = stream_context_create($opts);

    $result = file_get_contents(URL_HUB_GUARDAR_NOTICIA, false, $context);

    $result = json_decode($result);
    error_log(print_r($result,true));

    }
}
add_action( 'acf/save_post', 'enviar_noticia_a_hub',20);


//Se ejecuta al guardar un Evento
function enviar_evento_a_hub( $post_id ) {

    $post_local = get_post($post_id);

    if ( (get_post_status( $post_id ) == 'publish') and (get_post_type($post_id) == "eventos")  and has_term( 'colunga-hub', 'tipo_evento', $post_local ) ) {

    $titulo = $post_local->post_title;
    $contenido = $post_local->post_content;
    $imagen_destacada = get_field('imagen_destacada', $post_local->ID);
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post_local->ID), 'full')[0];
    $descripcion_corta = get_field('descripcion_corta', $post_id);

    //Ubicacion viene como arreglo, y las fechas vienen como Ymd.
    $ubicacion = get_field('ubicacion', $post_id);
    $fecha_inicio = get_field('fecha_inicio', $post_id);
    $hora_inicio = get_field('hora_inicio', $post_id);
    $fecha_fin = get_field('fecha_fin', $post_id);
    $hora_fin = get_field('hora_fin', $post_id);
    $texto_item = get_field('texto_item', $post_id);
    $contenido_item = get_field('contenido_item', $post_id);
    $encabezado_formulario = get_field('encabezado_formulario', $post_id);
    $descripcion_formulario = get_field('descripcion_formulario', $post_id);
    $url_formulario = get_field('url_formulario', $post_id);
    $fecha = get_the_time('Y-m-d H:m:s', $post_local->ID);
    $slug = $post_local->post_name;
    $id_original = $post_id;

    $clave = md5($id_original.'ColungaHUB201siete'.$slug);

    //$subject = 'Carlos ha guardado una noticia en el sitio de Fundacion Colunga';
    //$message = "Funciona el hook ;) Se ha actualizado lo siguiente:\n\n";
    //$message .= $titulo . ": " . $url;

    // Send email to admin.
    //wp_mail( 'carlos@ilogica.cl', $subject, $message );


    $postdata = http_build_query(
        array(
            'titulo_fc' => $titulo,
            'contenido_fc' => $contenido,
            'imagen_destacada_fc' => $imagen_destacada['url'],
            'thumbnail_fc' => $thumbnail,
            'descripcion_corta_fc' => $descripcion_corta,
            'ubicacion_fc' => $ubicacion,
            'fecha_inicio_fc' => $fecha_inicio,
            'hora_inicio_fc' => $hora_inicio,
            'fecha_fin_fc' => $fecha_fin,
            'hora_fin_fc' => $hora_fin,
            'texto_item_fc' => $texto_item,
            'contenido_item_fc' => $contenido_item,
            'encabezado_formulario_fc' => $encabezado_formulario,
            'descripcion_formulario_fc' => $descripcion_formulario,
            'url_formulario_fc' => $url_formulario,
            'fecha_fc' => $fecha,
            'id_original_fc' => $id_original,
            'slug_fc' => $slug,
            'clave_fc' => $clave,
        )
    );


    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );


    $context  = stream_context_create($opts);

    $result = file_get_contents(URL_HUB_GUARDAR_EVENTO, false, $context);

    $result = json_decode($result);
    error_log(print_r($result,true));

    }
}
add_action( 'acf/save_post', 'enviar_evento_a_hub',20);



//Se ejecuta al guardar una Fundación
function enviar_fundacion_a_hub( $post_id ) {

    $post_local = get_post($post_id);

    //Sólo ejecutar cuando la fundación tiene check ColungaHUB
    if ( (get_post_status( $post_id ) == 'publish') and get_post_type($post_id) == "fundacion" and has_term( 'miembro-colungahub', 'tipo_proyecto', $post_local ) )
    {

        $titulo = $post_local->post_title;
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post_local->ID), 'full')[0];
        $imagen_destacada = get_field('imagen_destacada', $post_local->ID);
        $contenido = $post_local->post_content;
        $titulo_imagen = get_field('titulo_imagen', $post_local->ID);
        $texto_imagen = get_field('texto_imagen', $post_local->ID);
        $descripcion_corta = get_field('descripcion_corta', $post_local->ID);
        $proyecto = get_field('proyecto', $post_local->ID);
        $anio_de_apoyo = get_field('anio_de_apoyo', $post_local->ID);
        $impacto = get_field('impacto', $post_local->ID);
        $publico_objetivo = get_field('publico_objetivo', $post_local->ID);
        $sitio_web = get_field('sitio_web', $post_local->ID);
        $url_facebook = get_field('url_facebook', $post_local->ID);
        $url_twitter = get_field('url_twitter', $post_local->ID);
        $url_youtube = get_field('url_youtube', $post_local->ID);
        $url_instagram = get_field('url_instagram', $post_local->ID);

        $material_de_interes = get_field('material_de_interes', $post_local->ID); //Repeater

        $contacto_texto = get_field('contacto_texto', $post_local->ID);
        $tipo_de_cargo = get_field('tipo_de_cargo', $post_local->ID);
        $persona_a_cargo = get_field('persona_a_cargo', $post_local->ID);
        $email = get_field('email', $post_local->ID);
        $ubicacion = get_field('ubicacion', $post_local->ID);
        $contacto_imagen = get_field('contacto_imagen', $post_local->ID);

        $fecha = get_the_time('Y-m-d H:m:s', $post_local->ID);
        $slug = $post_local->post_name;
        $id_original = $post_id;

        $clave = md5($id_original.'ColungaHUB201siete'.$slug);


        //Taxonomias
        $area_fundacion = get_the_terms( $post_local->ID, 'area_fundacion' );
        $tipo_proyecto = get_the_terms( $post_local->ID, 'tipo_proyecto' );


        $postdata = http_build_query(
            array(
                'titulo_fc' => $titulo,
                'thumbnail_fc' => $thumbnail,
                'imagen_destacada_fc' => $imagen_destacada['url'],
                'contenido_fc' => $contenido,
                'titulo_imagen_fc' => $titulo_imagen,
                'texto_imagen_fc' => $texto_imagen,
                'descripcion_corta_fc' => $descripcion_corta,
                'proyecto_fc' => $proyecto,
                'anio_de_apoyo_fc' => $anio_de_apoyo,
                'impacto_fc' => $impacto,
                'publico_objetivo_fc' => $publico_objetivo,
                'sitio_web_fc' => $sitio_web,
                'url_facebook_fc' => $url_facebook,
                'url_twitter_fc' => $url_twitter,
                'url_youtube_fc' => $url_youtube,
                'url_instagram_fc' => $url_instagram,
                'material_de_interes_fc' => $material_de_interes,
                'contacto_texto_fc' => $contacto_texto,
                'tipo_de_cargo_fc' => $tipo_de_cargo,
                'persona_a_cargo_fc' => $persona_a_cargo,
                'email_fc' => $email,
                'ubicacion_fc' => $ubicacion,
                'contacto_imagen_fc' => $contacto_imagen['url'],
                'email_fc' => $email,
                'fecha_fc' => $fecha,
                'slug_fc' => $slug,
                'id_original_fc' => $id_original,
                'clave_fc' => $clave,
                'area_fundacion_fc' => $area_fundacion,
                'tipo_proyecto_fc' => $tipo_proyecto,
            )
        );


        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );


        $context  = stream_context_create($opts);

        $result = file_get_contents(URL_HUB_GUARDAR_FUNDACION, false, $context);

        $result = json_decode($result);
        error_log(print_r($result,true));

    }
}
add_action( 'acf/save_post', 'enviar_fundacion_a_hub',20);

add_filter( 'gform_export_separator', 'change_separator', 10, 2 );
function change_separator( $separator, $form_id ) {
    return '|';
}


// function wcr_maintain() {
//     // we show this message if
//     // 1. you're not logged in
//     // 2. you're not on /wp-admin/ (index.php is redirecting you to wp-login.php)
//     // 3. you're not on login page
//     if (
//          !is_user_logged_in() &&
//          !is_admin() &&
//          !in_array($GLOBALS['pagenow'], array('wp-login.php'))
//        ) {
//         $period = 3 * HOUR_IN_SECONDS; // 3 hours, but you can change if you need
//
//         header($_SERVER['SERVER_PROTOCOL'] . ' 503 Service Unavailable', true, 503);
//         header('Retry-After: ' . $period);
//
//         // you can insert whatever you want :)
//         echo '<H1>Sitio temporalmente en mantención</H1>';
//         exit;
//     }
// }
//
// add_action('init', 'wcr_maintain');

//inicio agregar menu
function register_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_menu' );
//fin agregar menu

?>
