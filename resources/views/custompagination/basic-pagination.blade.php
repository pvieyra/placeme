<div>
  @php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
  @if( $paginator->hasPages())
    <ul class="custom-pagination">
      @if($paginator->onFirstPage())
        <li class="pagination-link disabled-link mar-r-1">Anterior</li>
      @else
        <li class="pagination-link" wire:click="previousPage"> <button>Anterior</button></li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
          {{-- "Three Dots" Separator --}}
          @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="mar-r-1 pagination-link-page">{{ $element }}</span></li>
          @endif

          {{-- Array Of Links --}}
          @if (is_array($element))
            @foreach ($element as $page => $url)
              @if ($page == $paginator->currentPage())
                <li class="active" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}" aria-current="page">
                  <span class="page-link">{{ $page }}</span>
                </li>
              @else
                <li class="page-item" wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                  <button type="button" class="page-link" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                </li>
              @endif
            @endforeach
          @endif
      @endforeach

    @if($paginator->hasMorePages())
        <li  wire:click="nextPage">
          <button>Siguiente</button>
        </li>
    @else
          <li class="pagination-link disabled-link mar-r-1">Siguiente</li>
      @endif

  </ul>
@endif
</div>