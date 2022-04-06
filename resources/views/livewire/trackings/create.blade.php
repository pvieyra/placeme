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
                        <div class="input-field col m6 s12">
                          <label for="name">Nombre</label>
                          <input id="name" wire:model="name" type="text" class="">
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="lastName">Apellido paterno</label>
                          <input id="lastName" wire:model="last_name" type="text" class="">
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="secondLastName">Apellido materno</label>
                          <input id="secondLastName" wire:model="second_last_name" type="text" class="">
                        </div>
                        <div class="input-field col s12">
                          <label for="email">Email</label>
                          <input id="email" wire:model="email" type="email" class="">
                        </div>
                        <div class="input-field col s12">
                          <label for="phone">Celular</label>
                          <input id="phone" wire:model="phone"  class="">
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
                        <div class="input-field col m6 s12">
                          <label for="building_code">Propiedad</label>
                          <input id="building_code" name="building_code" type="text" class="">
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="numeroInteriorUnidad">Numero interior o Unidad</label>
                          <input id="numeroInteriorUnidad" wire:model="numero_interior_unidad" type="text" class="">
                        </div>
                        <div class="input-field col m6 s12">
                          <div class="select-wrapper"><span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-1f0be149-fa5a-868b-03db-35fcf3d818b2" value="Choose your option">
                            <ul id="select-options-1f0be149-fa5a-868b-03db-35fcf3d818b2" class="dropdown-content select-dropdown" style="width: 496px; position: absolute; top: 0px; left: 0px; opacity: 1; display: none;">
                              <li class="disabled"><span>Choose your option</span></li><li class=""><span>Option 1</span></li><li class=""><span>Option 2</span></li><li class=""><span>Option 3</span></li></ul><select class="initialized">
                              <option value="" disabled="" selected="">Elige una opcion</option>
                              <option value="1">Hola</option>
                              <option value="2">Option 2</option>
                              <option value="3">Option 3</option>
                            </select>
                          </div>
                          <label>Tipo de operación</label>
                        </div>

                        <div class="col m12">
                          <div class="input-field col m3 s12">
                            <p class="p-v-xs">
                              <input name="contact_type" value="Directo" type="radio" id="directo">
                              <label for="directo">Directo</label>
                            </p>
                          </div>
                          <div class="input-field col m3 s12">
                            <p class="p-v-xs">
                              <input name="contact_type" value="Otra Inmobiliaria" type="radio" id="otra">
                              <label for="otra">Otra Inmobiliaria</label>
                            </p>
                          </div>
                        </div>
                        <div class="col m12 m-t-md">
                          <div class="input-field col m12 s12">
                            <label for="inmobiliariaName">Nombre de la inmobiliaria</label>
                            <input id="inmobiliariaName" name="inmobiliaria_name" type="text" class="">
                          </div>
                          <div class="input-field col m12 s12">
                            <label for="nombreAsesor">Nombre del asesor</label>
                            <input id="nombreAsesor" name="nombre_asesor" type="text" class="">
                          </div>
                          <div class="input-field col m12 s12">
                            <label for="celularAsesor">Celular del asesor</label>
                            <input id="celularAsesor" name="celular_asesor" type="text" class="">
                          </div>
                        </div>
                        <div class="col m12 m-t-md">
                          <div class="input-field col s12">
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
                  Congratulations! You got the last step.
                </div>
              </section>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>