$(document).ready(function(){
	//Usuarios login
	$("button[action='login']").on("click",function(){
		$("#formLogin").validate({
			rules:
			{
				email: {
					required: true,
					email: true,
					minlength: 5,
					maxlength: 191
				},

				password: {
					required: true,
					minlength: 8,
					maxlength: 40
				}
			},
			messages:
			{
				email: {
					email: 'Introduce una dirección de correo valida.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				password: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='login']").attr('disabled', true);
				form.submit();
			}
		});
	});

	//Recuperar Contraseña
	$("button[action='reset']").on("click",function(){
		$("#formReset").validate({
			rules:
			{
				email: {
					required: true,
					email: true,
					minlength: 5,
					maxlength: 191
				},

				password: {
					required: true,
					minlength: 8,
					maxlength: 40
				},

				password_confirmation: { 
					equalTo: "#password",
					minlength: 8,
					maxlength: 40
				}
			},
			messages:
			{
				email: {
					email: 'Introduce una dirección de correo valida.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				password: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				password_confirmation: { 
					equalTo: 'Los datos ingresados no coinciden.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='reset']").attr('disabled', true);
				form.submit();
			}
		});
	});

	//Perfil
	$("button[action='profile']").on("click",function(){
		$("#formProfile").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lastname: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				phone: {
					required: false,
					minlength: 5,
					maxlength: 15
				},

				type: {
					required: true
				},

				password: {
					required: false,
					minlength: 8,
					maxlength: 40
				},

				password_confirmation: { 
					equalTo: "#password",
					minlength: 8,
					maxlength: 40
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lastname: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				phone: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				type: {
					required: 'Seleccione una opción.'
				},

				password: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				password_confirmation: { 
					equalTo: 'Los datos ingresados no coinciden.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='profile']").attr('disabled', true);
				form.submit();
			}
		});
	});

	//Administradores
	$("button[action='admin']").on("click",function(){
		$("#formAdministrator").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lastname: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				email: {
					required: true,
					email: true,
					minlength: 5,
					maxlength: 191
				},

				phone: {
					required: false,
					minlength: 5,
					maxlength: 15
				},

				type: {
					required: true
				},

				password: {
					required: true,
					minlength: 8,
					maxlength: 40
				},

				password_confirmation: { 
					equalTo: "#password",
					minlength: 8,
					maxlength: 40
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lastname: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				email: {
					email: 'Introduce una dirección de correo valida.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				phone: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				type: {
					required: 'Seleccione una opción.'
				},

				password: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				password_confirmation: { 
					equalTo: 'Los datos ingresados no coinciden.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='admin']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Banners
	$("button[action='banner']").on("click",function(){
		$("#formBanner").validate({
			rules:
			{
				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				type: {
					required: true
				},

				language_id: {
					required: true
				},

				archive: {
					required: true
				}
			},
			messages:
			{
				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				type: {
					required: 'Seleccione una opción.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				},

				archive: {
					required: 'Seleccione una imagen o video.'
				}
			},
			submitHandler: function(form) {
				$("button[action='banner']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Banners Edit
	$("button[action='banner']").on("click",function(){
		$("#formBannerEdit").validate({
			rules:
			{
				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				type: {
					required: true
				},

				language_id: {
					required: true
				}
			},
			messages:
			{
				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				type: {
					required: 'Seleccione una opción.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='banner']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Categorias
	$("button[action='category']").on("click",function(){
		$("#formCategory").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				language_id: {
					required: true
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='category']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Galeria Create
	$("button[action='gallery']").on("click",function(){
		$("#formGallery").validate({
			rules:
			{
				category_id: {
					required: true
				},

				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				description: {
					required: true,
					minlength: 2,
					maxlength: 1000
				},
				
				language_id: {
					required: true
				},

				image: {
					required: true
				}
			},
			messages:
			{
				category_id: {
					required: 'Seleccione una opción.'
				},

				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				description: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				},

				image: {
					required: 'Seleccione una imagen.'
				}
			},
			submitHandler: function(form) {
				$("button[action='gallery']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Galery Edit
	$("button[action='gallery']").on("click",function(){
		$("#formGalleryEdit").validate({
			rules:
			{
				category_id: {
					required: true
				},

				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				description: {
					required: true,
					minlength: 2,
					maxlength: 1000
				},

				lang: {
					required: true
				},

				image: {
					required: false
				}
			},
			messages:
			{
				category_id: {
					required: 'Seleccione una opción.'
				},

				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				description: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='gallery']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Actividades
	$("button[action='activity']").on("click",function(){
		$("#formActivity").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				language_id: {
					required: true
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='activity']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Excursiones
	$("button[action='excursion']").on("click",function(){
		$("#formExcursion").validate({
			rules:
			{
				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				description: {
					required: true,
					minlength: 2,
					maxlength: 16770000
				},
				
				language_id: {
					required: true
				},

				image: {
					required: true
				}
			},
			messages:
			{
				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				description: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				},

				image: {
					required: 'Seleccione una imagen.'
				}
			},
			submitHandler: function(form) {
				$("button[action='excursion']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Excursiones Edit
	$("button[action='excursion']").on("click",function(){
		$("#formExcursionEdit").validate({
			rules:
			{
				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				description: {
					required: true,
					minlength: 2,
					maxlength: 16770000
				},

				image: {
					required: false
				},

				language_id: {
					required: true
				}
			},
			messages:
			{
				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				description: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='excursion']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Atenciones
	$("button[action='about']").on("click",function(){
		$("#formAbout").validate({
			rules:
			{
				about: {
					required: false,
					minlength: 10,
					maxlength: 16770000
				}
			},
			messages:
			{
				about: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='about']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Traslados
	$("button[action='transfer']").on("click",function(){
		$("#formTransfer").validate({
			rules:
			{
				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				description: {
					required: true,
					minlength: 2,
					maxlength: 1000
				},

				language_id: {
					required: true
				}
			},
			messages:
			{
				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				description: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				language_id: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='transfer']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Atenciones
	$("button[action='attention']").on("click",function(){
		$("#formAttention").validate({
			rules:
			{
				attention: {
					required: false,
					minlength: 10,
					maxlength: 16770000
				},

				schedule: {
					required: false,
					minlength: 10,
					maxlength: 16770000
				}
			},
			messages:
			{
				attention: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				schedule: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='attention']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Imagenes
	$("button[action='image']").on("click",function(){
		$("#formImage").validate({
			rules:
			{
				about_banner: {
					required: false
				},

				gallery_banner: {
					required: false
				},

				activity_banner: {
					required: false
				},

				contact_banner: {
					required: false
				}
			},
			submitHandler: function(form) {
				$("button[action='image']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Politicas
	$("button[action='politic']").on("click",function(){
		$("#formPolitic").validate({
			rules:
			{
				booking: {
					required: false,
					minlength: 10,
					maxlength: 16770000
				},

				cancellations: {
					required: false,
					minlength: 10,
					maxlength: 16770000
				}
			},
			messages:
			{
				booking: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				cancellations: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='politic']").attr('disabled', true);
				form.submit();
			}
		});
	});

	//Contacto
	$("button[action='contact']").on("click",function(){
		$("#formContact").validate({
			rules:
			{
				phone: {
					required: false,
					minlength: 5,
					maxlength: 20
				},

				email: {
					required: false,
					email: true,
					minlength: 5,
					maxlength: 191
				},

				address: {
					required: false,
					minlength: 2,
					maxlength: 191
				},

				map: {
					required: false,
					minlength: 2,
					maxlength: 1000
				}
			},
			messages:
			{
				phone: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				email: {
					email: 'Introduce una dirección de correo valida.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				address: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				map: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='contact']").attr('disabled', true);
				form.submit();
			}
		});
	});

	//Contacto Web
	$("button[action='contact']").on("click",function(){
		$("#formContactWeb").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				email: {
					required: true,
					email: true,
					minlength: 5,
					maxlength: 191
				},

				message: {
					required: true,
					minlength: 5,
					maxlength: 64000
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				email: {
					email: 'Introduce una dirección de correo valida.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				message: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='contact']").attr('disabled', true);
				form.submit();
			}
		});
	});
});