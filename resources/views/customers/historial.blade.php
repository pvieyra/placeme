@extends('layouts.app')

@section('native-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}"/>
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="{{ asset('plugins/weather-icons-master/css/weather-icons.min.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="row">
        <div class="card padding-5">
            <span class="">Seguimientos</span>
            <span class="secondary-title">
                Se muestran todos los cambios que se han hecho en este contacto.
            </span>
            <table class="responsive-table striped padding-5">
                <thead>
                <tr class="">
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Fecha de creación</th>
                </tr>
                </thead>
                <tbody>
                    @foreach( $customer->histories  as $customerHistorial )
                        <tr class="">
                            <td>{{ $customerHistorial->name }}</td>
                            <td>{{ $customerHistorial->last_name }}</td>
                            <td>{{ $customerHistorial->second_last_name }}</td>
                            <td>{{ $customerHistorial->email }}</td>
                            <td>{{ $customerHistorial->phone }}</td>
                            <td>{{ $customerHistorial->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="btn green margin-top-2" href="{{ route("customer.edit", $customer ) }}" >
                Regresar
            </a>
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
