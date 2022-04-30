<!-- form para buscar seguimiento duplicados -->
<div class="card blue-grey lighten-5">
  <div class="card-content">
    <h5>Seguimientos duplicados</h5>
    <div class="tracking-content">
      <div class="tracking-title">Propiedad: <div class="tracking-building-titlte">{{ $tracking->building->complete_address }}</div></div>
      <table class="responsive-table striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Asesor</th>
            <th>Cuenta</th>
            <th>Cliente</th>
            <th>Telefono</th>
            <th>Estatus</th>
            <th>Fecha de creacion</th>
            <th>Activo</th>
            <th>Revisado</th>
            <th colspan="2">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
        @foreach($trackingsDuplicates as $tracking)
          <tr>
            <td>{{ $tracking->tracking_id }}</td>
            <td> {{ $tracking->user_name }}</td>
            <td>{{ $tracking->email }}</td>
            <td>{{ $tracking->customer_name }}</td>
            <td>{{ $tracking->customer_phone }}</td>
            <td>{{ $tracking->state_name }}</td>
            <td>{{ $tracking->creado }}</td>
            @php  $activo = $tracking->activo ? "Si" : "No";   @endphp
            <td>{{ $activo }}</td>
            @php  $revisado = $tracking->revisado ? "Si" : "No";   @endphp
            <td>{{ $revisado }}</td>
            <td>
              @php  $btnDesactivar = $tracking->activo ? "Desactivar" : "Activar";   @endphp
              <button> {{ $btnDesactivar }}</button>
              @php  $btnRevisado = $tracking->revisado ? "Pendiente" : "Revisar";   @endphp
              <button> {{ $btnRevisado }}</button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
      {{--- agregar el componente --}}
    <button class="btn orange">Buscar</button>
    <button wire:click="default"  class="btn blue"> Volver </button>
  </div>
</div>
<!-- ./form seguimientos-duplicados -->