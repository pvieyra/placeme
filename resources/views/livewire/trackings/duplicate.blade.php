<div class="row">
  <div class="card blue-grey lighten-5">
    <div class="card-content">
      <h5>Seguimientos duplicados</h5>
      <div class="form-building row">
        <div class="form-group s6">
          <label for="">Cuenta del usuario</label>
          <input type="text" class="browser-default">
        </div>
        <div class="form-group s6">
          <label for="">Codigo Propiedad</label>
          <input type="text" class="browser-default">
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
          <th>Propiedad</th>
          <th>Asesor</th>
          <th>Cliente</th>
          <th>Telefono</th>
          <th>Estatus</th>
          <th>Fecha de creacion</th>
          <th colspan="2">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
         @foreach($this->trackings as $tracking)
          <tr>
            <td>{{ $tracking->id }}</td>
            <td>{{ $tracking->direccion }}</td>
            <td>{{ $tracking->asesor }}</td>
            <td>{{ $tracking->cliente }}</td>
            <td>{{ $tracking->customer_phone }}</td>
            <td> <span class="badge {{ $tracking->color }}">{{ $tracking->estado }} </span> </td>
            <td>{{ $tracking->created_at }}</td>
            <td>
              <button class="btn-floating btn-large red accent-1" href="#"> <i class="material-icons">not_interested</i> </button>
            </td>
            <td>
              <a  href="#" class="btn-floating btn-large orange">
                <i class="material-icons">search</i>
              </a>
            </td>
          </tr>
         @endforeach

        </tbody>
      </table>
      {{--<div class="info-pagination">
        {{ $this->trackings->links('custompagination.basic-pagination') }}
        <small class="small"> Mostrando {{ $this->trackings->count() }} de {{ $this->trackings->total() }} registros.</small>
      </div>--}}
    </div>
  </div>
  <!-- ./Buildings-->
</div>

