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
      <div class="subtitle-text col s12">
        <h6>Ficha del cliente</h6>
        <small>Seguimiento</small>
        <div class="divider-custom"></div>
      </div>
    </div>
    <div class="row">
      <!-- Ficha del cliente -->
      <div class="card blue-grey lighten-5">
        <div class="card-content row">
          <div class="card-customer col s12 m6 l8">
            <div class="info-tracking personal-customer-name valign-wrapper">
              <i class="material-icons md-24">assignment</i>ID: {{ $tracking->id }}
            </div>
            <div class="info-tracking personal-customer-name valign-wrapper">
             <i class="material-icons md-24">face</i> {{ $tracking->customer->complete_name }}
            </div>
            <div class="info-tracking personal-customer-phone valign-wrapper">
              <i class="material-icons md-24">call</i> {{ $tracking->customer->phone }}
            </div>
            <div class="info-tracking personal-customer-mail valign-wrapper">
              <i class="material-icons md-24">email</i> {{ $tracking->customer->email }}
            </div>
            <div class="info-tracking personal-customer-building valign-wrapper">
              <i class="material-icons md-24">business</i>  {{ $tracking->building->complete_address }}
            </div>
            <div class="info-tracking personal-customer-building valign-wrapper">
              <i class="material-icons md-24">home</i>  {{ $tracking->numero_interior_unidad}}
            </div>
            <div class="info-tracking personal-customer-building valign-wrapper">
              <i class="material-icons md-24">info_outline</i> Tipo de contacto: <span class="txt-orange"> {{ $tracking->contact_type}} </span>
            </div>
            @if($tracking->contact_type == 'Otra Inmobiliaria')
              <div class="info-otra-inmobiliaria">
                <div class="info-tracking personal-customer-building valign-wrapper">
                  <i class="material-icons md-24">group</i> <i>Inmobiliaria: </i> <span class="txt-green-1"> {{ $tracking->inmobiliaria_name }}</span>
                </div>
                <div class="info-tracking personal-customer-building valign-wrapper">
                  <i class="material-icons md-24">portrait</i> <i>Asesor: </i>  <span class="txt-green-1">{{ $tracking->nombre_asesor }}</span>
                </div>
                <div class="info-tracking personal-customer-building valign-wrapper">
                  <i class="material-icons md-24">phone_iphone</i> <i>Celular: </i> <span class="txt-green-1"> {{ $tracking->celular_asesor }}</span>
                </div>
              </div>
            @endif
          </div>
          <div class="card-tracking col s12 m6 l4">
            <div class="info-tracking info-status-tracking">
              <span class="badge-tracking {{ $tracking->state->color }}">{{ $tracking->state->name }}</span>
            </div>
            <div class="info-tracking info-date-tracking col s6">
              <small>Fecha de creacion:</small>
              <p class="valign-wrapper"><i class="material-icons icon-sm">date_range</i>{{ $tracking->created_at->format('d/m/Y H:m:s') }}</p>
            </div>
            <div class="info-tracking info-date-tracking col s6 ">
              <small>Fecha del seguimiento:</small>
              <p class="valign-wrapper"><i class="material-icons icon-sm">date_range</i>{{ $tracking->updated_at->format('d/m/Y H:m:s') }}</p>
            </div>
            <div class="info-tracking change-status-tracking col s12">
              <form action="">
                @php
                    $states = $tracking->state->loadStates($tracking->state_id)
                @endphp
                <label for="">Cambiar Estado</label>
                <select class="browser-default blue-grey lighten-3">
                  <option value="" disabled="" selected="">- selecciona un estado -</option>
                  @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                  @endforeach
                </select>
                <input type="submit" class="btn waves-effect waves-light m-t-sm orange" value="Cambiar">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /. Ficha del cliente -->
    </div>
    <div class="row">
      <div class="subtitle-text col s12">
        <h6>Agregar comentarios</h6>
        <small>Añade un nuevo comentario al seguimiento.</small>
        <div class="divider-custom"></div>
      </div>
    </div>
    <div class="row m-b-lg">
      <div class="col s12">
        <form action="">
          <input class="browser-default" type="text" placeholder="Asunto">
          <textarea class="textarea-style" name="comment" id="" cols="30" rows="100"></textarea>
          <input type="file" name="file-comment" multiple>
          <p>
            <input type="submit" class="btn waves-effect waves-light m-t-sm orange" value="Guardar">
          </p>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="subtitle-text col s12">
        <h6>Historial del seguimiento</h6>
        <small>Comentarios y archivos</small>
        <div class="divider-custom"></div>
      </div>
    </div>
    <!-- comentario -->
    <div class="row">
      <div class="card blue-grey lighten-5">
        <div class="card-content">
          <div class="tracking-comments">
            <div class="comments">
              <div class="comments-dash">
                <div class="info-tracking info-status-tracking">
                  Estado: <span class="badge-tracking {{$tracking->comments->last()->state->color }}"> {{$tracking->comments->last()->state->name }}</span>
                </div>
              </div>
              <div class="comments-date">
                <small>Fecha de creacion:</small>
                <p class="valign-wrapper">
                  <i class="material-icons icon-sm">date_range</i>{{$tracking->comments->last()->created_at->format('d/m/Y H:m:s') }}
                </p>
              </div>
              <p class="comments-title">{{ $tracking->comments->last()->subject }}</p>
              <p class="comments-info comments-dash">
                {{ $tracking->comments->last()->comments }}
              </p>
            </div>
            <div class="tracking-files m-t-lg">
              <span class="pink-text lighten-1">No tiene archivos adjuntos</span>
            </div>
          </div>
        </div>
      </div>
      <div class="historial-comments">
        <a href="" class="waves-effect waves-light btn indigo m-b-xs">Historial de comentarios</a>
      </div>
    </div>
    <!-- ./ comentario -->
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