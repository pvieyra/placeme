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
            <span class="card-title">Seguimientos<span class="secondary-title">Aqui puedes encontrar los seguimientos de tus clientes.</span></span>
            <div class="divider"></div>
            Buscar seguimientos:

        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <table class="responsive-table bordered striped">
            <thead>
            <tr>
              <th>ID</th>
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
                  <td>{{ $tracking->customer->name }}</td>
                  <td>{{ $tracking->building->complete_address }}</td>
                  <td>
                    <span class="badge blue">{{ $tracking->state->name }} </span>
                  </td>
                  <td>
                    {{ $tracking->created_at->format('d/m/Y') }}
                  </td>
                  <td>
                     {{ $tracking->comments->last()->created_at->format('d/m/Y') }}
                  </td>
                  <td>
                    <a href="#" class="btn">Ver</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $trackings->links() }}
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