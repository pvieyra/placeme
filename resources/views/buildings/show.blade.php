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
    <div class="row">
      <div class="col s12 m4 l3">
        <div class="card">
          <div class="card-content ">
            <span class="card-title">Propiedad</span>
            <address>
              <span class="building-name">{{ $building->address }}</span><br>
              {{ $building->suburb }}<br>
              Int.{{ $building->int_number }}<br>
              {{ $building->municipality }} CP: {{ $building->zip }}<br>
              Codigo: {{ $building->building_code }} <br>
              ID:  <span class="building-id">{{ $building->id }}<br></span>
            </address>
          </div>
        </div>

        <!-- componente -->
        <div class="card">
          <livewire:buildings.change-active  :building="$building"/>
        </div>
        <!-- componente -->
      </div>

      <div class="col s12 l9">
        <div class="card">
          <livewire:buildings.search-buildings />
        </div>
        <div class="card">
         <livewire:buildings.building-trackings :building="$building"/>
        </div>
      </div>


    </div>

  </div>
@endsection
@section('native-scripts')
  <!-- Javascripts -->
  <script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
  <script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
  <script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
  <script src="{{ asset('js/alpha.min.js')}}"></script>
@endsection
@push('scripts')
@endpush