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
    <div class="card">
      <div class="card-content">
        <div class="card-title">Seguimientos</div>
        <form action="{{ route('export-report-trackings') }}" method="GET">
          <div class="row">
            <div class="col s12 m6">
              <label> Selecciona un estado</label>
              <select class="browser-default" name="state_tracking">
                <option value=""  selected=""> Todos </option>
                @foreach( $states as $state )
                  <option value="{{ $state->id }}"> {{ $state->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col s12 m6">
              <label> Tipo de operacion </label>
              <select class="browser-default" name="operation_tracking">
                <option value=""  selected=""> Todos </option>
                @foreach( $operations as $operation )
                  <option value="{{ $operation->id }}"> {{ $operation->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6">
              <label for="">Fecha Inicial</label>
              <input class="browser-default" type="date" name="start_date" placeholder="Fecha Inicial">
            </div>
            <div class="col s12 m6">
              <label for="">Fecha final</label>
              <input class="browser-default" type="date" name="end_date" placeholder="Fecha Final">
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6">
              <label for="">Activo</label>
              <select class="browser-default" name="active_tracking">
                <option value="" selected=""> Todos </option>
                  <option value="a"> Activo</option>
                  <option value="i"> Inactivo</option>
              </select>
            </div>

          </div>

          <input class="btn blue" type="submit" value="Crear">
        </form>
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