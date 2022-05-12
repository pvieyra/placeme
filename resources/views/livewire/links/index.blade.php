<div class="row">
  <div class="col s12">
    <div class="page-title">Links </div>
  </div>
  @if( $links->count() > 0 )
  <ul class="collection">
     @foreach( $links as $link )
      <li class="collection-item">
        <div>
          <a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>
          @role("administrador")
          <a wire:click="delete({{ $link->id }})" href="#" class="secondary-content">
            <i class="material-icons">delete</i>
          </a>
          @endrole
        </div>
      </li>
    @endforeach
  </ul>
  @else
    <div class="card">
      <div class="card-panel red">
        <span class="white-text"> No hay links creados </span>
      </div>
    </div>
  @endif


</div>
