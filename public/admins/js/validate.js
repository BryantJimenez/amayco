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

	// Banners Create
	$("button[action='banner']").on("click",function(){
		$("#formBannerCreate").validate({
			rules:
			{
				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				featured: {
					required: true
				},

				state: {
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

				featured: {
					required: 'Seleccione una opción.'
				},

				state: {
					required: 'Seleccione una opción.'
				},

				image: {
					required: 'Seleccione una imagen.'
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

				featured: {
					required: true
				},

				state: {
					required: true
				}
			},
			messages:
			{
				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				featured: {
					required: 'Seleccione una opción.'
				},

				state: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='banner']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Noticias Create
	$("button[action='new']").on("click",function(){
		$("#formNewCreate").validate({
			rules:
			{
				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				summary: {
					required: true,
					minlength: 2,
					maxlength: 16770000
				},

				content: {
					required: true,
					minlength: 2,
					maxlength: 16770000
				},
				
				comments: {
					required: true
				},

				featured: {
					required: false
				},

				state: {
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

				summary: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				content: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				comments: {
					required: 'Seleccione una opción.'
				},

				state: {
					required: 'Seleccione una opción.'
				},

				image: {
					required: 'Seleccione una imagen.'
				}
			},
			submitHandler: function(form) {
				$("button[action='new']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Noticias Edit
	$("button[action='new']").on("click",function(){
		$("#formNewEdit").validate({
			rules:
			{
				title: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				summary: {
					required: true,
					minlength: 2,
					maxlength: 16770000
				},

				content: {
					required: true,
					minlength: 2,
					maxlength: 16770000
				},

				comments: {
					required: true
				},


				featured: {
					required: false
				},

				state: {
					required: true
				},
			},
			messages:
			{
				title: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				summary: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				content: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				comments: {
					required: 'Seleccione una opción.'
				},

				state: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='new']").attr('disabled', true);
				form.submit();
			}
		});
	});


		// Actividades Create
	$("button[action='activity']").on("click",function(){
		$("#formActivityCreate").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lang: {
					required: true
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='activity']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Actividades Edit
	$("button[action='activity']").on("click",function(){
		$("#formActivityEdit").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lang: {
					required: true
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='activity']").attr('disabled', true);
				form.submit();
			}
		});
	});

	$("button[action='attention']").on("click",function(){
		$("#formAttentionCreate").validate({
			rules:
			{
				attention: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lang: {
					required: true
				}
			},
			messages:
			{
				attention: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='attention']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// attentions Edit
	$("button[action='attention']").on("click",function(){
		$("#formAttentionEdit").validate({
			rules:
			{
				attention: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lang: {
					required: true
				}
			},
			messages:
			{
				attention: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='attention']").attr('disabled', true);
				form.submit();
			}
		});
	});

	$("button[action='category']").on("click",function(){
		$("#formCategoryCreate").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lang: {
					required: true
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='category']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// categorys Edit
	$("button[action='category']").on("click",function(){
		$("#formCategoryEdit").validate({
			rules:
			{
				name: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				lang: {
					required: true
				}
			},
			messages:
			{
				name: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='category']").attr('disabled', true);
				form.submit();
			}
		});
	});


	$("button[action='excursion']").on("click",function(){
		$("#formExcursionCreate").validate({
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
				
				lang: {
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

				lang: {
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

	// Noticias Edit
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

				lang: {
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

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='excursion']").attr('disabled', true);
				form.submit();
			}
		});
	});

	$("button[action='galery']").on("click",function(){
		$("#formGaleryCreate").validate({
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
					maxlength: 16770000
				},
				
				lang: {
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

				lang: {
					required: 'Seleccione una opción.'
				},

				image: {
					required: 'Seleccione una imagen.'
				}
			},
			submitHandler: function(form) {
				$("button[action='galery']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Galery Edit
	$("button[action='galery']").on("click",function(){
		$("#formGaleryEdit").validate({
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
					maxlength: 16770000
				},

				lang: {
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

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='galery']").attr('disabled', true);
				form.submit();
			}
		});
	});

		$("button[action='home']").on("click",function(){
		$("#formHomeCreate").validate({
			rules:
			{
				title_one: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				title_two: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				title_three: {
					required: true,
					minlength: 2,
					maxlength: 191
				},
				
				lang: {
					required: true
				},

				image: {
					required: true
				}
			},
			messages:
			{
				title_one: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				title_two: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				title_three: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lang: {
					required: 'Seleccione una opción.'
				},

				image: {
					required: 'Seleccione una imagen.'
				}
			},
			submitHandler: function(form) {
				$("button[action='home']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Galery Edit
	$("button[action='home']").on("click",function(){
		$("#formHomeEdit").validate({
			rules:
			{
				title_one: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				title_two: {
					required: true,
					minlength: 2,
					maxlength: 191
				},

				title_three: {
					required: true,
					minlength: 2,
					maxlength: 191
				},
				
				lang: {
					required: true
				},
			},
			messages:
			{
				title_one: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				title_two: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				title_three: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				lang: {
					required: 'Seleccione una opción.'
				},

				image: {
					required: 'Seleccione una imagen.'
				}
			},
			submitHandler: function(form) {
				$("button[action='home']").attr('disabled', true);
				form.submit();
			}
		});
	});

	$("button[action='office']").on("click",function(){
		$("#formOfficeCreate").validate({
			rules:
			{
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

				address: {
					required: false,
					minlength: 5,
					maxlength: 15
				}
			},
			messages:
			{
				email: {
					email: 'Introduce una dirección de correo valida.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				phone: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				address: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='office']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// categorys Edit
	$("button[action='office']").on("click",function(){
		$("#formOfficeEdit").validate({
			rules:
			{
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

				address: {
					required: false,
					minlength: 5,
					maxlength: 15
				}
			},
			messages:
			{
				email: {
					email: 'Introduce una dirección de correo valida.',
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				phone: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				address: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				}
			},
			submitHandler: function(form) {
				$("button[action='office']").attr('disabled', true);
				form.submit();
			}
		});
	});

		$("button[action='reservation']").on("click",function(){
		$("#formReservationCreate").validate({
			rules:
			{
				reservation: {
					required: true,
					minlength: 5,
					maxlength: 191
				},

				type: {
					required: true
				},

				lang: {
					required: true
				}
			},
			messages:
			{
				reservation: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				type: {
					required: 'Seleccione una opción.'
				},

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='reservation']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// categorys Edit
	$("button[action='reservation']").on("click",function(){
		$("#formReservationEdit").validate({
			rules:
			{
				reservation: {
					required: true,
					minlength: 5,
					maxlength: 191
				},

				type: {
					required: true
				},

				lang: {
					required: true
				}
			},
			messages:
			{
				reservation: {
					minlength: 'Escribe mínimo {0} caracteres.',
					maxlength: 'Escribe máximo {0} caracteres.'
				},

				type: {
					required: 'Seleccione una opción.'
				},

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='reservation']").attr('disabled', true);
				form.submit();
			}
		});
	});

		$("button[action='transfer']").on("click",function(){
		$("#formTransferCreate").validate({
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
				
				lang: {
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

				lang: {
					required: 'Seleccione una opción.'
				},

				image: {
					required: 'Seleccione una imagen.'
				}
			},
			submitHandler: function(form) {
				$("button[action='transfer']").attr('disabled', true);
				form.submit();
			}
		});
	});

	// Noticias Edit
	$("button[action='transfer']").on("click",function(){
		$("#formTransferEdit").validate({
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

				lang: {
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

				lang: {
					required: 'Seleccione una opción.'
				}
			},
			submitHandler: function(form) {
				$("button[action='transfer']").attr('disabled', true);
				form.submit();
			}
		});
	});



});