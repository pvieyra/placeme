<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Title -->
		<title>Place Me | Login </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<meta charset="UTF-8">
		<meta name="description" content="Responsive Admin Place Me"/>
		<meta name="keywords" content="admin,dashboard"/>
		<meta name="author" content="giganube"/>

		<!-- Styles -->
		<link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}"/>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="{{ asset('plugins/metrojs/MetroJs.min.css') }}" rel="stylesheet">
		<link href="{{ asset('plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet">

		<!-- Theme Styles -->
		<link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
<body class="signin-page">
	<div class="loader-bg"></div>
		<div class="loader">
	<div class="preloader-wrapper big active">
		<div class="spinner-layer spinner-blue">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<div class="spinner-layer spinner-red">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<div class="spinner-layer spinner-yellow">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
		<div class="spinner-layer spinner-green">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
	</div>
</div>
		<div class="mn-content valign-wrapper">
	<main class="mn-inner container">
		<div class="valign">
			<div class="row">
				<div class="col s12 m6 l4 offset-l4 offset-m3">
					<div class="card white darken-1">
						<div class="card-content ">
							<span class="card-title">{{ __('Inicia Sesion') }}</span>
							<div class="row">
								<form class="col s12" method="POST" action="{{ route('login') }}">
									@csrf
									<div class="input-field col s12">
										<input id="email" type="email" name="email" class="validate @error('email') invalid @enderror" value="{{ old('email') }}">
										<label for="email">{{ __('Correo Electronico')}}</label>
										@error('email')
											<label id="firstName-error" class="error" for="firstName">{{ $message }}</label>
										@enderror
									</div>
									<div class="input-field col s12">
										<input id="password" type="password" name="password" class="validate @error('password') invalid @enderror">
										<label for="password">Contraseña</label>
										@error('password')
										<label id="firstName-error" class="error" for="firstName">{{ $message }}</label>
										@enderror
									</div>
									<div class="col s12 right-align m-t-sm">
										<button type="submit"  class="waves-effect waves-light btn teal">Iniciar sesión</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

		<!-- Javascripts -->
		<script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
		<script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
		<script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
		<script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
		<script src="{{ asset('js/alpha.min.js')}}"></script>

	</body>
</html>