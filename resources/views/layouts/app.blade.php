<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Place Me! | {{ Request::route()->uri  }} </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta charset="UTF-8">
	<meta name="description" content="Portal operativo para Place Me!" />
	<meta name="keywords" content="admin,dashboard, place me" />
	<meta name="author" content="giganube" />

	<!-- Styles -->
	<link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}"/>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="{{ asset('plugins/metrojs/MetroJs.min.css') }}" rel="stylesheet">
	<link href="{{ asset('plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ mix('css/app.css') }}" rel="stylesheet">
	<!-- Theme Styles -->
	<link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- LIVEWIRE -->
	@livewireStyles

</head>
<body id="app">
	{{-- carga de loader--}}
	@include('template.loader')

	<div class="mn-content fixed-sidebar">

		<!-- Header -->
		@include('template.header')
		<!-- Right Menu -->
		@include('template.left-menu')
		<!-- ./ End Right Menu -->

		<main class="mn-inner">
			@yield('content')
		</main>
		<!-- footer -->
		<div class="page-footer">
		<div class="footer-grid container">
			<div class="footer-l white">&nbsp;</div>
			<div class="footer-grid-l white">
			</div>
			<div class="footer-r white">&nbsp;</div>
			<div class="footer-grid-r white">

			</div>
		</div>
	</div>
		<!-- footer -->
	</div>
	<div class="left-sidebar-hover"></div>
	<!-- Javascripts -->

		@yield('native-scripts')
		@livewireScripts

	</body>
</html>