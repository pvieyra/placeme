<div class="card-content">
  <div class="card-title">Password</div>
  @if($isChanged)
    <button class="btn blue" wire:click="resetPassword">Reset Password</button>
  @else
    <button class="btn amber darken-1">Password cambiado</button>
  @endif
</div>
