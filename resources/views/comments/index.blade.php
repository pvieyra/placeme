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
    @if( $tracking->active === 0)
      <div class="card red lighten-1 success-comments">
        <p class="thin valign-wrapper">
          <i class="material-icons">info</i>
          <i> Este seguimiento esta desactivado.</i>
        </p>
      </div>
    @endif
    <div class="row">
      <div class="navigation-basic">
        <ol class="navigation-basic-list">
          <li><a href="{{ route('trackings.index') }}"><i>Ver seguimientos /</i></a></li>
          <li><a href="{{ route('trackings.show', $tracking->id) }}"><i>Seguimiento /</i> </a></li>
          <li class="active"><i>Comentarios</i></li>
        </ol>
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

            <div class="info-tracking personal-customer-building valign-wrapper col s12 l5">
              <i class="material-icons md-24">info_outline</i> Tipo de operacion: <span class="txt-blue-1"> {{ $tracking->operation->name}} </span>
            </div>
            <div class="info-tracking personal-customer-building valign-wrapper  col s12 l7">
              <i class="material-icons md-24">supervisor_account</i> Tipo de contacto: <span class="txt-orange"> {{ $tracking->contact_type}} </span>
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
                  <i class="material-icons md-24">phone_iphone</i> <i>Celular: </i> <span class="txt-green-1"> {{ $tracking->phone_asesor }}</span>
                </div>
              </div>
            @endif
          </div>
          <div class="card-tracking col s12 m6 l4">
            <div class="info-tracking info-status-tracking">
              <span class="badge-tracking {{ $tracking->state->color }}">{{ $tracking->state->name }}</span>
            </div>
            <div class="info-tracking change-status-tracking col s12">
              <form action="{{ route('comments.index', $tracking) }}">
                <div class="form-control-basic">
                  <label for="">Buscar por estado del seguimiento.</label>
                  <select class="browser-default blue-grey lighten-3" name="state_id">
                    <option value="">Selecciona un estado del seguimiento</option>
                    @foreach($states as $state)
                      <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-control-basic">
                  <label for="">Fecha inicial</label>
                  <input type="date" name="start_date">
                </div>
                <div class="form-control-basic">
                  <label for="">Fecha final</label>
                  <input type="date" name="end_date">
                </div>
                <input type="submit" class="btn indigo accent-3" value="Buscar" >
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /. Ficha del cliente -->
    </div>
    <!-- comentarios -->
    @forelse( $comments as $comment)
      <div class="row">
        <div class="card blue-grey lighten-5">
          <div class="card-content">
            <div class="tracking-comments">
              <div class="comments">
                <div class="comments-dash">
                  <div class="info-tracking info-status-tracking">
                    Estado: <span class="badge-tracking {{ $comment->state->color }}"> {{ $comment->state->name }}</span>
                  </div>
                </div>
                <div class="comments-date">
                  <small>Fecha de creacion:</small>
                  <p class="valign-wrapper">
                    <i class="material-icons icon-sm">date_range</i>{{ $comment->created_at->format('d/m/Y H:i:s') }}
                  </p>
                </div>
                <p class="comments-title">{{ $comment->subject }}</p>
                <p class="comments-info comments-dash">
                  {{ $comment->comments }}
                </p>
              </div>
              <div class="tracking-files m-t-lg valign-wrapper">
                @php
                  $files = $comment->files
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
      </div>
  @empty
      <span class="pink-text lighten-1">No se encontraron comentarios para la busqueda. Especifique una nueva busqueda</span>
  @endforelse
    <!-- ./ comentario s-->
    <div class="commment-navigation">
      {{ $comments->links() }}
      <small class="small"> Mostrando {{ $comments->count() }} de {{ $comments->total() }} registros.</small>
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