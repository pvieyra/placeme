<div class="card-content">
  @if (session()->has('message'))
    <div class="card teal lighten-1 success-comments">
      <p class="thin valign-wrapper">
        <i class="material-icons">info</i>
        <i> {{ session("message") }}</i>
      </p>
    </div>
  @endif
  <span class="card-title">Editar cliente ID:{{ $customer->id }}</span>
  <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="col s6">
          <label for="name">Nombre</label>
          <input id="name" wire:model="name" type="text" class="browser-default validate" placeholder="Nombre del cliente">
          @error('name') <span class="error-form"> {{ $message }} </span> @enderror
        </div>
        <div class="col s6">
          <label for="last_name">Apellido paterno</label>
          <input id="last_name" wire:model="last_name" type="text" class="browser-default"  placeholder="apellido paterno del cliente">
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <label for="second_last_name">Apellido Materno</label>
          <input id="second_last_name" wire:model="second_last_name" type="text" class="browser-default" placeholder="apeliido materno del cliente">
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <label for="email">Correo electronico</label>
          <input id="email" type="email"  wire:model="email" class="browser-default"  placeholder="correo electronico">
          @error('email') <span class="error-form"> {{ $message }} </span> @enderror
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <label for="phone">Telefono</label>
          <input disabled type="text"  value="{{ $customer->phone }}" class="browser-default">
        </div>
      </div>
      <button class="btn blue" wire:click="update">Guardar</button>
    </div>
  </div>
</div>
