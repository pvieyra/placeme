<div class="card-content">
  <div class="card-title">
    Estado
    <small>Asesor: {{ $tracking->user->all_name }}</small>
  </div>

  <div class="chip m-t-sm  white-text {{ $isActive ? "teal" : "red" }}  ">
    {{ $isActive ? "Activo" : "Inactivo"}}
  </div>
  <button wire:click="active" class="btn  {{ $isActive ? "red" : "teal" }}  "> {{ $isActive ? "Desactivar" : "Activar" }} </button>
</div>
