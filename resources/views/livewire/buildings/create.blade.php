<div class="card blue-grey lighten-5">
  <div class="card-content">
    <h5>Nueva propiedad</h5>
    <div class="form-building row">
      @include('livewire.buildings.form')
    </div>
    <button class="btn orange" wire:click="store">Guardar</button>
  </div>
</div>