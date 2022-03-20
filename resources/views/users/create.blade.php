@extends('layouts.app')

@section('native-styles')
  <!-- Styles -->
  <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css')}}"/>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('plugins/material-preloader/css/materialPreloader.min.css')}}" rel="stylesheet">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <!-- Theme Styles -->
  <link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
 <livewire:users.create />
@endsection

@section('native-scripts')
  <script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
  <script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
  <script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
  <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
  <script src="{{ asset('js/alpha.min.js')}}"></script>
  <script src="{{ asset('plugins/google-code-prettify/prettify.js')}}"></script>
  <script src="{{ asset('js/pages/form_elements.js')}}"></script>
@endsection

