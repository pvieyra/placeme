<div class="row">
  {{-- incluye la vista dinamicamente --}}
  @include("livewire.buildings.$view")
  <!--  Buildings -->

  <div class="card">
    <div class="card-content">
      <table class="responsive-table striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Codigo</th>
          <th>Direccion</th>
          <th>Colonia</th>
          <th>Municipio</th>
          <th>CP</th>
          <th>Activo</th>
          <th colspan="2">&nbsp;</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($this->buildings as $building)
          <tr>
            <td>{{ $building->id }}</td>
            <td>{{ $building->building_code }}</td>
            <td>{{ $building->address }}</td>
            <td>{{ $building->suburb }}</td>
            <td>{{ $building->municipality }}</td>
            <td>{{ $building->zip }}</td>
            @php  $activo = $building->active ? "Si": "No" @endphp
            <td>{{ $activo}}</td>
            <td>
              <button wire:click="edit({{ $building->id }})" class="btn blue" href=""> Editar </button>
            </td>
            <td>
              <button class="btn orange" wire:click="changeBuildingActive({{ $building->id }})">
                {{ $building->active ? 'Desactivar' : 'Activar' }}
              </button>
            </td>
            <td>
              <a class="btn teal" href="{{ route("buildings.show", $building) }}">Ver</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="info-pagination">
        {{ $this->buildings->links('custompagination.basic-pagination') }}
        <small class="small"> Mostrando {{ $this->buildings->count() }} de {{ $this->buildings->total() }} registros.</small>
      </div>
    </div>
  </div>
  <!-- ./Buildings-->
</div>
