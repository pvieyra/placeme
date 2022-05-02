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
      <div class="card">
        <div class="card-content">
            <span class="card-title">Seguimientos<span class="secondary-title">Se muestran los seguimientos de los asesores.</span></span>
            <div class="divider"></div>
            Buscar seguimientos:
          <form action="{{ route('trackings.index-admin') }}">
            <input class="col-lg-6" type="text" name="customer_name" value="{{old('customer_name')}}" placeholder="Nombre del cliente">
            <input class="col-lg-6" type="text" name="asesor_account" value="{{ old('asesor_account') }}"  placeholder="Cuenta del asesor o nombre">
            <input class="col-lg-6" type="text" name="address_name" value="{{ old('address_name') }}" placeholder="Direccion de la propiedad">
            <input class="col-lg-6" type="text" name="suburb_name" value="{{ old('suburb_name') }}" placeholder="Colonia">
            <input class="col-lg-6" type="date" name="start_date" value="{{ old('start_date') }}" placeholder="Fecha inicial">
            <input class="col-lg-6" type="date" name="end_date" value="{{ old('end_date') }}" placeholder="Fecha final">
            <select class="browser-default" name="state">
              <option value="" disabled="" selected="">Elige un estado del seguimiento</option>
              @foreach($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
              @endforeach
            </select>
            <br>
            <input class="btn blue" type="submit" value="Buscar">
          </form>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <table class="responsive-table bordered striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Asesor</th>
              <th>Cliente</th>
              <th>Propiedad</th>
              <th>Estado</th>
              <th>Fecha de creacion</th>
              <th>Ultima modificacion</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach( $trackings as $tracking)
                <tr>
                  <td>#{{ $tracking->id }}</td>
                  <td>{{ $tracking->user_email }}</td>
                  <td>{{ $tracking->cliente }}</td>
                  <td>{{ $tracking->direccion }}</td>
                  <td>
                    <span class="badge {{ $tracking->color }}">{{ $tracking->estado }} </span>
                  </td>
                  <td>
                    {{ $tracking->creado }}
                  </td>
                  <td>
                     {{ $tracking->actualizado }}
                  </td>
                  <td>
                    <a href="{{ route('trackings.show', $tracking->id) }}" class="waves-effect waves-light btn orange m-b-xs">Ver</a>
                  </td>
                </tr>
              @endforeach
            </tbody>

          </table>
          {{ $trackings->links() }}
          <small class="small"> Mostrando {{ $trackings->count() }} de {{ $trackings->total() }} registros.</small>
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
  <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
  <script src="{{ asset('js/alpha.min.js')}}"></script>
@endsection
@push('scripts')
  <script>
  </script>
@endpush