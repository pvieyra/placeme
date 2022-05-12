@extends('layouts.app')

@section('native-styles')
  <!-- Styles -->
  <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}"/>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  {{--	<link href="{{ asset('plugins/metrojs/MetroJs.min.css') }}" rel="stylesheet">--}}
  <link href="{{ asset('plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet">

  <!-- Styles -->
  {{--<link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
  <!-- Theme Styles -->
  <link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
  <main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
      @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
             role="alert">
          {{ session('status') }}
        </div>
      @endif
      <livewire:links.index />
    </div>
  </main>
@endsection

@section('native-scripts')
  <script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
    <script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
    <script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
    <script src="{{ asset('js/alpha.min.js')}}"></script>
@endsection