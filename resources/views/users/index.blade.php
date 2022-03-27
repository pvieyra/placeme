@extends('layouts.app')

@section('native-styles')
  <!-- Styles -->
  <link type="text/css" rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css')}}"/>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('plugins/material-preloader/css/materialPreloader.min.css')}}" rel="stylesheet">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <!-- Theme Styles -->
  <link href="{{ asset('css/alpha.min.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('plugins/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
  <div class="card hoverable">
    <div class="card-content">
      <span class="card-title">Creación de usuarios</span><br>
      <div class="row">
        <table id="example" class="table table-striped table-bordered  mt-4 responsive-table">
          <thead>
          <tr>
            <th>ID </th>
            <th>Nombre  </th>
            <th>Correo  </th>
            <th>Acciones  </th>
          </tr>
          </thead>
        </table>
        <div/>
      </div>
    </div>
  </div>
@endsection

@section('native-scripts')
  <script src="{{ asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
  <script src="{{ asset('plugins/materialize/js/materialize.min.js')}}"></script>
  <script src="{{ asset('plugins/material-preloader/js/materialPreloader.min.js')}}"></script>
  <script src="{{ asset('plugins/jquery-blockui/jquery.blockui.js')}}"></script>
  <script src="{{ asset('plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('js/alpha.min.js')}}"></script>
  <script src="{{ asset('js/pages/form_elements.js')}}"></script>
  <script>
      $(document).ready(function() {
          $('#example').DataTable({
              processing: true,
              serverSide: true,
              responsive:true,
              buttons: [
                  {
                      extend: 'copy',
                      text: 'Copiado a portapapeles',
                  },
                  'excel',
                  'pdf'
              ],
              "language": {
                  "searchPlaceholder": 'Nombre, Correo',
                  "search": "Buscar",
                  "lengthMenu": 'Mostrar _MENU_',
                  "zeroRecords" : "No se encontro informacion",
                  "info": "Mostrando pagina _PAGE_ de _PAGES_",
                  "infoEmpty": "Sin registros disponibles",
                  "infoFiltered" : "(filtrado de _MAX_ registros totales)",
                  sLength: 'dataTables_length',
                  oPaginate: {
                      sFirst: '<i class="material-icons">chevron_left</i>',
                      sPrevious: '<i class="material-icons">chevron_left</i>',
                      sNext: '<i class="material-icons">chevron_right</i>',
                      sLast: '<i class="material-icons">chevron_right</i>'
                  }
              },
              //mandar ruta de laravel
              "ajax":"{{ route('datatable.users')}}",
              "columns": [
                  { data:'id'},
                  { data:'name'},
                  { data:'email'},
                  { data:'action',orderable: false, searchable: false},
              ]
          });
          $('.dataTables_length select').addClass('browser-default');
      });
  </script>
@endsection

