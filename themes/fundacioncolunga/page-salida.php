<?php

$postdata = http_build_query(
    array(
        'title' => 'Un titulo que va por POST',
        'content' => '¿Funcionará?'
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

$result = file_get_contents('http://localhost/fundacion-colunga-wp/wp-json/wp/v2/noticias/', false, $context);
echo "<pre>";
var_dump($result);
echo "</pre>";



 ?>