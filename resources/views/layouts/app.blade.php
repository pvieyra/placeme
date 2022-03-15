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
	<header class="mn-header navbar-fixed">
		<nav class="orange darken-1">
			<div class="nav-wrapper row">
				<section class="material-design-hamburger navigation-toggle">
					<a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
						<span class="material-design-hamburger__layer"></span>
					</a>
				</section>
				<div class="header-title col s3 m3">
					<span class="chapter-title">Place Me!</span>
				</div>

				<ul class="right col s9 m3 nav-right-menu">
					<li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i><span class="badge">4</span></a></li>
				</ul>

				<ul id="dropdown1" class="dropdown-content notifications-dropdown">
					<li class="notificatoins-dropdown-container">
						<ul>
							<li class="notification-drop-title">Today</li>
							<li>
								<a href="#!">
									<div class="notification">
										<div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
										<div class="notification-text"><p><b>Alan Grey</b> uploaded new theme</p><span>7 min ago</span></div>
									</div>
								</a>
							</li>
							<li>
								<a href="#!">
									<div class="notification">
										<div class="notification-icon circle deep-purple"><i class="material-icons">cached</i></div>
										<div class="notification-text"><p><b>Tom</b> updated status</p><span>14 min ago</span></div>
									</div>
								</a>
							</li>
							<li>
								<a href="#!">
									<div class="notification">
										<div class="notification-icon circle red"><i class="material-icons">delete</i></div>
										<div class="notification-text"><p><b>Amily Lee</b> deleted account</p><span>28 min ago</span></div>
									</div>
								</a>
							</li>
							<li>
								<a href="#!">
									<div class="notification">
										<div class="notification-icon circle cyan"><i class="material-icons">person_add</i></div>
										<div class="notification-text"><p><b>Tom Simpson</b> registered</p><span>2 hrs ago</span></div>
									</div>
								</a>
							</li>
							<li>
								<a href="#!">
									<div class="notification">
										<div class="notification-icon circle green"><i class="material-icons">file_upload</i></div>
										<div class="notification-text"><p>Finished uploading files</p><span>4 hrs ago</span></div>
									</div>
								</a>
							</li>
							<li class="notification-drop-title">Yestarday</li>
							<li>
								<a href="#!">
									<div class="notification">
										<div class="notification-icon circle green"><i class="material-icons">security</i></div>
										<div class="notification-text"><p>Security issues fixed</p><span>16 hrs ago</span></div>
									</div>
								</a>
							</li>
							<li>
								<a href="#!">
									<div class="notification">
										<div class="notification-icon circle indigo"><i class="material-icons">file_download</i></div>
										<div class="notification-text"><p>Finished downloading files</p><span>22 hrs ago</span></div>
									</div>
								</a>
							</li>
							<li>
								<a href="#!">
									<div class="notification">
										<div class="notification-icon circle cyan"><i class="material-icons">code</i></div>
										<div class="notification-text"><p>Code changes were saved</p><span>1 day ago</span></div>
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>

		<!-- Right Menu -->
		<aside id="slide-out" class="side-nav white fixed">
			<div class="side-nav-wrapper">
			<div class="sidebar-profile">
				<div class="sidebar-profile-image">
					<img src="{{ asset('images/profile-image.png')}}" class="circle" alt="">
				</div>
				<div class="sidebar-profile-info">
					<a href="javascript:void(0);" class="account-settings-link">
						<p>{{ Auth::user()->name }}</p>
						<span>{{ Auth::user()->email }}<i class="material-icons right">arrow_drop_down</i></span>
					</a>
				</div>
			</div>
			<div class="sidebar-account-settings">
				<ul>
					<li class="no-padding">
						<a class="waves-effect waves-grey"><i class="material-icons">done</i>Sent Mail</a>
					</li>
					<li class="no-padding">
						<a class="waves-effect waves-grey"><i class="material-icons">history</i>History<span class="new grey lighten-1 badge">3 new</span></a>
					</li>
					<li class="divider"></li>
					<li class="no-padding">
						<a href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();" class="waves-effect waves-grey">
							<i class="material-icons">exit_to_app</i>
							{{ __('Cerrar Sesión')}}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
			</div>
			<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
				<li class="no-padding active"><a class="waves-effect waves-grey active" href="index.html">
						<i class="material-icons">settings_input_svideo</i>
						Dashboard
					</a>
				</li>
				<li class="no-padding">
					<a class="waves-effect waves-grey" href="charts.html"><i class="material-icons">trending_up</i>Charts</a>
				</li>
			</ul>
			<div class="footer">
				<p class="copyright">giganube ©</p>
			</div>
		</div>
		</aside>
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
				<a class="footer-text" href="mailbox.html">
					<i class="material-icons arrow-r">arrow_forward</i>
					<span class="direction">Next</span>
					<div>
						Mailbox app
					</div>
				</a>
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
	<script src="{{ asset('js/pages/dashboard.js')}}"></script>

	@livewireScripts

	</body>
</html>