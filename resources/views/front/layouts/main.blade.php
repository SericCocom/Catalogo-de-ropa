<!DOCTYPE html>
<html lang="en">
<head>
	@yield('title')
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="cozastore/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="cozastore/css/util.css">
	<link rel="stylesheet" type="text/css" href="cozastore/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Envío gratis para pedidos estándar de más de $100
					</div>

					
				</div>
			</div>
			<br>
			<br>
			<br>
			{!! $errors->first('succes','<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>:message</strong>
			</div>') !!}

			{!! $errors->first('fail','<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>:message</strong>
			</div>') !!}


			


			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="cozastore/images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								{{ Session::get('nombre') }} {{ Session::get('apellidop') }} {{ Session::get('apellidom') }}
							</li>

							<li>
								<a href="product.html">Productos</a>
							</li>

							<li class="label1" data-label1="Nuevo">
								<a href="shoping-cart.html">Mi carrito</a>
							</li>
							<li>
								<a href="{{ url('about') }}">A cerca de </a>
							</li>
							<li>
								<a href="contact.html">Contacto</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ $numero[0]->num }}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="cozastore/images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Envío gratis para pedidos estándar de más de $100
					</div>
				</li>

				
			</ul>

			<ul class="main-menu-m">
				

				<li>
					<a href="product.html">Tienda</a>
				</li>

				<li>
					<a href="shoping-cart.html" class="label1 rs1" data-label1="Nuevo">Mi carrito</a>
				</li>

				<li>
					<a href="{{ url('about') }}">Nosotros</a>
				</li>

				<li>
					<a href="contact.html">Contacto</a>
				</li>
			</ul>
		</div>

		
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Sus encargos
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll" >
				<ul class="header-cart-wrapitem w-full">

					@if (!empty ($pedidos))
					    
					@for ($i = 0; $i < sizeof($pedidos) ; $i++)
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="img/{{ $pedidos[$i]->photo }}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{ $pedidos[$i]->des }}
							</a>

							<span class="header-cart-item-info">
								1 x ${{ $pedidos[$i]->precio }}
							</span>
						</div>
					</li>
					@endfor
					@else
					<p>Sin pedidos</p>
					@endif



				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: ${{ $total[0]->total }}
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Ver carito
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

		

	@yield('Ban')

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		@yield('Contenido')
	</section>


	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Dudas?
					</h4>

					<p class="stext-107 cl7 size-201">
						¿Alguna pregunta? Háganos saber en la tienda en el octavo piso, 379 Hudson St, Nueva York, NY 10018 o llámenos al (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-lg-5 col-lg-7 p-b-50">
					<form action="{{ route('solicitud') }}" method="POST">
						{{ csrf_field() }}
						<div class="flex-w flex-c-m m-tb-10">
								<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
										<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
										<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
									 Quiero una cuenta !!
								</div>

						</div>
				
				

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-20">
						<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-20 p-lr-10-sm">
							<div class="filter-col5 p-r-15 p-b-20">
								<div class="mtext-102 cl2 p-b-15">
										LLenar datos
								</div>
									<input type="text" name="curp" placeholder="CURP" class="form-control {!! $errors->has('curp') ? 'has-error':'' !!} " value="{{ old('curp') }}"  >
									 {!! $errors->first('curp','<span class="help-block">:message</span>') !!}
									 {!! $errors->first('existe','<span class="help-block">:message</span>') !!}
									<br>
									<input type="text" name="nombre" placeholder="Nombre" class="form-control {!! $errors->has('nombre') ? 'has-error':'' !!} " value="{{ old('nombre') }}"  >
									 {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
									<br>
									<input type="text" name="apellidop" placeholder="Apellido paterno" class="form-control {!! $errors->has('apellidop') ? 'has-error':'' !!} " value="{{ old('apellidop') }}"  >
									 {!! $errors->first('apellidop','<span class="help-block">:message</span>') !!}									<br>
									<input type="text" name="apellidom" placeholder="Apellido materno" class="form-control {!! $errors->has('apellidom') ? 'has-error':'' !!} " value="{{ old('apellidom') }}"  >
									 {!! $errors->first('apellidom','<span class="help-block">:message</span>') !!}
									<br>
									<input type="text" name="telefono" placeholder="Teléfono" class="form-control {!! $errors->has('telefono') ? 'has-error':'' !!} " value="{{ old('telefono') }}"  >
									 {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
									<br>
									<input type="text" name="direccion" placeholder="Dirrección" class="form-control {!! $errors->has('direccion') ? 'has-error':'' !!} " value="{{ old('direccion') }}"  >
									 {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
									<br>
									<input type="text" name="email" placeholder="Correo" class="form-control {!! $errors->has('email') ? 'has-error':'' !!} " value="{{ old('email') }}"  >
									 {!! $errors->first('email','<span class="help-block">:message</span>') !!}
									<br>
									<input type="text" name="usuario" placeholder="Usuario" class="form-control {!! $errors->has('usuario') ? 'has-error':'' !!} " value="{{ old('usuario') }}"  >
									 {!! $errors->first('usuario','<span class="help-block">:message</span>') !!}
									<br>
									<input type="text" name="password" placeholder="Contraseña" class="form-control {!! $errors->has('password') ? 'has-error':'' !!} " value="{{ old('password') }}"  >
									 {!! $errors->first('password','<span class="help-block">:message</span>') !!}
									<br>
									
							
							</div>
						</div>
					<div class="p-t-18">
						{!! $errors->first('succes','<span class="help-block">:message</span>') !!}
					<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 	trans-04">
					Enviar!
					</button>
					</div>
				</div>

						
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="cozastore/images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="cozastore/images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="cozastore/images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="cozastore/images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="cozastore/images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	

<!--===============================================================================================-->	
	<script src="cozastore/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="cozastore/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="cozastore/vendor/bootstrap/js/popper.js"></script>
	<script src="cozastore/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="cozastore/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		});
	</script>
	<script src="cozastore/vendor/daterangepicker/moment.min.js"></script>
	<script src="cozastore/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="cozastore/vendor/slick/slick.min.js"></script>
	<script src="cozastore/js/slick-custom.js"></script>

	<script src="cozastore/vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<script src="cozastore/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="cozastore/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="cozastore/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="cozastore/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->

	<script src="cozastore/js/main.js"></script>
	
	<script src="{{ asset('js/vue.js') }}"></script>
	<script src="{{ asset('js/vue-resource.js') }}"></script>
</body>
</html>