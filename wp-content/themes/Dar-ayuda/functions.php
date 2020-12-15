<?php
the_post_thumbnail();
the_post_thumbnail('thumbnail');       // Thumbnail (por defecto 150px x 150px max)
the_post_thumbnail('medium');          // Media resolución (por defecto 300px x 300px max)
the_post_thumbnail('large');           // Alta resolución (por defecto 640px x 640px max)
the_post_thumbnail('full');            // Resolución original de la imagen (sin modificar)

the_post_thumbnail(array(100, 100));

add_theme_support('post-thumbnails');
set_post_thumbnail_size(1568, 9999);

if (!is_admin()) {
  wp_deregister_script('jquery');
  wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '');
  wp_enqueue_script('jquery');
}

/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen
 */
function rd_duplicate_post_as_draft()
{
  global $wpdb;
  if (!(isset($_GET['post']) || isset($_POST['post'])  || (isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action']))) {
    wp_die('No post to duplicate has been supplied!');
  }

  /*
     * Nonce verification
     */
  if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], basename(__FILE__)))
    return;

  /*
     * get the original post id
     */
  $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
  /*
     * and all the original post data then
     */
  $post = get_post($post_id);

  /*
     * if you don't want current user to be the new post author,
     * then change next couple of lines to this: $new_post_author = $post->post_author;
     */
  $current_user = wp_get_current_user();
  $new_post_author = $current_user->ID;

  /*
     * if post data exists, create the post duplicate
     */
  if (isset($post) && $post != null) {

    /*
       * new post data array
       */
    $args = array(
      'comment_status' => $post->comment_status,
      'ping_status'    => $post->ping_status,
      'post_author'    => $new_post_author,
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_name'      => $post->post_name,
      'post_parent'    => $post->post_parent,
      'post_password'  => $post->post_password,
      'post_status'    => 'draft',
      'post_title'     => $post->post_title,
      'post_type'      => $post->post_type,
      'to_ping'        => $post->to_ping,
      'menu_order'     => $post->menu_order
    );

    /*
       * insert the post by wp_insert_post() function
       */
    $new_post_id = wp_insert_post($args);

    /*
       * get all current post terms ad set them to the new post draft
       */
    $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
    foreach ($taxonomies as $taxonomy) {
      $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
      wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }

    /*
       * duplicate all post meta just in two SQL queries
       */
    $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
    if (count($post_meta_infos) != 0) {
      $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
      foreach ($post_meta_infos as $meta_info) {
        $meta_key = $meta_info->meta_key;
        if ($meta_key == '_wp_old_slug') continue;
        $meta_value = addslashes($meta_info->meta_value);
        $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
      }
      $sql_query .= implode(" UNION ALL ", $sql_query_sel);
      $wpdb->query($sql_query);
    }


    /*
       * finally, redirect to the edit post screen for the new draft
       */
    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
  } else {
    wp_die('Post creation failed, could not find original post: ' . $post_id);
  }
}
add_action('admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft');

/*
   * Add the duplicate link to action list for post_row_actions
   */
function rd_duplicate_post_link($actions, $post)
{
  if (current_user_can('edit_posts')) {
    $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
  }
  return $actions;
}

add_filter('post_row_actions', 'rd_duplicate_post_link', 10, 2);



function brdcmb()
{
  if (!is_home()) {
    echo '< a href="';
    echo get_option('home');
    echo '"> ';
    echo 'Home';;
    echo "< /a> » ";
    if (is_category() || is_single()) {
      the_category('title_li=');
      if (is_single()) {
        echo " » ";
        the_title();
      }
    } elseif (is_page()) {
      echo the_title();
    }
  }
}



// Register Custom Post Type
function Portafolio() {

	$labels = array(
		'name'                  => _x( 'Portafolios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Portafolio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Portafolio', 'text_domain' ),
		'name_admin_bar'        => __( 'Portafolio', 'text_domain' ),
		'archives'              => __( 'Ítem', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Artículo principal', 'text_domain' ),
		'all_items'             => __( 'Todos los artículos', 'text_domain' ),
		'add_new_item'          => __( 'Agregar ítem nuevo', 'text_domain' ),
		'add_new'               => __( 'Agregar nuevo', 'text_domain' ),
		'new_item'              => __( 'Agregar nuevo', 'text_domain' ),
		'edit_item'             => __( 'Editar artículo', 'text_domain' ),
		'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
		'view_item'             => __( 'Ver ítem', 'text_domain' ),
		'view_items'            => __( 'Ver artículos', 'text_domain' ),
		'search_items'          => __( 'Artículo de búsqueda', 'text_domain' ),
		'not_found'             => __( 'Extraviado', 'text_domain' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'text_domain' ),
		'featured_image'        => __( 'Foto principal', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
		'items_list'            => __( 'Lista de artículos', 'text_domain' ),
		'items_list_navigation' => __( 'Navegación de lista de elementos', 'text_domain' ),
		'filter_items_list'     => __( 'Lista de elementos de filtro', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Portafolio', 'text_domain' ),
		'description'           => __( 'Nuestro portafolio', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-add-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portafolio', $args );

}
add_action( 'init', 'Portafolio', 0 );



// Register Custom Post Type
function De_su_interes() {

	$labels = array(
		'name'                  => _x( 'De su interes', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'De su interes', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'De su interes', 'text_domain' ),
		'name_admin_bar'        => __( 'De su interes', 'text_domain' ),
		'archives'              => __( 'De su interes', 'text_domain' ),
		'attributes'            => __( 'Atributos', 'text_domain' ),
		'parent_item_colon'     => __( 'Artículo principal', 'text_domain' ),
		'all_items'             => __( 'Todos los artículos', 'text_domain' ),
		'add_new_item'          => __( 'Agregar ítem nuevo', 'text_domain' ),
		'add_new'               => __( 'Agregar nuevo', 'text_domain' ),
		'new_item'              => __( 'Agregar nuevo', 'text_domain' ),
		'edit_item'             => __( 'Editar artículo', 'text_domain' ),
		'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
		'view_item'             => __( 'Ver ítem', 'text_domain' ),
		'view_items'            => __( 'Ver artículos', 'text_domain' ),
		'search_items'          => __( 'Artículo de búsqueda', 'text_domain' ),
		'not_found'             => __( 'Extraviado', 'text_domain' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'text_domain' ),
		'featured_image'        => __( 'Foto principal', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
		'items_list'            => __( 'Lista de artículos', 'text_domain' ),
		'items_list_navigation' => __( 'Navegación de lista de elementos', 'text_domain' ),
		'filter_items_list'     => __( 'Lista de elementos de filtro', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Portafolio', 'text_domain' ),
		'description'           => __( 'Nuestros De_su_interes', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-star-filled',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'De_su_interes', $args );

}
add_action( 'init', 'De_su_interes', 0 );


// Register Custom Post Type
function Empleos() {

	$labels = array(
		'name'                  => _x( 'Empleos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Empleo', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Empleos', 'text_domain' ),
		'name_admin_bar'        => __( 'Empleos', 'text_domain' ),
		'archives'              => __( 'Archivo', 'text_domain' ),
		'attributes'            => __( 'Atributos', 'text_domain' ),
		'parent_item_colon'     => __( 'Artículo principal', 'text_domain' ),
		'all_items'             => __( 'Todos los artículos', 'text_domain' ),
		'add_new_item'          => __( 'Agregar ítem nuevo', 'text_domain' ),
		'add_new'               => __( 'Agregar nuevo', 'text_domain' ),
		'new_item'              => __( 'Nuevo artículo', 'text_domain' ),
		'edit_item'             => __( 'Editar artículo', 'text_domain' ),
		'update_item'           => __( 'Actualizar artículo', 'text_domain' ),
		'view_item'             => __( 'Ver ítem', 'text_domain' ),
		'view_items'            => __( 'Ver artículos', 'text_domain' ),
		'search_items'          => __( 'Artículo de búsqueda', 'text_domain' ),
		'not_found'             => __( 'Extraviado', 'text_domain' ),
		'not_found_in_trash'    => __( 'No encontrado en la papelera', 'text_domain' ),
		'featured_image'        => __( 'Foto principal', 'text_domain' ),
		'set_featured_image'    => __( 'Establecer imagen destacada', 'text_domain' ),
		'remove_featured_image' => __( 'Eliminar imagen destacada', 'text_domain' ),
		'use_featured_image'    => __( 'Usar como imagen destacada', 'text_domain' ),
		'insert_into_item'      => __( 'Insertar en el artículo', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Subido a este artículo', 'text_domain' ),
		'items_list'            => __( 'Lista de artículos', 'text_domain' ),
		'items_list_navigation' => __( 'Navegación de lista de elementos', 'text_domain' ),
		'filter_items_list'     => __( 'Lista de elementos de filtro', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Empleo', 'text_domain' ),
		'description'           => __( 'Módulo de empleos, explique el empleo que ofrece y busque el formulario para ello.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'empleos', $args );

}
add_action( 'init', 'Empleos', 0 );