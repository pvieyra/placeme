{{-- formulario para guardar y editar buildings--}}
<div class="form-group">
  <label for="">Codigo de la propiedad</label>
  <input type="text" class="browser-default" wire:model="building_code">
  @error('building_code') <span class="error-form"> {{ $message }} </span> @enderror
</div>
<div class="form-group">
  <label for="">Dirección</label>
  <input type="text" class="browser-default" wire:model="address">
  @error('address') <span class="error-form"> {{ $message }} </span> @enderror
</div>
<div class="form-group">
  <label for="">Colonia</label>
  <input type="text" class="browser-default" wire:model="suburb">
  @error('suburb') <span class="error-form"> {{ $message }} </span> @enderror
</div>
<div class="form-group col l6 s12">
  <label for="">CP</label>
  <input type="text" class="browser-default" wire:model="zip">
  @error('zip') <span class="error-form"> {{ $message }} </span> @enderror
</div>
<div class="form-group col l6 s12">
  <label for="">Municipio</label>
  <input type="text" class="browser-default" wire:model="municipality">
  @error('municipality') <span class="error-form"> {{ $message }} </span> @enderror
</div>
<div class="form-group col l6 s12">
  <label for="">Alias</label>
  <input type="text" class="browser-default" wire:model="alias">
  @error('alias') <span class="error-form"> {{ $message }} </span> @enderror
</div>
<div class="form-group col l6 s12">
  <label for="">No Int.</label>
  <input type="text" class="browser-default" wire:model="int_number">
  @error('int_number') <span class="error-form"> {{ $message }} </span> @enderror
</div>

