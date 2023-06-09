@extends('layouts.app')
@section('native-styles')
  <!-- Styles -->
  <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css')}}"/>
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('plugins/material-preloader/css/materialPreloader.min.css')}}" rel="stylesheet">

  <!-- Theme Styles -->
  <link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
  <div class="flex justify-center mx-auto p-4 max-w-4wl rounded shadow mb-4">
    @livewire('contact')
  </div>
@endsection

@section('native-scripts')
  <script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
  <script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
  <script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
  <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
  <script src="{{ asset('plugins/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('plugins/counter-up-master/jquery.counterup.min.js')}}"></script>
  <script src="{{ asset('js/alpha.min.js')}}"></script>
@endsection