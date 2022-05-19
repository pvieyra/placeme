@extends('layouts.app')

@section('native-styles')
  <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}" />
  <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="{{ asset('plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
  <div>
    <div class="card">
      <div class="card-content">
        <div class="card-title">Reporte de asesores</div>
        <form action="{{ route('export-report-user-trackings') }}" method="GET">
          <div class="row">
            <div class="col s12 m6">
              <label for="account_users">Asesor</label>
              <select class="js-states browser-default required auto-select" tabindex="-1" style="width: 100%" id="account_users" name="account_user" >
              </select>
            </div>
          </div>
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@push('scripts')
  <script>
      const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $(document).ready(function() {
          $('#account_users').select2({
              placeholder: "Selecciona un usuario",
              ajax: {
                  url: '{{ route('users.select')}}',
                  type: 'POST',
                  dataType: 'json',
                  delay:500,
                  data: function( params ){
                      return{
                          _token: CSRF_TOKEN,
                          search: params.term
                      }
                  },
                  processResults: function(data) {
                      return {
                          results: $.map(data, function(obj) {
                              return {
                                  id: obj.id,
                                  text: "Cuenta: " + obj.email + " | Nombre: " + obj.user_name,
                              };
                          })
                      };
                  },
                  cache: true
              }
          });

      });
  </script>
@endpush