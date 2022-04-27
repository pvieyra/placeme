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
        <span class="card-title">Edicion de usuario</span><br>
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
            <div class="row">
              <div class="col s12 m6">
                <p class="p-v-xs">
                  <span class="badge-tracking orange">{{ $rol }}</span>
                </p>
              </div>
            </div>
            <div class="row image-user-edit">
              <label for="">Imagen actual:</label>
              <img src="{{ Storage::url($currentImage) }}" class="circle" alt="">
            </div>
            <div class="flex mt-15">
              <div>
                <button type="submit" class="btn m-b-xs orange"><i class="material-icons left">save</i>Editar</button>
                <button type="submit" class="btn m-b-xs blue"><i class="material-icons left">replay</i>Reset Password</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

