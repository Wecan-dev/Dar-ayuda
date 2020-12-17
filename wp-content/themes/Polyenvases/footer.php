<section id="contact" class="ftco-appointment ftco-section py-5 img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/contact-us.jpeg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row d-md-flex justify-content-center">
			<div class="col-md-12 col-lg-8 half p-3 py-5 pl-lg-5 ftco-animate">
				<h2 class="mb-4">Contáctanos <span>ahora</span></h2>

				<?php if ( isset($_GET['sent']) ){
	      if ( $_GET[ sent ] == '1' ){
			  echo'<script type="text/javascript">
				alert("Recibimos tu mensaje, pronto te contactaremos");
				window.location.href="index.php";
				</script>';
	      }
	      else {
			  	  echo'<script type="text/javascript">
				alert("Hubo un error al enviar el mensaje, por favor vuelve a intentarlo");
				window.location.href="index.php";
				</script>';
	        }
	      }   ?>
				<form method="post" action="<?php echo admin_url( 'admin-post.php' ) ?>" class="appointment">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<div class="input-wrap">
									<div class="icon"><span class="fa fa-user"></span></div>
									<input id="name" name="name" type="text" class="form-control" placeholder="Nombre">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<div class="input-wrap">
									<div class="icon"><span class="fa fa-paper-plane"></span></div>
									<input id="email" name="email" type="text" class="form-control" placeholder="Email">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<div class="input-wrap">
									<div class="icon"><span class="fa fa-phone"></span></div>
									<input id="tel" name="tel" type="text" class="form-control" placeholder="Teléfono">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<div class="icon" style="top: 10% !important;" ><span class="fa fa-envelope"></span></div>
								<textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Mensaje"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="hidden" name="action" value="process_form">
								<input type="submit" name="submit" class="btn btn-secondary mr-md-4 py-3 px-4">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<footer class="footer pb-0">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6 mb-4 mb-md-0">
				<h2 class="footer-heading">¿Tienes <span class="footer-span">más</span> preguntas?</h2>
				<div class="block-23 mb-3">
					<ul>
						<li><span class="icon fa fa-map"></span><span class="text"> Calle 15, Pueblo Nuevo, Panamá, Rep. de Panamá</span></li>
						<li><a href="tel:5072296330"><span class="icon fa fa-phone"></span><span class="text">507 + 229-6330 / 229-6335</span></a></li>
						<li><a href="mailto:info@polyenvases.com"><span class="icon fa fa-paper-plane"></span><span class="text">info@polyenvases.com</span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 mb-4 mb-md-0">
				<div class="brand-footer">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>">
				</div>
				<div>
					<h2 class="footer-heading">Siguenos en  <a href="https://www.instagram.com/polyenvases85/" target="_blank"><span>Instagram</span>
					<br>
					@polyenvases85</a> 
				</h2>
				</div>
			</div>


		</div>
		<div class="row">
			<div class="col-md-12 text-center">

				<p class="copyright">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> Todos los derechos reservados
					<img style="width: 10rem;" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_gris.png" alt="<?php bloginfo('name'); ?>">

					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</div>
</footer>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#d52303" /></svg></div>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<?php wp_footer(); ?>

</body>

</html>