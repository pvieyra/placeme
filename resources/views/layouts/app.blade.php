<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Title -->
	<title>Place Me! | {{ Route::currentRouteName() }} </title>
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
	<div class="loader-bg"></div>
	<div class="loader">
	<div class="preloader-wrapper big active">
		<div class="spinner-layer spinner-blue">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div><div class="gap-patch">
				<div class="circle"></div>
			</div><div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<div class="spinner-layer spinner-teal lighten-1">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div><div class="gap-patch">
				<div class="circle"></div>
			</div><div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<div class="spinner-layer spinner-yellow">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div><div class="gap-patch">
				<div class="circle"></div>
			</div><div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<div class="spinner-layer spinner-green">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div><div class="gap-patch">
				<div class="circle"></div>
			</div><div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
	</div>
</div>
	<div class="mn-content fixed-sidebar">

		<!-- Header -->
		@include('template.header')
		<!-- Right Menu -->
		@include('template.right-menu')
		<!-- ./ End Right Menu -->

		<main class="mn-inner">
			<div class="row">
				<div class="col s12">
					<div class="page-title">
						@yield('content')
					</div>
				</div>
			</div>
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
	<script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
	<script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
	<script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
	<script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
	<script src="{{ asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
	<script src="{{ asset('plugins/counter-up-master/jquery.counterup.min.js')}}"></script>
	<script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{ asset('plugins/chart.js/chart.min.js')}}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.min.js')}}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.time.min.js')}}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.symbol.min.js')}}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.resize.min.js')}}"></script>
	<script src="{{ asset('plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
	<script src="{{ asset('plugins/curvedlines/curvedLines.js')}}"></script>
	<script src="{{ asset('plugins/peity/jquery.peity.min.js')}}"></script>
	<script src="{{ asset('js/alpha.min.js')}}"></script>

	@livewireScripts

	</body>
</html>