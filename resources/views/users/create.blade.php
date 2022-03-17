@extends('layouts.app')

@section('content')
 <livewire:users.create />
@endsection

@section('native-scripts')
  <script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
  <script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
  <script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
  <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
  <script src="{{ asset('js/alpha.min.js')}}"></script>
  <script src="{{ asset('js/pages/form_elements.js')}}"></script>
@endsection