<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Place Me! | {{ Request::route()->uri  }} </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="Portal operativo para Place Me!" />
	<meta name="keywords" content="admin,dashboard, place me" />
	<meta name="author" content="giganube" />

	@yield('native-styles')

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
		@stack('scripts')
		@livewireScripts
	</body>
</html>