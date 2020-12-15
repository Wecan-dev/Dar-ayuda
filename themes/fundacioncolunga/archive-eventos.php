<?php
$title = 'Eventos';
$current = 'eventos';
include('header.php');

$current_url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$f = ($_GET['f']) ? $_GET['f'] : '';

$arr_fechas = [
  "jan" => "ene",
  "feb" => "feb",
  "mar" => "mar",
  "apr" => "abr",
  "may" => "may",
  "jun" => "jun",
  "jul" => "jul",
  "aug" => "ago",
  "sep" => "sep",
  "oct" => "oct",
  "nov" => "nov",
  "dec" => "dic"
];
?>

<section class="noticias-stage eventos-stage np-bottom mb-5">
  <!-- <div class="noticias-stage-color"></div> -->
  <div class="noticias-stage-bg" style="background-image: url('<?= get_template_directory_uri(); ?>/assets/img/fondo_eventos.jpg');"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="text-right mt-5 c-white">EVENTOS</h1>
      </div>
    </div>
  </div>
</section>


<section id="eventos" class="eventos no-padding">
  <div class="container">
    <div class="row filtro">
      <div class="col-md-3">
        <div>
          <div class="list-group eventos_filtros">
            <a href="<?= $current_url ?>" class="list-group-item active">Filtrar</a>
            <a href="<?= $current_url ?>?f=pro" class="list-group-item <?= ($f == 'pro') ? 'active' : ''; ?>">Próximos</a>
            <a href="<?= $current_url ?>?f=pas" class="list-group-item <?= ($f == 'pas') ? 'active' : ''; ?>">Pasados</a>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row grid" id="todos-los-eventos">
          <?php
          $hoy = date('Ymd');
          $args = array();

          if ($f == "pas") {
            $args = array(
              'post_type' => 'eventos',
              //'meta_query' => array(array('key'   => 'fecha_inicio','compare' => '>=', 'value'   => $hoy,)),
              'meta_query' => array(
                'relation' => 'OR',
                array(
                  'key'   => 'fecha_inicio',
                  'compare' => '<',
                  'value'   => $hoy,
                  'type'    => 'NUMERIC',
                ),
                array(
                  'key'   => 'fecha_fin',
                  'compare' => '==',
                  'value'   => $hoy,
                  'type'    => 'NUMERIC',
                )
              ),
              'meta_key' => 'fecha_inicio',
              'orderby' => 'meta_value_num',
              'order' => 'DESC',
              'post__not_in'  => array($id_evento_excluido),
              'posts_per_page' => -1
            );
          } else if ($f == "pro") {
            $args = array(
              'post_type' => 'eventos',
              //'meta_query' => array(array('key'   => 'fecha_inicio','compare' => '>=', 'value'   => $hoy,)),
              'meta_query' => array(
                'relation' => 'OR',
                array(
                  'key'   => 'fecha_inicio',
                  'compare' => '>=',
                  'value'   => $hoy,
                  'type'    => 'NUMERIC',
                ),
                array(
                  'key'   => 'fecha_fin',
                  'compare' => '>=',
                  'value'   => $hoy,
                  'type'    => 'NUMERIC',
                )
              ),
              'meta_key' => 'fecha_inicio',
              'orderby' => 'meta_value_num',
              'order' => 'DESC',
              'post__not_in'  => array($id_evento_excluido),
              'posts_per_page' => -1
            );
          } else {
            $args = array(
              'post_type' => 'eventos',
              //'meta_query' => array(array('key'   => 'fecha_inicio','compare' => '>=', 'value'   => $hoy,)),
              'meta_query' => array(
                'relation' => 'OR',
                array(
                  'key'   => 'fecha_inicio',
                  'compare' => '>=',
                  'value'   => $hoy,
                  'type'    => 'NUMERIC',
                ),
                array(
                  'key'   => 'fecha_fin',
                  'compare' => '>=',
                  'value'   => $hoy,
                  'type'    => 'NUMERIC',
                )
              ),
              'meta_key' => 'fecha_inicio',
              'orderby' => 'meta_value_num',
              'order' => 'DESC',
              'post__not_in'  => array($id_evento_excluido),
              'posts_per_page' => -1
            );
          }

          $query_eventos = new WP_Query($args);
          $vez_evento = 1;
          if ($query_eventos->have_posts()) {

            while ($query_eventos->have_posts()) {
              $query_eventos->next_post();
              if ($vez_evento > 6) {
                $clase = 'hide';
              } else {
                $clase = '';
              }

              $formato_fecha = "l j F, Y";
              $unixtimestamp = strtotime($query_eventos->post->fecha_inicio);
              $fecha_evento = date_i18n($formato_fecha, $unixtimestamp);

          ?>
              <div class="col-md-4 grid-item <?= $clase ?>">
                <div>
                  <a href="<?php echo get_permalink($query_eventos->post->ID); ?>" class="post-noticia" title="<?= $query_noticias->post->post_title ?>">
                    <div class="card destacado">
                      <div class="grid-content">
                        <div class="min-date">
                          <table>
                            <tr>
                              <td align="center">
                                <?php
                                $n_fecha = strtotime($query_eventos->post->fecha_inicio);
                                $f_fecha = (date('j', $n_fecha) < 10) ? '0' . date('j', $n_fecha) : date('j', $n_fecha);
                                echo $f_fecha;
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <td align="center">
                                <?= $arr_fechas[strtolower(substr(date('F', $n_fecha), 0, 3))]; ?>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <?php
                        // $url_imagen = wp_get_attachment_image_src(get_post_thumbnail_id($query_eventos->post->ID), 'w500')[0];
                        // $url_imagen = ($url_imagen)?$url_imagen:get_template_directory_uri().'/assets/img/imagen_generica.png';
                        $imagen = get_the_post_thumbnail($query_eventos->post->ID, 'destacado_home');
                        $imagen = ($imagen) ? $imagen : '<img width="320" height="200" src="' . get_template_directory_uri() . '/assets/img/imagen_generica.png" class="attachment-destacado_home size-destacado_home wp-post-image" alt="">';
                        ?>
                        <?= $imagen; ?>
                        <div class="card-body box-content transition card-event">

                          <?php $fecha = get_the_time('j · F · Y', $query_eventos->post->ID); ?>
                          <?php
                          $n_title = (strlen($query_eventos->post->post_title) >= 45) ? substr($query_eventos->post->post_title, 0, 45) . '...' : $query_eventos->post->post_title;
                          ?>
                          <h3 class="title"><?php echo $n_title; ?></h3>
                          <?php if ($query_eventos->post->ubicacion) : ?>
                            <p><?php echo $query_eventos->post->ubicacion['address']; ?></p>
                          <?php endif; ?>
                          <p class="first-letter-uppercase text-lowercase"><?php echo $fecha_evento; ?></p>
                          <?php if ($query_eventos->post->hora_inicio) :
                            $hora_evento = date_i18n('H:i', strtotime($query_eventos->post->hora_inicio));
                          ?>
                            <p><?php echo $hora_evento; ?> horas</p>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
          <?php
              $vez_evento++;
            }
          } else {
            echo '<h3>No hay eventos próximos.</h3>';
          }
          ?>
        </div>


        <?php if ($vez_evento > 3) : ?>
          <div class="row mt-30">
            <div class="col-md-12 text-center mt-30">
              <a href="" class="btn bg-pink btn-md js-cargar-mas-eventos <?php if ($vez_evento > 3) {
                                                                            echo 'show';
                                                                          } else {
                                                                            echo 'hide';
                                                                          } ?>">
                Cargar más eventos
              </a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>


<?php
include('footer.php');
?>