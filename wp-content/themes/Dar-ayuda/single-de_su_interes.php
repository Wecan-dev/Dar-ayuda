<?php get_header(); ?>
<section class="banner-small">
<?php get_template_part('partials/rr-ss'); ?>

  <?php if (have_rows('banner')) : ?>
    <?php while (have_rows('banner')) : the_row(); ?>
      <?php if (get_sub_field('imagen_banner')) : ?>
        <img class="banner-small__img" src="<?php the_sub_field('imagen_banner'); ?>" />
      <?php endif ?>
      <div class="banner-small__text">
        <h2 class="banner-small__title">
          <?php the_sub_field('texto_del_banner'); ?>
        </h2>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</section>
<section class="interest-general about-history">
  <img class="interest-general__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_2.png">
  <div class="padding-top-bottom padding-right-left">
    <h2 class="general-title">
      <?php the_title(); ?>
      <span></span>
    </h2>
	  <div class="container-grid" >
		

   <div class="interest-text" >
	   
		
    <?php if (have_rows('informacion')) : ?>
      <?php while (have_rows('informacion')) : the_row(); ?>
        <?php if (have_rows('titulo')) : ?>
          <?php while (have_rows('titulo')) : the_row(); ?>
            <?php if (get_sub_field('subitutlo') == 1) : ?>
              <h2 class="interest-general__subtitle">
                <span></span> <?php the_sub_field('titulo'); ?>
              </h2>
            <?php else : ?>
              <h2 class="interest-general__title">
                <?php the_sub_field('titulo'); ?>
                <span></span>
              </h2>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php if (have_rows('texto_informativo')) : ?>
          <?php while (have_rows('texto_informativo')) : the_row(); ?>
            <?php if (have_rows('parrafos')) : ?>
              <?php while (have_rows('parrafos')) : the_row(); ?>
                <?php if (get_sub_field('destacado') == 1) : ?>
                  <p class="interest-general__description">
                    <?php the_sub_field('parrafo'); ?>
                    <span></span>
                  </p>
                <?php else : ?>
                  <p class="general-description">
                    <?php the_sub_field('parrafo'); ?>
                  </p>
                <?php endif; ?>
              <?php endwhile; ?>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php if (have_rows('items')) : ?>
          <ul class="about-politics__list">
            <?php while (have_rows('items')) : the_row(); ?>
              <li> <?php the_sub_field('item'); ?> </li>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
			    </div>
	    <div class="insterest-img" >
			  <img class="interest-general__img" src="<?php echo get_the_post_thumbnail_url(); ?>">
		  </div> 
			  	  </div>
  </div>
</section>
<?php get_footer(); ?>