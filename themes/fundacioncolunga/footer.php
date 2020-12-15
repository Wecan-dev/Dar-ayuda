<?php
wp_footer();
$facebook = get_field('facebook', 'option');
$twitter = get_field('twitter', 'option');
$youtube = get_field('youtube', 'option');
$flickr = get_field('flickr', 'option');
$linkedin = get_field('linkedin', 'option');
$instagram = get_field('instagram', 'option');
$direccion_1 = get_field('direccion_1', 'option');
$direccion_2 = get_field('direccion_2', 'option');
$telefono = get_field('telefono', 'option');
$telefono_sin_espacios = str_replace(' ', '', $telefono);
$email_contacto = get_field('email_contacto', 'option');

 ?>


<footer>
			<section class="bg-white">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ul>
								<li>
									<a href="<?php echo SITE_URL; ?>/conocenos">Conócenos</a>
								</li>
                <li>
                  <a href="<?php echo SITE_URL; ?>/nuestra-historia">Historia</a>
                </li>
                <li>
									<a href="<?php echo SITE_URL; ?>/equipo">Equipo</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/nuestro-impacto">Impacto</a>
								</li>
								<!-- <li>
									<a href="<?php echo SITE_URL; ?>/conocenos#nuestro-modelo">Nuestro modelo</a>
								</li> -->
								<li>
									<a href="<?php echo SITE_URL; ?>/archivos-de-transparencia/">Transparencia</a>
								</li>
								
							</ul>
							<ul>
								<li>
									<a href="<?php echo SITE_URL; ?>/lineas-de-accion">Líneas de acción</a>
								</li>
                <li>
                  <a href="<?php echo SITE_URL; ?>/lineas-de-accion/desarrollosocial/">Desarrollo Social</a>
                </li>
								<li>
                  <a href="<?php echo SITE_URL; ?>/lineas-de-accion/innovacionsocial/">Innovación Social</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/colungahub/">ColungaHUB</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/laboratorio-de-innovacion-social/">Laboratorio</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/programa-de-mentoria/">Programa de Mentoría</a>
								</li>
							</ul>
							<ul>
								<li>
									<a href="<?php echo SITE_URL; ?>/convocatorias">Convocatorias</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/convocatorias#abiertas">Abiertas</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/convocatorias#cerradas">Cerradas</a>
								</li>
							</ul>
              <ul>
								<li>
									<a href="<?php echo SITE_URL; ?>/documentos-de-interes">Documentos</a>
								</li>
                <li>
                  <a href="<?php echo SITE_URL; ?>/documentos-de-interes">Temas</a>
                </li>
							</ul>
							<ul>
								<li>
									<a href="<?php echo SITE_URL; ?>/nuestra-red">Nuestra red</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/nuestra-red#iniciativas-fis">Organizaciones</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/documentos-de-interes">Documentos de interés</a>
								</li>
								<li>
									<a href="<?php echo SITE_URL; ?>/sinviolencia/">#ZonaLibreDeViolencia</a>
								</li>
							</ul>
							<ul>
								<li>
									<a href="<?php echo SITE_URL; ?>/noticias">Noticias</a>
								</li>
                <li>
                  <a href="<?php echo SITE_URL; ?>/noticias">
                    Notas
                  </a>
                </li>
							</ul>
              <ul>
                <li>
									<a href="<?php echo SITE_URL; ?>/eventos">Eventos</a>
								</li>
                <li>
                  <a href="<?php echo SITE_URL; ?>/eventos">
                    Agenda
                  </a>
                </li>
              </ul>
						</div>
					</div>
					<div class="row suscribir">
						<div class="col-md-5">
							<!-- Begin MailChimp Signup Form -->
								<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
								<style type="text/css">
									#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
									/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
									   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
								</style>
								<div id="mc_embed_signup">
								<form action="//fundacioncolunga.us3.list-manage.com/subscribe/post?u=52ca52f148cbe941b90c9b3ce&amp;id=89ee9aa851" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								    <div id="mc_embed_signup_scroll">
									<label for="mce-EMAIL">Suscríbete a nuestras novedades:</label>
									<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="bienvenido@tuemail.com" required>
								    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_52ca52f148cbe941b90c9b3ce_89ee9aa851" tabindex="-1" value=""></div>
								    <div class="clear"><input type="submit" value="Suscribir" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
								    </div>
								</form>
								<div class="only-desktop">
									<?php echo do_shortcode("[language-switcher]"); ?>
								</div>
								</div>
								<!--End mc_embed_signup-->
						</div>
						<div class="col-md-4 mt-5">
							<div class="socials desk">
					 <a target="_blank" href="<?php echo $flickr; ?>" class="flickr">
                    <i class="fa fa-flickr" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="<?php echo $facebook; ?>" class="facebook">
                    <i class="fa fa-facebook fa-xs" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="<?php echo $twitter; ?>" class="twitter">
                    <i class="fa fa-twitter fa-xs" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="https://www.instagram.com/fundacioncolunga/" class="instagram">
                    <i class="fa fa-instagram fa-xs" aria-hidden="true"></i>
                  </a>
                  <a target="_blank" href="<?php echo $youtube; ?>" class="youtube">
                    <i class="fa fa-youtube-play fa-xs" aria-hidden="true"></i>
                  </a>
					  <a target="_blank" href="<?php echo $linkedin; ?>" class="linkedin">
                    <i class="fa fa-linkedin fa-xs" aria-hidden="true"></i>
                  </a>
                </div>
							
             
						</div>
						<div class="col-md-3 direccion-footer">
							<p><?php echo $direccion_1; ?></p>
							<p><?php echo $direccion_2; ?></p>
							<p>Teléfono: <a href="tel:<?php echo $telefono_sin_espacios; ?>"><?php echo $telefono; ?></a></p>
							<p>Contacto: <a href="mailto:<?php echo $email_contacto; ?>"><?php echo $email_contacto; ?></a></p>
						</div>
					</div>
				</div>
			</section>



		</footer>

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript">
    $(window).load(function(){
      $('.grid').masonry({
      // options
      itemSelector: '.grid-item'
      });




      alto = 0;
      $( ".box-proyecto" ).each(function() {
      _alto = $( this ).outerHeight();
      if(_alto > alto){
        alto = _alto;
      }
      });
      $( ".box-proyecto" ).css('min-height', alto);

      $(".box-proyecto").each(function(){
        var btn = $(this).find('.btn.btn-green');
        $(this)[0].style.setProperty('padding', "10px 15px "+btn.outerHeight()+"px 15px", 'important');

      })
    });
    </script>

	</body>
</html>
<style>


</style>