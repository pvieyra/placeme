<table>
  <thead>
  <tr>
    <th>ID Seguimiento</th>
    <th>Asesor</th>
    <th>Cuenta del asesor</th>
    <th>Cliente</th>
    <th>Telefono</th>
    <th>Correo electronico</th>
    <th>Codigo de la propiedad</th>
    <th>Direccion</th>
    <th>Estado</th>
    <th>Tipo de contacto</th>
    <th>Tipo de operacion</th>
    <th>Creado</th>
    <th>Activo</th>
  </tr>
  </thead>
  <tbody>
  @foreach( $trackings as $tracking )
    <tr>
      <td>{{ $tracking->id }}</td>
      <td>{{ $tracking->user_name }}</td>
      <td>{{ $tracking->email }}</td>
      <td>{{ $tracking->cliente }}</td>
      <td>{{ $tracking->phone }}</td>
      <td>{{ $tracking->customer_email }}</td>
      <td>{{ $tracking->building_code }}</td>
      <td>{{ $tracking->address }}</td>
      <td>{{ $tracking->estado }}</td>
      <td>{{ $tracking->contact_type }}</td>
      <td>{{ $tracking->operation_name }}</td>
      <td>{{ $tracking->creado }}</td>
      @php
          $activo = ($tracking->activo == 1)? "Activo":"Inactivo";
      @endphp
      <td>{{ $activo }}</td>
    </tr>
  @endforeach
  </tbody>
</table>