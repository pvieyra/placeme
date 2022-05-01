<div>
  @if($show)
    <div class="card">
    <div class="card-content">
  <div wire:init="filterTrackings" class="model-content">
    <h5> Listado de seguimientos duplicados</h5>
    @if($trackings && $trackings->count())
      <table class="responsive-table striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Codigo</th>
            <th>Propiedad</th>
            <th>Asesor</th>
            <th>Cliente</th>
            <th>Telefono</th>
            <th>Estatus</th>
            <th>Fecha de creacion</th>
            <th>Activo</th>
            <th>Revisado</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach($trackings as $tracking)
            <tr wire:key="{{ $tracking->tracking_id }}">
              <td>{{ $tracking->tracking_id }}</td>
              <td>{{ $tracking->building_code }}</td>
              <td>{{ $tracking->address }}</td>
              <td>{{ $tracking->user_name }}</td>
              <td>{{ $tracking->customer_name }}</td>
              <td>{{ $tracking->customer_phone }}</td>
              <td>{{ $tracking->state_name }}</td>
              <td>{{ $tracking->creado }}</td>
              @php  $activo = $tracking->activo ? "Si" : "No";   @endphp
              <td>{{ $activo }}</td>
              @php  $revisado = $tracking->revisado ? "Si" : "No";   @endphp
              <td> <span class="badge duplicates">{{ $revisado }}</span></td>
              <td>
                <button wire:click="showTracking({{ $tracking->building_id }}, {{ $tracking->tracking_id }})" class="btn">Ver</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="pagination">
        {{ $trackings->links('custompagination.basic-pagination') }}
      </div>
    @else
        <div> No hay posts duplicados </div>
    @endif
  </div>
  </div>
  </div>
  @endif
</div>
