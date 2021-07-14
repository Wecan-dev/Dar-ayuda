<footer class="main-footer">
  <div class="padding-right-left padding-top-bottom">
    <div class="container-grid">
      <div class="main-footer__item">
        <div class="main-footer__logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
        </div>
        <p class="main-footer__description">
          Nuestra experiencia sabe dar respuesta a sus necesidades.
        </p>
      </div>
      <div class="main-footer__item">
        <h2 class="main-footer__title">
          Empresa
        </h2>
        <ul class="site-map">
          <li>
            <a href="<?php echo bloginfo('url'); ?>">
              Inicio
            </a>
          </li>
          <li>
            <a href="<?php echo bloginfo('url') . '/index.php/nuestra-empresa'; ?>">
              Nuestra empresa
            </a>
          </li>
          <li class=" dropdown">
            <a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button">
              Portafolio
            </a>
            <div aria-labelledby="navbarDropdown" class="dropdown-menu" style="background: #f8f8f8;">
              <?php $args = array('post_type' => 'portafolio', 'order' => 'ASC', 'posts_per_page' => -1); ?>
              <?php $loop = new WP_Query($args); ?>
              <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <a class="dropdown-item" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php wp_reset_postdata(); ?>
              <?php endwhile; ?>
            </div>
          </li>
            <li>
              <?php $args = array('post_type' => 'De_su_interes', 'order' => 'ASC', 'posts_per_page' => -1); ?>
              <?php $loop = new WP_Query($args); ?>
              <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <a class="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php wp_reset_postdata(); ?>
              <?php endwhile; ?>
            </li>
          <li>
            <a href="<?php echo bloginfo('url') . '/index.php/buscador-de-empleo'; ?>">
              Buscador de empleo
            </a>
          </li>
          <!--<li>
            <a href="<?php// echo bloginfo('url') . '/index.php/blog'; ?>">
              Blog
            </a>
          </li>-->
          <li>
            <a href="<?php echo bloginfo('url') . '/index.php/contacto'; ?>">
              Contacto
            </a>
          </li>
        </ul>
      </div>
      <?php
          $direction1 = get_theme_mod('contacto_direction1');
                 
          $phone = get_theme_mod('contacto_phone');
          $email = get_theme_mod('contacto_email');
		$ws = get_theme_mod('contacto_ws');
          $facebook = get_theme_mod('Redes_sociales_FB');
          $instagram = get_theme_mod('Redes_sociales_IG');
		$twitter = get_theme_mod('Redes_sociales_TW');
      ?>
      <div class="main-footer__item">
        <h2 class="main-footer__title">
          Datos de Contacto
        </h2>
        <ul class="list-contact">
          <li>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/place.png">
              Dirección:<br>
              <?php echo $direction1; ?> <br>
                       
          <li>
            <a href="mailto:<?php echo $email; ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/envelope.png">
              Email: <?php echo $email; ?>
            </a>
          </li>
          <li>
			  <a href="tel:<?php echo $phone; ?>" >
			  
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/phone-call.png">
              Teléfono: <?php echo $phone; ?>
          </a>
				  </li>
        </ul>
      </div>
      <div class="main-footer__item">
        <h2 class="main-footer__title">
          Nuestras Redes
        </h2>
        <div class="main-footer__rrss">
            <a class="rrss__item" href="<?php echo $facebook; ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb.png">
            </a>
            <a class="rrss__item" href="<?php echo $instagram; ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.png">
            </a>

        </div>
      </div>
    </div>
  </div>
</footer>
<a class="boton-subir slider-top" href="#" id="js_up">
  <img alt="icon chat" src="<?php echo get_template_directory_uri(); ?>/assets/img/button@3x.png">
</a>
<div class="main-powered">
  <div class="main-powered__flex">
    <p>Copyright © 2020</p>
    <a href="https://sigma.la/">Sigma Studios</a>
    <p>- Sitios Web</p>
  </div>
</div>
<div class="main-whatsapp">
	
	
	<?php if ( wp_is_mobile() ) : ?>
	    <?php if (get_theme_mod('contacto_ws')!=NULL) {?>
             <a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo $ws; ?>">
					<img alt="icon chat" src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp@3x.png">
				  </a>
                <?php } ?>  
					
				<?php else : ?>
	<?php if (get_theme_mod('contacto_ws')!=NULL) {?>
				  <a  target="_blank" href="https://web.whatsapp.com/send?phone=<?php echo $ws; ?>">
								
<img alt="icon chat" src="<?php echo get_template_directory_uri(); ?>/assets/img/whatsapp@3x.png">
				  </a>
	          <?php } ?>  
				<?php endif; ?>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/setting-slick.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blazy/1.8.2/blazy.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<?php wp_footer(); ?>

<script>

$(document).ready(function($) {  

// Ancho del ul
function width(li, ul) {
  var ulw = 0;
  $(li).each(function(){
    w = $(this).width();
    ulw = ulw + w + 20;
  });
  $(ul).css('width', ulw);
}
width('.marquesina ul li', '.marquesina ul');
  
// Set interval  
function marquesina(li, ul) {
  var first = $(li).first().width();
  $(ul).animate({
    'marginLeft' : '-' + first}, {
      duration: 7000,
      complete: function() {
        $(this).css('marginLeft', '0');
        one = $(li).first().detach();
        $(li).last().parent().append(one);
      }
  });
}

myInter = setInterval(function() { 
    marquesina('.marquesina ul li', '.marquesina ul'); 
}, 100);
  
// Stop on hover and then resume
$('.marquesina').hover(function(){
  clearInterval(myInter);
  }, function() {
    myInter = setInterval(function() { 
    marquesina('.marquesina ul li', '.marquesina ul'); 
}, 100);
  });
  
});
</script>
</body>

</html>