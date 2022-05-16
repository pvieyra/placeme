<div class="row">
  @if (session()->has('message'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div>
          <p class="font-bold">{{ session('message') }}</p>
        </div>
      </div>
    </div>
  @endif
  <div class="card white darken-1">
    <div class="card-content">
      <span class="card-title">Crear nuevos links</span>
      <div class="row">
        <form  wire:submit.prevent="submit">
        <div class="col s12">
          <label for="first_name">Link</label>
          <input wire:model="link"  placeholder="http://ejemplodellink.com" id="first_name" type="text" >
          @error('link')
            <span class="error-form"> {{ $message }} </span>
          @enderror
        </div>
        <div class="col s12">
          <label for="last_name">Nombre del Link</label>
          <input wire:model="subject" id="last_name" type="text" placeholder="Catalogo de propiedades">
          @error('subject')
            <span class="error-form">{{ $message }}</span>
          @enderror
        </div>
        <div class="m-t-lg">
          <button type="submit" class="btn blue"> Guardar </button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
