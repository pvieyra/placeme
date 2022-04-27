<div class="row">
  <div class="card blue-grey lighten-5">
    <div class="card-content">
      <h5>Usuarios</h5>
      <div class="form-building row">
        <div class="form-group">
          <label for="">Cuenta del usuario</label>
          <input type="text" class="browser-default" wire:model.lazy="searchEmail">
          @error('searchEmail') <span class="error-form"> {{ $message }} </span> @enderror
        </div>
      </div>
      <button class="btn orange">Buscar</button>
    </div>
  </div>
{{-- incluye la vista dinamicamente --}}
  {{--@include("livewire.buildings.$view")--}}
<!--  Buildings -->
  <div class="card">
    <div class="card-content">
      <table class="responsive-table striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Cuenta</th>
          <th>Telefono</th>
          <th>Permisos</th>
          <th>Estatus</th>
          <th colspan="2">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach( $this->users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->all_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->additional->format_phone }}</td>
            <td>{{ $user->roles->first()->name }}</td>
            <td>{{ $user->additional->active_state }}</td>
            <td>
              <button class="btn blue" href=""> Editar </button>
            </td>
            <td>
              <button wire:click="changeUserActive({{ $user->id }})" class="btn orange">
                {{ $user->additional->active ? 'Suspender' : 'Activar' }}
              </button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="info-pagination">
        {{ $this->users->links('custompagination.basic-pagination') }}
        <small class="small"> Mostrando {{ $this->users->count() }} de {{ $this->users->total() }} registros.</small>
      </div>
    </div>
  </div>
  <!-- ./Buildings-->
</div>
