<div class="card-content">
  <h6>Buscador de seguimientos</h6>
  <small>Buscando {{ $search }}</small>
  <input class="browser-default" wire:model.debounce.1s="search" name="search" type="text">
</div>
