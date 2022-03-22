<div>
  <div class="row">
      <div class="card hoverable">
        <div class="card-content">
          <span class="card-title">Creación de usuarios</span><br>
          <div class="row">
            <form wire:submit.prevent="submit">
              <div class="row">
                <div class="col s12 m6 l4">
                  <label for="name">Nombre(s)</label>
                  <input  id="name" wire:model="name" type="text" class="validate @error('name') invalid @enderror" placeholder="Campo obligatorio">
                  @error('name')
                    <label class="error text-red-500">{{ $message }}</label>
                  @enderror
                </div>
                <div class="col s12 m6 l4">
                  <label for="last_name">Apellido Paterno</label>
                  <input id="last_name" wire:model="last_name" type="text" class="validate @error('last_name') invalid @enderror " placeholder="Campo obligatorio" >
                  @error('last_name')
                    <label class="error text-red-500" >{{ $message }}</label>
                  @enderror
                </div>
                <div class="col s12 m12 l4">
                  <label for="second_lastname">Apellido Materno</label>
                  <input id="second_lastname" wire:model="second_lastname" type="text" class="validate" placeholder="Campo opcional" >
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <label for="email">Correo Eléctronico</label>
                  <input id="email" wire:model="email" type="email" class="validate @error('email') invalid @enderror" placeholder="Campo obligatorio">
                  @error('email')
                    <label class="error text-red-500">{{ $message }}</label>
                  @enderror
                </div>
                <div class="col s12">
                  <label for="password">Contraseña</label>
                  <input id="password" wire:model="password" type="password" class="validate @error('password') invalid @enderror" placeholder="Campo obligatorio (password)">
                  @error('password')
                    <label class="error text-red-500">{{ $message }}</label>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col s12">
                  <label for="phone">Teléfono</label>
                  <input id="phone" wire:model="phone" type="text" class="masked @error('phone') invalid @enderror" placeholder="Campo opcional">
                  @error('phone')
                    <label class="error text-red-500">{{ $message }}</label>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col s12 m6">
                  <p class="p-v-xs">
                    <input name="role" wire:model="role" value="administrador" type="radio" id="admin-role"/>
                    <label for="admin-role">Administrador</label>
                  </p>
                  <p class="p-v-xs">
                    <input name="role" wire:model="role" value="asesor" type="radio" id="asesor-role" />
                    <label for="asesor-role">Asesor</label>
                  </p>
                  @error('role')
                    <label class="error text-red-500">{{ $message }}</label>
                  @enderror
                </div>
                <div class="col s12 m6">
                  @if ($photo_profile)
                    @php
                      try {
                         $url = $photo_profile->temporaryUrl();
                         $photoStatus = true;
                      }catch (RuntimeException $exception){
                          $photoStatus =  false;
                      }
                    @endphp
                    @if($photoStatus)
                      <div class="flex flex-col mb-5 items-center md:flex-row lg:flex-row">
                        <img class="rounded-full mb-5 scale-50 basis-1/2" src="{{ $photo_profile->temporaryUrl() }}" alt="Foto del perfil">
                        <button class="btn h-10 w-10 basis-1/2 bg-red-500 hover:bg-red-400" wire:click="resetImage">Eliminar</button>
                      </div>
                    @else
                      <div class="flex flex-col mb-5 items-center">
                        <label class="error text-red-500">El archivo seleccionado no es valido. Solo puede subir archivos tipo imagen: jpeg, png, gif, jpg</label>
                        <a class="h-10 w-10 basis-1/2 text-red-500 cursor-pointer" wire:click="resetImage">Eliminar</a>
                      </div>
                    @endif
                  @endif
                  <div class="file-field input-field">

                   {{-- @if( $photo_profile )
                      <div>
                        <img class="rounded-full mb-5 scale-50" src="{{ $photo_profile->temporaryUrl() }}" alt="Foto del perfil">
                      </div>
                    @endif--}}
                    <div class="btn orange lighten-1">
                      <span>Foto</span>
                      <input type="file" wire:model="photo_profile">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Imagen de perfil">
                    </div>
                  </div>
                </div>
                @error('photo_profile')
                  <label class="error text-red-500">{{ $message }}</label>
                @enderror
              </div>
              <div class="flex mt-15">
                <div>
                  <button type="submit" class="waves-effect waves-light btn m-b-xs orange"><i class="material-icons left">save</i>Crear</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>