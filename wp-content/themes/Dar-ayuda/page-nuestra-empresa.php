  <?php get_header(); ?>
    <!-- Banner-->
  <section class="banner-small">
  <?php get_template_part('partials/rr-ss'); ?>

    <?php if (have_rows('banner')) : ?>
      <?php while (have_rows('banner')) : the_row(); ?>
        <?php if (get_sub_field('img_banner')) : ?>
          <img class="banner-small__img" src="<?php the_sub_field('img_banner'); ?>">
        <?php endif ?>
        <div class="banner-small__text">
          <h2 class="banner-small__title">
            <?php the_sub_field('text_header'); ?>
          </h2>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>

  <!-- History-->
  <section class="about-history">
    <img class="about-history__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_2.png">
    <div class="padding-top-bottom padding-right-left">
      <div class="container-grid">
        <?php if (have_rows('historia')) : ?>
          <?php while (have_rows('historia')) : the_row(); ?>
            <div class="about-history__text">
              <div class="general-titlexs">
                <?php the_sub_field('title_history'); ?>
              </div>
              <h2 class="general-title general-title--start">
                <?php the_sub_field('subtitle_history'); ?>
                <span></span>
              </h2>
              <p class="general-description">
                <?php the_sub_field('text_history'); ?>
              </p>
            </div>
            <?php if (get_sub_field('imagen_destacada')) : ?>
              <div class="about-history__img">
                <img src="<?php the_sub_field('imagen_destacada'); ?>" />
              </div>
            <?php endif ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Direction -->
  <section class="about-direction">
    <div class="padding-top-bottom padding-right-left">
      <?php if (have_rows('direccionamiento_estrategico')) : ?>
        <?php while (have_rows('direccionamiento_estrategico')) : the_row(); ?>
          <div class="general-titlexs general-titlexs--center">
            <?php the_sub_field('subtitle_strategy'); ?>
          </div>
          <h2 class="general-title">
            <?php the_sub_field('title_strategy'); ?>
            <span></span>
          </h2>
          <div class="main-services__flex">
            <div class="container-grid">
              <?php if (have_rows('mision')) : ?>
                <?php while (have_rows('mision')) : the_row(); ?>
                  <div class="about-direction__content">
                    <a  data-toggle="modal" data-target="#exampleModal" class="main-portfolio__item" href="">
                      <?php $icon = get_sub_field('icon'); ?>
                      <?php if ($icon) : ?>
                        <div class="main-portfolio__img">
                          <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                        </div>
                        <div class="main-portfolio__title">
                          <?php the_sub_field('title_mision'); ?>
                        </div>
                    </a>
                  <?php endif; ?>
                  <p class="general-description general-description--center">
                    <?php the_sub_field('descripcion'); ?>
                  </p>
                  </div>
				
				<!-- Modal -->
				<div class="modal fade about-direction__modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							<div class="modal-body">
								 <?php $icon = get_sub_field('icon'); ?>
                      <?php if ($icon) : ?>
                        <div class="about-direction__icon">
                          <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                        </div>
                        <div class="about-direction__title">
                          <?php the_sub_field('title_mision'); ?>
                        </div>
							<?php endif; ?>	
								 <p class="general-description general-description--center">
                    <?php the_sub_field('descripcion'); ?>
                  </p>
								<p class="main-about__description" >
									<?php the_sub_field('descripcion'); ?>
								</p>
							</div>
						
						</div>
					</div>
				</div>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php if (have_rows('vision')) : ?>
                <?php while (have_rows('vision')) : the_row(); ?>
                  <div class="about-direction__content">
                    <a class="main-portfolio__item" href="">
                      <?php $icon_vision = get_sub_field('icon_vision'); ?>
                      <?php if ($icon_vision) : ?>
                        <div class="main-portfolio__img">
                          <img src="<?php echo esc_url($icon_vision['url']); ?>" alt="<?php echo esc_attr($icon_vision['alt']); ?>" />
                        </div>
                        <div class="main-portfolio__title">
                          <?php the_sub_field('title_vision'); ?>
                        </div>
                    </a>
                  <?php endif; ?>
                  <p class="general-description general-description--center">
                    <?php the_sub_field('descripcion'); ?>
                  </p>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php if (have_rows('valores')) : ?>
                <?php while (have_rows('valores')) : the_row(); ?>
                  <div class="about-direction__content">
                    <a class="main-portfolio__item" href="">
                      <?php $icon_valores = get_sub_field('icon_valores'); ?>
                      <?php if ($icon_valores) : ?>
                        <div class="main-portfolio__img">
                          <img src="<?php echo esc_url($icon_valores['url']); ?>" alt="<?php echo esc_attr($icon_valores['alt']); ?>" />
                        </div>
                        <div class="main-portfolio__title">
                          <?php the_sub_field('title_valores'); ?>
                        </div>
                    </a>
                  <?php endif; ?>
                  <p class="general-description general-description--center">
                    <?php the_sub_field('descripcion'); ?>
                  </p>
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>

            <?php endwhile; ?>
          <?php endif; ?>
            </div>
          </div>
    </div>
  </section>

  <!-- Politics -->
  <section class="about-politics">
    <img class="about-politics__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box_2.png">
    <div class="padding-top-bottom padding-right-left">
      <div class="container-grid">
        <div class="about-politics__text">
          <h2 class="general-title general-title--start">
            Política integral
            <span></span>
          </h2>
          <?php if (have_rows('politica_integral')) : ?>
            <?php while (have_rows('politica_integral')) : the_row(); ?>
              <p class="general-description">
                <?php the_sub_field('content_section'); ?>
              </p>
              <p class="general-description">
                Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500.
              </p>
              <?php if (have_rows('important_items')) : ?>
                <ul class="about-politics__list">
                  <?php while (have_rows('important_items')) : the_row(); ?>
                    <li><?php the_sub_field('texto_del_item_'); ?></li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
              <!--               <a class="general-btn__green" href="">Leer más</a> -->
        </div>
        <?php $imagen_destacada = get_sub_field('imagen_destacada'); ?>
        <?php if ($imagen_destacada) : ?>
          <div class="about-politics__img">
            <img src="<?php echo esc_url($imagen_destacada['url']); ?>" alt="<?php echo esc_attr($imagen_destacada['alt']); ?>" />
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- BLog -->


  <?php if (have_rows('Editorial')) : ?>
    <?php while (have_rows('Editorial')) : the_row(); ?>
      <section class="about-blog">
        <div class="padding-top-bottom padding-right-left">
          <div class="general-titlexs general-titlexs--center">
            <?php the_sub_field('subtitle_editorial'); ?>
          </div>
          <h2 class="general-title">
            <?php the_sub_field('title_editorial'); ?>
            <span></span>
          </h2>
          <p class="general-description general-description--center">
            <?php the_sub_field('description_editorial'); ?>
          </p>
          <?php if (have_rows('post_editoral')) : ?>
            <div class="about-blog__carousel">
              <?php while (have_rows('post_editoral')) : the_row(); ?>
                <?php $post = get_sub_field('post'); ?>
                <?php if ($post) : ?>
                  <?php $post = $post; ?>
                  <?php setup_postdata($post); ?>
                  <div class="about-blog__item">
                    <a class="about-blog__img" href="<?php the_permalink(); ?>">
                      <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                    </a>
                    <div class="about-blog__body">
                      <a class="about-blog__title" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                      </a>
                      <p class="general-description">
                        <?php the_excerpt(30); ?>
                      </p>
                      <div class="about-blog__meta">
                        <a href="<?php the_permalink(); ?>">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nuestra-empresa/user.png">
                          <?php the_author(); ?>
                        </a>
                        <a href="<?php the_permalink(); ?>">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nuestra-empresa/heart.png">
                          Lorem
                        </a>
                        <a href="<?php the_permalink(); ?>">
                          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nuestra-empresa/chat.png">
                          <?php $numero_de_comentarios = get_comments_number();
                          echo $numero_de_comentarios; ?>
                        </a>
                      </div>
                    </div>
                  </div>
                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              <?php endwhile; ?>
            </div>
          <?php else : ?>
            <?php // no rows found 
            ?>
          <?php endif; ?>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>
  <!-- CTA -->
  <?php if ( have_rows( 'call_to_action' ) ) : ?>
    <section class="about-news">
    <img class="about-news__dotted" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box@3x.png">
    <img class="about-news__dotted about-news__dotted--right" src="<?php echo get_template_directory_uri(); ?>/assets/img/dotted-box@3x.png">
    <img class="about-news__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/image.png">
    <div class="about-news__flex">
	<?php while ( have_rows( 'call_to_action' ) ) : the_row(); ?>
  <h2>	<?php the_sub_field( 'tittle_cta' ); ?></h2>
    <?php if ( have_rows( 'button_cta' ) ) : ?>
			<?php while ( have_rows( 'button_cta' ) ) : the_row(); ?>
				<?php $url_cta = get_sub_field( 'url_cta' ); ?>
				<?php if ( $url_cta ) : ?>
					<a class="main-general__button" href="<?php echo esc_url( $url_cta); ?>"> <?php the_sub_field( 'titulo' ); ?></a>
				<?php endif; ?>
			<?php endwhile; ?>
    <?php endif; ?>
  <?php endwhile; ?>
  </div>
  </section>
<?php endif; ?>
  <?php get_footer(); ?>