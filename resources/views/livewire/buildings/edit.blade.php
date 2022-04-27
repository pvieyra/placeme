<div class="card blue-grey lighten-5">
  <div class="card-content">
    <h5>Editar propiedad</h5>
    <div class="form-building">
      @include('livewire.buildings.form')
    </div>
    <button  class="btn blue" wire:click="update">Editar</button>
    <button class="btn red" wire:click="default">Cancelar</button>
  </div>
</div>