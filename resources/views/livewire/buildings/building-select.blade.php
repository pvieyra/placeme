<div>
    <div class="col m12 s12 m-b-md">
        <label for="building_code">Propiedad</label>
        <select class="js-states browser-default" tabindex="-1" style="width: 100%" id="buildings-data" name="building_id"></select>
    </div>
</div>

@push('scripts')
  <script>
      const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $(document).ready(function() {
          $('#buildings-data').select2({
              placeholder: "Selecciona una propiedad",
              ajax: {
                  url: '{{ route('buildings.select')}}',
                  type: 'POST',
                  dataType: 'json',
                  delay:500,
                  data: function( params ){
                    return{
                        _token: CSRF_TOKEN,
                        search: params.term
                    }
                  },
                  processResults: function(data) {
                      console.log(data);
                      return {
                          results: $.map(data, function(obj) {
                              return {
                                  id: obj.id,
                                  text: "Codigo: " + obj.building_code + " | Dirección: " + obj.address
                                          + " " + obj.suburb,
                              };
                          })
                      };
                  },
                  cache: true
              }
          });
      });
  </script>
@endpush