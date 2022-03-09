<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
	<div id="app">
		<header class="bg-blue-900 py-6">
			<div class="container mx-auto flex justify-between items-center px-6">
				<div>
					<a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
						{{ config('app.name', 'Laravel') }}
					</a>
				</div>

				{{-- ADD THIS NAVIGATION OPTION --}}
				@auth
					<div class="w-full block flex-grow-lg:flex lg:items-center lg:w-auto">
						<div class="text-sm lg:flex-grow ml3">
							<a href="{{ route('projects.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
								{{ __("Proyectos") }}
							</a>
						</div>
					</div>
				@endauth


				<nav class="space-x-4 text-gray-300 text-sm sm:text-base">
					@guest
						<a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
						@if (Route::has('register'))
								<a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
						@endif
					@else
						<span>{{ Auth::user()->name }}</span>

						<a href="{{ route('logout') }}"
							 class="no-underline hover:underline"
							 onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
								{{ csrf_field() }}
						</form>
					@endguest
				</nav>
			</div>
		</header>

		@if(session("success"))
			<div class="container mx-auto mt-5">
				<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3">
					<div class="flex">
						<div class="py-1">
							<svg class="fill-current h-6 w-6 text-teal-500 mr-4"></svg>
						</div>
						<div>
							<p class="font-bold">{{ __("Nuevo mensaje") }}</p>
							<p class="text-sm">{{ session("success") }}</p>
						</div>
					</div>
				</div>
			</div>
		@endif

		<div class="container mx-auto px4">
			@yield('content')
		</div>

	</div>
</body>
</html>
