<div class="card-content resizing">
  <table class="responsive-table striped">
    <thead>
    <tr>
      <th>ID</th>
      <th>Asesor</th>
      <th>Cuenta</th>
      <th>Cliente</th>
      <th>Telefono</th>
      <th>Estado</th>
      <th>Fecha de creacion</th>
      <th colspan="2"></th>
    </tr>
    </thead>
    <tbody>
      @foreach( $trackings as $tracking )
        <tr>
          <td> # {{ $tracking->tracking_id }}</td>
          <td> {{ $tracking->user_name }}</td>
          <td > {{ $tracking->user_email }}</td>
          <td> {{ $tracking->customer_name }}</td>
          <td> {{ $tracking->customer_phone }}</td>
          <td class="text-center">
            <span class="badge duplicates {{ $tracking->state_color }}">{{ $tracking->state_name}}</span>
          </td>
          <td> {{ $tracking->creado }}</td>
          <td>
            <a class="btn teal" href="{{ route("trackings.show", $tracking->tracking_id) }}">Ver</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination">
    {{ $trackings->links('custompagination.basic-pagination') }}
  </div>
</div>
