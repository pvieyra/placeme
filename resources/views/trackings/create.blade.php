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
          <div class="row">
            <form id="tracking-form" method="POST" action="{{ route('trackings.store') }}">
              @csrf
              <div>
                <h3>Cliente</h3>
                <section>
                  <div class="wizard-content">
                    <div class="row">
                      <div class="col m12">
                        <div class="row">
                          <div class="input-field  col m6 s12">
                            <label for="name">Nombre</label>
                            <input id="name"  name="name"  type="text" value="{{ old('name') }}">
                          </div>
                          <div class="input-field col m6 s12">
                            <label for="last_name">Apellido paterno</label>
                            <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}">
                          </div>
                          <div class="input-field col m6 s12">
                            <label for="second_last_name">Apellido materno</label>
                            <input id="second_last_name" name="second_last_name" type="text">
                          </div>
                          <div class="input-field col m6 s12">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" class=" ">
                          </div>
                          <div class="input-field col m6 s12">
                            <label for="phone">Celular</label>
                            <input id="phone" name="phone" type="text" class=" ">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                <h3>Propiedad</h3>
                <section>
                  <div class="wizard-content">
                    <div class="row">
                      <div class="col m12">
                        <div class="row">
                          <div>
                            <div class="input-field col m12 s12 m-b-md">
                              <label for="building_code">Propiedad</label>
                              <select class="js-states browser-default required auto-select" tabindex="-1" style="width: 100%" id="buildings-data" name="building_id" >

                              </select>
                            </div>
                          </div>
                          <div class="input-field col m12 s12 m-t-md">
                            <label for="numero_interior_unidad">Numero interior o Unidad</label>
                            <input id="numero_interior_unidad" name="numero_interior_unidad" type="text">
                          </div>
                          <div class="input-field col m12 s12 m-t-md m-b-lg">
                            <div class="select-wrapper"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-1f0be149-fa5a-868b-03db-35fcf3d818b2" value="Choose your option">
                              <ul id="select-options-1f0be149-fa5a-868b-03db-35fcf3d818b2" class="dropdown-content select-dropdown" style="width: 496px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
                                <li class="disabled">
                                  <span>Elige una opción</span>
                                </li>
                                @foreach($operations as $operation)
                                  <li class="">
                                    <span>{{ $operation->name }}</span>
                                  </li>
                                @endforeach
                              </ul>
                              <select class="initialized required" id="operation_id"  name="operation_id">
                                <option value="" disabled="" selected="">Elige una opcion</option>
                                @foreach($operations as $operation)
                                  <option value="{{ $operation->id }}">{{ $operation->name }}</option>
                                @endforeach
                              </select>
                              <label> Tipo de operación</label>
                            </div>
                          </div>
                          <div class="card-content">
                            <div class="col m12 m-t-n-lg">
                              <div class="col m3 s12">
                                <p class="p-v-xs m-t-n-lg">
                                  <input name="contact_type" value="Directo" type="radio" id="directo" checked>
                                  <label class="tipo-contacto" for="directo">Directo</label>
                                </p>
                                <p class="p-v-xs m-t-n-lg">
                                  <input name="contact_type" value="Otra Inmobiliaria" type="radio" id="otra">
                                  <label class="tipo-contacto" for="otra">Otra Inmobiliaria</label>
                                </p>
                              </div>
                            </div>
                          </div>

                          <div class="input-field col m12 m-t-md">
                            <div class="input-field col m12 s12">
                              <label for="inmobiliaria_name">Nombre de la inmobiliaria</label>
                              <input id="inmobiliaria_name" name="inmobiliaria_name" type="text" disabled>
                            </div>
                            <div class="input-field col m12 s12">
                              <label for="nombre_asesor">Nombre del asesor</label>
                              <input id="nombre_asesor" name="nombre_asesor" type="text"  disabled>
                            </div>
                            <div class="input-field col m12 s12">
                              <label for="celular_asesor">Celular del asesor</label>
                              <input id="celular_asesor" name="celular_asesor" type="text"  disabled>
                            </div>
                          </div>
                          <div class="input-field col m12 m-t-md">
                            <div class=" col s12">
                              <textarea id="comments" class="materialize-textarea" name="comments" length="120"></textarea>
                              <label for="textarea1" class="">Comentarios</label>
                              <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <h3>Crear Seguimiento</h3>
                <section>
                  <div class="wizard-content">
                    <blockquote class="info-validation">
                      Da click en <span class="green-text">"GUARDAR"</span> para crear el seguimiento o <span class="orange-text">"ANTERIOR"</span> para revisar la información del seguimiento.
                    </blockquote>
                    <div class="message-success-tracking">

                    </div>
                    <div class="card card-validation hide">
                      <div class="card-content white-text">
                        <span class="card-title white-text">Hay campos por llenar para continuar</span>
                        <div class="card-content-errors">

                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </form>
          </div>
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
  <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
  <script src="{{ asset('plugins/jquery-steps/jquery.steps.min.js')}}"></script>
  <script src="{{ asset('js/alpha.min.js')}}"></script>
  <script src="{{ asset('js/pages/form-wizard.js')}}"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@push('scripts')
  <script>
      const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $(document).ready(function() {
          $('#buildings-data').select2({
              placeholder: "Selecciona una propiedad",
              ajax: {
                url: '{{ route('buildings.select')}}',
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
                        text: "Codigo: " + obj.building_code + " | Dirección: " + obj.address
                              + " " + obj.suburb,
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