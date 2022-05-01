<div>
   @if($show)
      <div class="card grey lighten-5">
         <div class="card-content">
            <h6>Propiedad:</h6>
            <div class="tracking-content">
               <div class="tracking-title valign-wrapper">
                  <span class="tracking-building-title">{{ $trackingsDuplicates->first()->address }}</span>
               </div>
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
                     @php
                        if($tracking->activo){ $btnDesactivar = "Desactivar"; $btnColorActive = "red darken-1"; $spanColorActive = "teal"; $activo = "Si"; }
                        else{ $btnDesactivar = "Activar"; $btnColorActive = "teal lighten-2"; $spanColorActive = "red darken-1"; $activo = "No";}
                        if($tracking->revisado){ $btnRevisado = "Sin Revisar"; $btnColorCheck = "amber darken-2"; $spanColorCheck = "teal"; }
                        else{ $btnRevisado= "Revisar"; $btnColorCheck = "blue-grey lighten-2"; $spanColorCheck = "red darken-1"; }
                     @endphp
                     <tr>
                        <td>{{ $tracking->tracking_id }}</td>
                        <td> {{ $tracking->user_name }}</td>
                        <td>{{ $tracking->email }}</td>
                        <td>{{ $tracking->customer_name }}</td>
                        <td>{{ $tracking->customer_phone }}</td>
                        <td class="text-center"><span class="badge duplicates {{ $tracking->state_color }}"> {{ $tracking->state_name }} </span>  </td>
                        <td>{{ $tracking->creado }}</td>
                        <td> <span class="badge duplicates {{ $spanColorActive }}">{{ $activo }}</span> </td>
                        @php  $revisado = $tracking->revisado ? "Si" : "No";   @endphp
                        <td> <span class="badge duplicates {{ $spanColorCheck }}">{{ $revisado }}</span></td>
                        <td>
                           <button class="btn {{ $btnColorActive }}" wire:click="toggleActive({{ $tracking->tracking_id }}, {{ $tracking->activo }})"> {{ $btnDesactivar }}</button>
                        </td>
                        @if($tracking->activo == 1 && $tracking->revisado == 0)
                           <td>
                              <button class="btn {{ $btnColorCheck }}" wire:click="toggleCheck({{ $tracking->tracking_id }}, {{ $tracking->revisado }})"> {{ $btnRevisado }}</button>
                           </td>
                        @endif
                     </tr>
                  @endforeach
                  </tbody>
               </table>
            </div>
            {{--- agregar el componente --}}
            <button  wire:click="back" class="btn blue"> Volver </button>
         </div>
      </div>
   @endif
</div>


