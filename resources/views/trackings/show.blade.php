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
      @if( $tracking->active === 0)
        <div class="card red lighten-1 success-comments">
          <p class="thin valign-wrapper">
            <i class="material-icons">info</i>
            <i> Este seguimiento esta desactivado.</i>
          </p>
        </div>
      @endif
      @if( $tracking->isDateTrackingActive() === false)
        <div class="card red lighten-1 success-comments">
          <p class="thin valign-wrapper">
            <i class="material-icons">info</i>
            <i> Han pasado mas de 60 dias desde cualquier actualización de comentarios por lo que el seguimiento ha sido desactivado.</i>
          </p>
        </div>
      @endif
      @if(session('success'))
        <div class="card teal lighten-1 success-comments">
          <p class="thin valign-wrapper">
            <i class="material-icons">info</i>
            <i> El comentario ha sido guardado correctamente</i>
          </p>
        </div>
      @endif
        @if( session('error') )
          <div class="card red lighten-1 error-comments">
            <p class="thin"> <i class="material-icons">info</i> <i>{{ session('error')}}</i></p>
          </div>
        @endif
      @error('subject')
        <div class="card red lighten-1 error-comments">
          <p class="thin valign-wrapper"> <i class="material-icons">info</i> <i>Debes colocar un asunto para el comentario.</i></p>
        </div>
      @enderror
      @error('comment')
      <div class="card red lighten-1 error-comments">
        <p class="thin valign-wrapper"> <i class="material-icons">info</i>Debes colocar un comentario.</p>
      </div>
      @enderror
        @error('files.*')
        <div class="card red lighten-1 error-comments">
          <p class="thin valign-wrapper"> <i class="material-icons">info</i> Los archivos sobrepasan un peso de 10mb, porfavor elige otros archivos.</p>
        </div>
        @enderror
    </div>
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
              <i class="material-icons md-24">call</i> {{ $tracking->customer->phone_customer }}
            </div>
            <div class="info-tracking personal-customer-mail valign-wrapper">
              <i class="material-icons md-24">email</i> <a href="mailto:{{ $tracking->customer->email }}">{{ $tracking->customer->email }}</a>
            </div>
            <div class="info-tracking personal-customer-building valign-wrapper">
              <i class="material-icons md-24">business</i>  {{ $tracking->building->complete_address }}
            </div>
            <div class="info-tracking personal-customer-building valign-wrapper">
              <i class="material-icons md-24">home</i>  {{ $tracking->numero_interior_unidad}}
            </div>
            <div class="info-tracking personal-customer-building valign-wrapper">
              <i class="material-icons md-24">assignment_late</i> Tipo de operacion: <span class="txt-blue-1"> {{ $tracking->operation->name}} </span>
            </div>
            <div class="info-tracking personal-customer-building valign-wrapper">
              <i class="material-icons md-24">supervisor_account</i> Tipo de contacto: <span class="txt-orange"> {{ $tracking->contact_type}} </span>
            </div>
            @if($tracking->contact_type == 'Otra Inmobiliaria')
              <div class="info-otra-inmobiliaria">
                <div class="info-tracking personal-customer-building valign-wrapper">
                  <i class="material-icons md-24">label</i> <i>Inmobiliaria: </i> <span class="txt-green-1"> {{ $tracking->inmobiliaria_name }}</span>
                </div>
                <div class="info-tracking personal-customer-building valign-wrapper">
                  <i class="material-icons md-24">portrait</i> <i>Asesor: </i>  <span class="txt-green-1"> {{ $tracking->nombre_asesor }}</span>
                </div>
                <div class="info-tracking personal-customer-building valign-wrapper">
                  <i class="material-icons md-24">phone_iphone</i> <i>Celular: </i> <span class="txt-green-1"> {{ $tracking->phone_asesor }}</span>
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
              <p class="valign-wrapper"><i class="material-icons icon-sm">date_range</i>{{ $tracking->created_at->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="info-tracking info-date-tracking col s6 ">
              <small>Ultima Actualizacion:</small>
              <p class="valign-wrapper"><i class="material-icons icon-sm">date_range</i>{{ $tracking->updated_at->format('d/m/Y H:i:s') }}</p>
            </div>
            @if($tracking->active)
              <div class="info-tracking change-status-tracking col s12">
                @role('asesor')
                  <form action="{{ route('tracking.update-state') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="tracking_id" value="{{ $tracking->id }}">
                @php
                    $states = $tracking->state->loadStates($tracking->state_id)
                @endphp
                <label for="">Cambiar Estado</label>
                <select class="browser-default blue-grey lighten-3" name="state_id">
                  <option value="" disabled="" selected="">- selecciona un estado -</option>
                  @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                  @endforeach
                </select>
                <a class="waves-effect waves-light btn orange modal-trigger" href="#changeState">Cambiar estado</a>
                <div id="changeState" class="modal">
                  <div class="modal-content">
                    <h4>Confirmacion de cambio</h4>
                    <p class="center-align modal-title-confirmation">¿Estas seguro de cambiar el estado del seguimiento?</p>
                    <p class="center-align">Una vez cambiado el estado del seguimiento no es posible regresar a uno anterior.</p>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="modal-action btn blue darken-3" value="Aceptar">
                    <a href="#!" class=" modal-action modal-close  btn red">Cancelar</a>
                  </div>
                </div>
              </form>
                @endrole
            </div>
            @else
              <div class="info-tracking">
                <span class="txt-orange">Este seguimiento esta desactivado.<span>
              </div>
            @endif
          </div>
        </div>
      </div>
      <!-- /. Ficha del cliente -->
    </div>
    @role('asesor')
    <div class="row">
      <div class="subtitle-text col s12">
        <h6>Agregar comentarios</h6>
        <small>Añade un nuevo comentario al seguimiento.</small>
        <div class="divider-custom"></div>
      </div>
    </div>
    @if($tracking->active)
      <div class="row m-b-lg">
        <div class="col s12">

          <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tracking_id" value="{{ $tracking->id }}">
            <input type="hidden" name="state_id" value="{{ $tracking->state->id }}">
            <input class="browser-default" type="text" name="subject" placeholder="Asunto" value="{{ old('subject') }}">
            <textarea class="textarea-style"  name="comment" id="" >
            {{ old('comment')}}
          </textarea>
            <input type="file" name="files[]" multiple >
            <p>
              <input type="submit" class="btn m-t-sm orange" value="Guardar">
            </p>
          </form>

        </div>
      </div>
    @else
      <div class="card red lighten-1 success-comments">
        <p class="thin valign-wrapper">
          <i class="material-icons">info</i>
          <i> Este seguimiento esta desactivado no puedes agregar mas comentarios.</i>
        </p>
      </div>
    @endif
    @endrole

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
                  <i class="material-icons icon-sm">date_range</i>{{$tracking->comments->last()->created_at->format('d/m/Y H:i:s') }}
                </p>
              </div>
              <p class="comments-title">{{ $tracking->comments->last()->subject }}</p>
              <p class="comments-info comments-dash">
                {{ $tracking->comments->last()->comments }}
              </p>
            </div>
            <div class="tracking-files m-t-lg valign-wrapper">
              @php
                  $files = $tracking->comments->last()->files
              @endphp
              @forelse ($files as $file)
                  <i class="material-icons">file_download</i>
                  <span class="file-comment">
                    <a href="{{ Storage::url($file->file_path) }}" target="" download>{{ $file->file }}</a>
                  </span>
              @empty
                <span class="pink-text lighten-1">No tiene archivos adjuntos</span>
              @endforelse
            </div>
          </div>
        </div>
      </div>
      <div class="historial-comments">
        <a href="{{ route('comments.index', $tracking->id) }}" class="waves-effect waves-light btn indigo m-b-xs">Historial de comentarios</a>
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

@endpush