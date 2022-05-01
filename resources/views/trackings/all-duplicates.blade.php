@extends('layouts.app')

@section('native-styles')
  <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}" />
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="{{ asset('plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
  <div>
    <div class="all-duplicates">
      <!-- buscador de seguimientos -->
      <div class="row">
        <livewire:trackings.search-duplicates-trackings/>
      </div>
      <!-- showing trackings -->
      <div class="row">
        <livewire:trackings.all-duplicates />
      </div>
      <div class="row">
        <livewire:trackings.show-duplicate-tracking />
      </div>
    </div>
  </div>
@endsection
@section('native-scripts')
  <!-- Javascripts -->
  <script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
  <script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
  <script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
  <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
  <script src="{{ asset('js/alpha.min.js')}}"></script>
@endsection
@push('scripts')

@endpush