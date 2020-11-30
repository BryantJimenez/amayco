<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>

	{{-- <link rel="icon" href="{{ asset('/auth/images/icons/favicon.ico') }}" type="image/x-icon" /> --}}

	@yield('links')

	<!-- Style CSS -->
	<link href="{{ asset('/web/css/style.css') }}" rel="stylesheet">
	<!-- Style CSS -->
	<!-- Font Awesome -->
	<link href="{{ asset('/web/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('/web/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body class="goto-here bg-white">

	@include('web.partials.navbar')

	@yield('content')

	@include('web.partials.footer')
	
	@include('web.partials.loader')

	<script src="{{ asset('/web/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('/web/js/popper.min.js') }}"></script>
	<script src="{{ asset('/web/js/bootstrap.min.js') }}"></script>

	@yield('scripts')

	<!-- Scripts -->
	<script type="text/javascript" src="{{ asset('/web/js/script.js') }}"></script>
</body>
</html>