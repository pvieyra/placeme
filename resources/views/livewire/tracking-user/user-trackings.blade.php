<div class="card-content">
  <h6>Seguimientos del asesor</h6>
  <table class="responsive-table striped">
    <thead>
    <tr>
      <th>ID</th>
      <th>Cliente</th>
      <th>Telefono</th>
      <th>Propiedad</th>
      <th>Estatus</th>
      <th>Fecha de creacion</th>
      <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
      @foreach( $trackings as $tracking)
          <tr>
            <td># {{ $tracking->tracking_id }}</td>
            <td>{{ $tracking->customer_name}}</td>
            <td>{{ $tracking->customer_phone }}</td>
            <td>{{ $tracking->address }}</td>
            <td class="text-center">
              <span class="badge duplicates {{ $tracking->state_color }}">{{ $tracking->state_name}}</span>
            </td>
            <td> {{ $tracking->creado }}</td>
            <td>
              <a class="btn blue" href="{{ route("trackings.show", $tracking->tracking_id ) }}">Ver</a>
            </td>
          </tr>
      @endforeach
    </tbody>
  </table>

  <div class="pagination">

    {{ $trackings->links('custompagination.basic-pagination') }}
  </div>
</div>
