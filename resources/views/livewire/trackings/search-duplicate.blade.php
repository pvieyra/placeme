<!-- form para buscar seguimiento duplicados -->
<div class="card blue-grey lighten-5">
  <div class="card-content">
    <h5>Seguimientos duplicados</h5>
    <div class="form-building row">
      <div class="form-group s6">
        <label for="">Cuenta del usuario</label>
        <input type="text" wire:model.lazy="userEmail" class="browser-default">
      </div>
      <div class="form-group s6">
        <label for="">Codigo Propiedad</label>
        <input type="text" wire:model.lazy="buildingCode" class="browser-default">
      </div>
    </div>
    <button class="btn orange" >Buscar</button>
  </div>
</div>
<!-- ./form seguimientos-duplicados -->
<!--  Trackings -->
<div class="card">
  <div class="card-content">

    <table class="responsive-table striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Codigo</th>
        <th>Propiedad</th>
        <th>Asesor</th>
        <th>Cuenta</th>
        <th>Cliente</th>
        <th>Telefono</th>
        <th>Estatus</th>
        <th>Fecha de creacion</th>
        <th>&nbsp;</th>
      </tr>
      </thead>
      <tbody>
        @foreach($this->trackings as $tracking)
          <tr>
            <td>{{ $tracking->tracking_id }}</td>
            <td>{{ $tracking->building_code }}</td>
            <td>{{ $tracking->address }}</td>
            <td>{{ $tracking->user_name }}</td>
            <td>{{ $tracking->email }}</td>
            <td>{{ $tracking->customer_name }}</td>
            <td>{{ $tracking->customer_phone }}</td>
            <td> <span class="badge {{ $tracking->state_color }}">{{ $tracking->state_name }} </span> </td>
            <td>{{ $tracking->creado }}</td>
            <td>
              <button wire:click="demo({{ $tracking->tracking_id }})" class="btn blue" href="#"> Ver </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="info-pagination">
      {{ $this->trackings->links('custompagination.basic-pagination') }}
      <small class="small"> Mostrando {{ $this->trackings->count() }} de {{ $this->trackings->total() }} registros.</small>
    </div>
  </div>
</div>
<!-- ./Trackings-->