<table>
  <thead>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Telefono</th>
    <th>Correo</th>
  </tr>
  </thead>
  <tbody>
  @foreach( $users as $user )
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->additional->last_name }}</td>
      <td>{{ $user->additional->second_lastname }}</td>
      <td>{{ $user->additional->phone }}</td>
      <td>{{ $user->email }}</td>
    </tr>
  @endforeach
  </tbody>
</table>