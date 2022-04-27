<div>
  <div class="row">
    <div class="card valign-wrapper col s4">
      <div class="card-content">RESET PASSWORD</div>
      <div class="button-reset right-align">
        <button class="btn blue" wire:click="resetPassword({{$user_id}})"> Actualizar </button>
      </div>
    </div>
    @if (session()->has('success-change'))
      <div class="card cyan darken-3 col s12" role="alert">
        <div class="card-content ">
          <p class="font-bold">{{ session('success-change') }}</p>
        </div>
      </div>
  @endif
  </div>
<div class="row">
    <div>
    </div>
    <div class="card hoverable">
      <div class="card-content">
        <div class="user-rol valign-wrapper">
          <h5>Editar usuario: <i>{{ $rol }}</i> </h5>
        </div>
        <div class="row">
          <form wire:submit.prevent="submit">
            <div class="row">
              <div class="col s12 m6 l4">
                <label for="name">Nombre(s)</label>
                <input  id="name" wire:model="name" value="{{ $name }}" type="text" class="browser-default" disabled>
              </div>
              <div class="col s12 m6 l4">
                <label for="last_name">Apellido Paterno</label>
                <input id="last_name" wire:model="last_name" value="{{ $last_name }}" type="text"  disabled >
              </div>
              <div class="col s12 m12 l4">
                <label for="second_lastname">Apellido Materno</label>
                <input id="second_lastname" wire:model="second_lastname" value="{{ $second_lastname }}" type="text" disabled >
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <label for="email">Correo Eléctronico</label>
                <input id="email" wire:model="email" type="email" value="{{ $email }}" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <label for="phone">Teléfono</label>
                <input id="phone" wire:model="phone"  value="{{ $phone }}" type="text" class="masked @error('phone') invalid @enderror" placeholder="Campo opcional">
                @error('phone')
                <label class="error text-red-500">{{ $message }}</label>
                @enderror
              </div>
            </div>
            <div class="col s12">
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
                  <div class="image-user-edit">
                    <img class="circle " src="{{ $photo_profile->temporaryUrl() }}" alt="Foto del perfil">
                    <button class="btn" wire:click="resetImage">Eliminar</button>
                  </div>
                @else
                  <div class="flex flex-col mb-5 items-center">
                    <label class="error text-red-500">El archivo seleccionado no es valido. Solo puede subir archivos tipo imagen: jpeg, png, gif, jpg</label>
                    <a class="" wire:click="resetImage">Eliminar</a>
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
                @error('photo_profile')
                <label class="error text-red-500">{{ $message }}</label>
                @enderror
              </div>
            </div>
            <div class="row image-user-edit">
              <label for="">Imagen actual:</label>
              <img wire:model="currentImage" src="{{ Storage::url($currentImage) }}" class="circle" alt="">

            </div>
            <div class="flex mt-15">
              <div>
                <button type="submit" class="btn m-b-xs orange"><i class="material-icons left">save</i>Editar</button>
              </div>
            </div>
          </form>
          @if (session()->has('message'))
            <div class="card cyan darken-3" role="alert">
              <div class="card-content ">
                <p class="font-bold">{{ session('message') }}</p>
              </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

</div>