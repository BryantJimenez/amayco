@extends('layouts.web')

@section('title', 'Inicio')

@section('content')

<section class="ftco-section bg-white py-0" id="banner">
		<!--
		<div class="main-banner" style="background-image: url('img/bannerprincipal.png');">
		-->
		<div class="row mx-0">
			<div class="col-12 px-0">
				<!--
					<p class="h1 text-blue font-weight-bold text-center"><span class="bg-white-opacity rounded px-4 py-1">Tu Realidad Comienza Aquí...</span></p>
				-->

				<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active" data-interval="10000">
							<img src="/web/img/slide-bg-1.jpg" class="d-block w-100 vh-80" alt="...">
						</div>
						<div class="carousel-item" data-interval="10000">
							<img src="/web/img/slide-bg-2.jpg" class="d-block w-100 vh-80" alt="...">
						</div>
						<div class="carousel-item" data-interval="10000">
							<img src="/web/img/slide-bg-3.jpg" class="d-block w-100 vh-80" alt="...">
						</div>
						<div class="carousel-item" data-interval="10000">
							<img src="/web/img/slide-bg-4.jpg" class="d-block w-100 vh-80" alt="...">
						</div>
						<!--
						<div class="carousel-item" data-interval="10000">
							<img src="img/VideoDemo.mp4" class="d-block w-100" alt="...">
						</div>-->
					</div>
				</div>
			</div>

		</div>		
		<!-- </div> -->
	</section>

	<section class="ftco-section py-2" style="background-color: #111111;">
		<div class="container">
			<div class="row">
				<div class="col-8 text-center py-3">
					<span class="h5 text-white">No dudes en contactarnos..... </span> 
					<span class="h4 text-blue" style="font-family: cursive; font-color: blue;">VIVI LA AVENTURA</span><br>
					<span>Cabalgatas, excursiones, actividades y expediciones que nunca vas a olvidar</span>
				</div>

				<div class="col-4 text-center py-4">
					<button type="button" class="btn btn-primary rounded-0"> Contáctanos!!</button>
				</div>

			</div>
		</div>
	</section>



	<section class="ftco-section bg-white py-0">
		<div class="bg-title" style="background-image: url('/web/img/parallax-fondo2.jpg');background-position-y: -200px;">
			<div class="overlay-white"></div>
			<div class="container">
				<div class="row py-5">
					<div class="col-12 text-center">
						<i class="fa fa-2x fa-users text-white bg-primary rounded-circle p-4"></i>
					</div>
					<div class="col-12 mt-1">
						<p class="h3 font-weight-bold text-center mb-0">Quienes Somos</p>
					</div>

				</div>
			</div>		
		</div>
	</section>

	<section class="ftco-section bg-white py-0">
		<div class="container">
			<div class="row">
				<div class="h5 text-center text-muted col-12 pt-5 pb-4">
					<p>Una empresa joven que opera desde la ciudad de El Calafate; especializada en turismo aventura y tradicional.</p>
					<p>Podemos describir el servicio que brindamos como personalizado, amigable y de alta calidad.</p>
					<p>Para ello ofrecemos gran variedad de excursiones, actividades y expediciones, que nos ayudaran a descubrir las bellezas naturales de esta tierra, su cultura y su historia.</p>
					<p>Nuestro principal objetivo es crear una atmósfera confortable, entretenida y divertida, alentando a nuestros pasajeros a descubrir los encantos naturales de la Patagonia Austral.</p>
					<p>Nos esforzamos para que el pasajero regrese a su casa con una apreciación más profunda y el entendimiento de este lugar mágico en el mundo.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-primary py-0 pb-5">
		<div class="container pt-4">
			<div class="row pt-3 pb-3">
				<div class="col-12 heading-section">
					<p class="h4 text-white">Nuestras <b>Excursiones</b></p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section py-0"  style="background-color: #111111;">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center py-3">
					<button type="button" class="btn btn-primary rounded-0"><i class="fa fa-arrow-right"></i> Ver todas las EXCURSIONES</button>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-white py-0">
		<div class="bg-title" src="img/contacto.jpg">
			<div class="overlay-white"></div>
			<div class="container">
				<div class="row py-5">
					<div class="col-12 text-center">
						<i class="fa fa-2x fa-camera text-white bg-primary rounded-circle p-4"></i>
					</div>
				</div>
			</div>		
		</div>
	</section>

	<section class="ftco-section bg-light pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-12 d-flex justify-content-center mb-4">
					<button class="btn btn-primary text-uppercase rounded mr-3">Rio</button>
					<button class="btn btn-white text-uppercase rounded mr-3">Web</button>
					<button class="btn btn-white text-uppercase rounded mr-3">App</button>
					<button class="btn btn-white text-uppercase rounded">Card</button>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
					<div class="card shadow border-0">
						<img src="/web/img/image.jpg" class="card-img-top" alt="Imagen">
						<div class="card-body py-3">
							<h6 class="card-title text-dark text-center font-weight-bold mb-1">Card title</h6>
							<p class="card-text text-center text-uppercase">Some</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-white py-0">
		<div class="bg-title" style="background-image: url('/web/img/parallax-regalaste.jpg'); background-position-y: -240px;">
			<div class="overlay-dark"></div>
			<div class="container">
				<div class="row py-5">
					<div class="col-12 text-center">
						<i class="fa fa-2x fa-comments text-white bg-primary rounded-circle p-4"></i>
					</div>
					<div class="col-12 mt-1">
						<p class="h3 font-weight-bold text-white text-center mb-0">Regalate unos días soñados para vos y tu familia</p>
						<p class="h5 text-center text-white">Cabalgatas, excursiones, actividades y expediciones que nunca vas a olvidar</p>
					</div>
				</div>
			</div>		
		</div>
	</section>

	<section class="ftco-section bg-white py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-12 mb-2">
					<div class="row">
						<div class="col-12 heading-section">
							<p class="h4 mb-4">Algunas <b>Actividades</b></p>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">Excursiones</span></p>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">Cutriciclos Quad Escape</span></p>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">Minitrekking</span></p>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">Travesía 4X4</span></p>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">Kayak Experience</span></p>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">Cabalgatas</span></p>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">Safari Experience</span></p>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<p><i class="fa fa-check text-white bg-primary rounded-circle p-2 mr-3"></i> <span class="h5 text-primary">City Tour</span></p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-12 mb-2">
					<p class="h4 font-weight-bold text-center mb-0">Traslados</p>
					<p class="h4 text-center mb-4">Aeropuerto/hotel/aeropuerto</p>

					<div class="accordion mb-3" id="accordion">
						<div class="card">
							<div class="card-header p-0" id="headingOne">
								<a href="javascript:void(0);">
									<p class="h6 text-dark p-2 mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">El Aeropuerto</p>
								</a>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
								<div class="card-body p-2">Se encuentra a 20km de la ciudad. El recorrido toma aproximadamente 30 minutos ida o vuelta. Para este servicio tenemos 2 opciones:</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header p-0" id="headingTwo">
								<a href="javascript:void(0);">
									<p class="h6 text-dark p-2 mb-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Vehículo privado</p>
								</a>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
								<div class="card-body p-2">Consulta tarifas.</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header p-0" id="headingThree">
								<a href="javascript:void(0);">
									<p class="h6 text-dark p-2 mb-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Traslado Regular</p>
								</a>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
								<div class="card-body p-2">Consulta tarifas.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-white py-0">
		<div class="bg-title" style=" background-image: url('/web/img/contacto.jpg');">
			<div class="overlay-white"></div>
			<div class="container">
				<div class="row py-5">
					<div class="col-12 text-center">
						<i class="fa fa-2x fa-envelope-o text-white bg-primary rounded-circle p-4"></i>
					</div>
					<div class="col-12 mt-1">
						<p class="h3 font-weight-bold text-center mb-0">Contactos</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light py-0">
		<div class="row mx-0">
			<div class="col-12 px-0">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.475622946709!2d-70.57397088480177!3d-33.41084228078524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cedfcffc3cd7%3A0x721c81f6dddbdc8e!2sLa%20Capitan%C3%ADa%2080%2C%20Oficina%20108%2C%20Las%20Condes%2C%20Regi%C3%B3n%20Metropolitana%2C%20Chile!5e0!3m2!1ses-419!2sve!4v1596904881686!5m2!1ses-419!2sve" class="w-100" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-white pt-5 pb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<form method="POST" action="#">
						<div class="row">
							<div class="col-12">
								<p class="h4"><b>Formulario</b> de Contactos</p>
							</div>
							<div class="col-lg-6 col-md-6 col-12 mb-3">
								<label class="col-form-label">Su Nombre *</label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="col-lg-6 col-md-6 col-12 mb-3">
								<label class="col-form-label">Su Email *</label>
								<input type="email" class="form-control" name="email" required>
							</div>
							<div class="col-12 mb-3">
								<label class="col-form-label">Asunto *</label>
								<input type="text" class="form-control" name="subject" required>
							</div>
							<div class="col-12 mb-3">
								<label class="col-form-label">Su Mensaje *</label>
								<textarea class="form-control" name="message" required rows="7"></textarea>
							</div>
							<div class="col-12 mb-3">
								<input type="submit" class="btn btn-primary rounded" value="Enviar">
							</div>
						</div>
					</form>
				</div>

				<div class="col-lg-6 col-md-6 col-12">
					<div class="row">
						<div class="col-12">
							<p class="h5 text-primary">Atención al <b>Cliente</b></p>
							<p>Si tienes alguna duda, o quieres consultarnos algo, ponemos a tu alcance un servicio de atención al cliente rápido y eficiente para que nos preguntes todo lo que te interese saber.</p>
						</div>

						<div class="col-12">
							<hr>
						</div>

						<div class="col-12">
							<p class="h5 text-primary">Nuestras <b>Oficinas</b></p>
							<p class="text-dark"><i class="fa fa-map-marker text-white bg-primary rounded-circle px-2 py-2 mr-3"></i> <b>Dirección:</b> Av. De la Integración, Villa Tunari, Bolivia</p>
							<p class="text-dark"><i class="fa fa-phone text-white bg-primary rounded-circle p-2 mr-3"></i> <b>Teléfono:</b> +591 71717097</p>
							<p class="text-dark"><i class="fa fa-envelope text-white bg-primary rounded-circle p-2 mr-3"></i> <b>Email:</b> info@ranabol.com</p>
						</div>

						<div class="col-12">
							<hr>
						</div>

						<div class="col-12 mb-3">
							<p class="h5 text-primary">Horarios de <b>Atención</b></p>
							<p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Lun a Vier: de 9:00 a 12:30 y de 16:00 a 19:00hs</p>
							<p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Sab: de 9:00 a 12:30 y de 16:00 a 19:00hs</p>
							<p class="text-dark mb-1"><i class="fa fa-clock-o mr-3"></i> Dom: 16:00 a 19:00hs</p>
						</div>
					</div>
				</div>

				<div class="col-12">
					<hr>
				</div>

				<div class="col-12 mb-3">
					<p class="h5 text-primary">Política de <b>Reservas</b></p>
					<ul>
						<li>El 50% del total de las reserva debe ser pre-pagado en concepto de seña al momento de la realización de la reserva.</li>
						<li>El saldo deberá ser abonado al menos 1 día previo al servicio.</li>
						<li>Todas las reservas deben ser pre-pagadas para ser consideradas confirmadas.</li>
					</ul>
				</div>

				<div class="col-12 mb-5">
					<p class="h5 text-primary">Política de <b>Cancelaciones</b></p>
					<ul>
						<li>Toda cancelación realizada dentro de los 15 días previos a la llegada del pasajero, no sufrirá penalidad.</li>
						<li>Toda cancelación realizada hasta los 5 días previos a la llegada del pasajero, tendrá una penalidad equivalente al 30% del total de la reserva.</li>
						<li>Toda cancelación realizada dentro de los 4 días previos a la llegada del pasajero, tendrá una penalidad equivalente al 100% de la reserva.</li>
						<li>Todo cambio a realizar sobre reservas confirmadas a través del pago parcial o total quedará sujeto a la disponibilidad de AMAYCO Turismo y Expediciones.</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	@endsection

