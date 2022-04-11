<div>
  <div class="row">
    <div>
      @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
          <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
              <p class="font-bold">{{ session('message') }}</p>

            </div>
          </div>
        </div>
      @endif
    </div>

    <div class="card hoverable">
      <div class="card-content">
        <div class="row">
          <form id="example-form" wire:submit.prevent="submit">
            <div>
              <h3>Cliente</h3>
              <section>
                <div class="wizard-content">
                  <div class="row">
                    <div class="col m12">
                      <div class="row">
                        <div class="col m6 s12">
                          <label for="name">Nombre</label>
                          <input id="name"  name="name"  type="text" class="">
                        </div>
                        <div class="col m6 s12">
                          <label for="lastName">Apellido paterno</label>
                          <input id="lastName" name="last_name" type="text" class="">
                        </div>
                        <div class="col m6 s12">
                          <label for="secondLastName">Apellido materno</label>
                          <input id="secondLastName" name="second_last_name" type="text" class="">
                        </div>
                        <div class="col s12">
                          <label for="email">Email</label>
                          <input id="email" name="email" type="email" class="">
                        </div>
                        <div class="col s12">
                          <label for="phone">Celular</label>
                          <input id="phone" name="phone"  class="">
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
                        <livewire:buildings.building-select />
                        <div class=" col m12 s12 m-t-md">
                          <label for="numeroInteriorUnidad">Numero interior o Unidad</label>
                          <input id="numeroInteriorUnidad" name="numero_interior_unidad" type="text" class="">
                        </div>
                        <div class="col m12 s12 m-t-md">
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
                            <select class="initialized">
                              <option value="" disabled="" selected="">Elige una opcion</option>
                              @foreach($operations as $operation)
                                <option value="{{ $operation->id }}">{{ $operation->name }}</option>
                              @endforeach
                            </select>
                            <label> Tipo de operación</label>
                          </div>

                        </div>
                        <div class="col m12">
                          <div class="col m3 s12">
                            <p class="p-v-xs">
                              <input name="contact_type" value="Directo" type="radio" id="directo">
                              <label for="directo">Directo</label>
                            </p>
                          </div>
                          <div class=" col m3 s12">
                            <p class="p-v-xs">
                              <input name="contact_type" value="Otra Inmobiliaria" type="radio" id="otra">
                              <label for="otra">Otra Inmobiliaria</label>
                            </p>
                          </div>
                        </div>
                        <div class="col m12 m-t-md">
                          <div class=" col m12 s12">
                            <label for="inmobiliariaName">Nombre de la inmobiliaria</label>
                            <input id="inmobiliariaName" name="inmobiliaria_name" type="text">
                          </div>
                          <div class=" col m12 s12">
                            <label for="nombreAsesor">Nombre del asesor</label>
                            <input id="nombreAsesor" name="nombre_asesor" type="text" class="">
                          </div>
                          <div class=" col m12 s12">
                            <label for="celularAsesor">Celular del asesor</label>
                            <input id="celularAsesor" name="celular_asesor" type="text" class="">
                          </div>
                        </div>
                        <div class="col m12 m-t-md">
                          <div class=" col s12">
                            <textarea id="textarea1" class="materialize-textarea" length="120"></textarea>
                            <label for="textarea1" class="">Comentarios</label>
                            <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <h3>Crear</h3>
              <section>
                <div class="wizard-content">
                  <div class="flex mt-15">
                    <div>
                      <button type="submit" class="waves-effect waves-light btn m-b-xs orange"><i class="material-icons left">save</i>Crear</button>
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