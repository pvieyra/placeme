<div>
  @if($show)
    <div class="card">
    <div class="card-content">
      <div class="">
        <h5>Buscador de seguimientos duplicados</h5>
        <small>Buscando({{ $search }})</small>
        <div class="input-form">
          <input class="browser-default" wire:model.debounce.1s="search" name="search" type="text">
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
