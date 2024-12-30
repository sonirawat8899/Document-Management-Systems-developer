<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
<link rel="icon" href="{{ asset('admin/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('admin/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../admin/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<script>
		setTimeout(function() {
			$('.alert').fadeOut('fast');
		}, 5000);
	</script>
	<style>
		.action-icons{
			margin-left: 10px;
		}
		td.action_td {
			padding: 0px !important;
		}
		td.action_td a{
			padding: 7px !important;
		}
	</style>
	<!-- ckeditor library for discription-->
       <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('admin/css/atlantis.min.css')}}">
	<link rel="stylesheet" href="{{ asset('admin/css/fonts.min.css')}}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('admin/css/demo.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
	
	<div class="wrapper">
		@include('elements.company.header')
		<div class="main-panel">
			@yield('content')
		</div>
		@include('elements.company.footer')
    </div>
</body>
</html>
