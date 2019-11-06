<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css_front/css/bootstrap.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="vendors/animate-css/animate.css">
	<link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="css_front/css/style.css">
	<link rel="stylesheet" href="css_front/css/responsive.css">
</head>
<body>
		<!--================Header Menu Area =================-->
	
	<!--================Header Menu Area =================-->

	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Aun no tienes una cuenta?</h4>
							<p>Aquí encontrarás todo lo que buscas, nuevas ofertas, nueva moda. Todo al alcance de un clic</p>
							<a class="main_btn" href="{{ url('invitado') }}">Entra como invitado</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Inicia sesión</h3>
						<form class="row login_form" action="{{ route('loginCl') }}" method="post" id="contactForm" >
							{{ csrf_field() }}
							<div class="col-md-12 form-group" {!! $errors->has('usuario') ? 'has-error':'' !!}  >
								<input type="text" class="form-control" id="name" name="usuario" placeholder="Usuario" value="{{ old('usuario') }}">
								 {!! $errors->first('usuario','<span class="help-block">:message</span>') !!}
							</div>
							<div class="col-md-12 form-group" {!! $errors->has('password') ? 'has-error':'' !!}>
								<input type="password" class="form-control" id="name" name="password" placeholder="Contraseña" value="{{ old('password') }}">
								{!! $errors->first('password','<span class="help-block">:message</span>') !!}
							</div>
							<div class="col-md-12 form-group">
								
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Ingresar</button>
								<br>
								<p>Si olvidó su contraseña, comuniquese con el administrador</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!--================ Subscription Area ================-->
	
	<!--================ End Subscription Area ================-->

	<!--================ End footer Area  =================-->



	<script src="js_front/js/jquery-3.2.1.min.js"></script>
	<script src="js_front/js/popper.js"></script>
	<script src="js_front/js/bootstrap.min.js"></script>
	<script src="js_front/js/stellar.js"></script>
	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="vendors/isotope/isotope-min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="js_front/js/jquery.ajaxchimp.min.js"></script>
	<script src="js_front/js/mail-script.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="vendors/counter-up/jquery.counterup.js"></script>
	<script src="js_front/js/theme.js"></script>



</body>




</html>