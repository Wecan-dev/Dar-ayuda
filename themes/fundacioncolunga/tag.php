<?php get_header();?>

  <section class="noticias" style="padding-top: 300px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h5 class="subtitle text-capitalize"><?php single_tag_title(); ?></h5>
        </div>
      </div>
    
    <?php 
$args = array(
    //'tag' => 'fundacion-colunga',
	'post_type' => array( 'noticias' ),
	'tag_id' => $tag_id,
	'posts_per_page' => 30,
);
 // Custom query.
$query = new WP_Query( $args );
 
// Check that we have query results.
if ( $query->have_posts() ) {
 
    // Start looping over the query results.
    while ( $query->have_posts() ) {
         $query->the_post(); 
      ?>
<div class="col-12 col-md-4" style="margin:15px 0; min-height:420px">
	
		
		<div class="card">
			<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post_id, 'medium', array( 'class' => 'card-img-top', 'style' => 'border:1px solid #eee' ) );?> </a>
		  <div class="card-body">
			<h3 class="my-3" style="line-height:80%; margin:6px 0; font-weight:600!important; font-size:26px !important;"><a href="<?php the_permalink(); ?>"> <?php echo wp_trim_words( get_the_title(), 13, '...' );?></a></h3>
			<p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 12, '...' );?></p>
			<!--a href="<?php the_permalink(); ?>" class="bnt btn-primary btn-sm">Ver más</a-->
		  </div>
		</div>
		</div>
 <?php
    }
 
}
 
// Restore original post data.
wp_reset_postdata();
 
?>


     
      <div class="row">
        <div class="col-md-12 text-center mt-3">
          <a href="<?php echo SITE_URL; ?>/noticias" class="btn btn-green">
            Ver más
          </a>
        </div>
      </div>

    </div>
  </section>

<style>img {height:auto}</style>

<?php get_footer();?>