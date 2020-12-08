<div class="pagination">
    @if ($paginator->hasPages())
        
        {{-- First Page --}}
        @if ($paginator->onFirstPage())
            <span wire:key="pagination-first">
                {!! __('pagination.first') !!}
            </span>
        @else   
            <a wire:key="pagination-first" wire:click="gotoPage(1)" href="#first" rel="first">
                {!! __('pagination.first') !!}
            </a>
        @endif
    
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($paginator->currentPage() > 3 && $page === 2)
                        <span wire:key="pagination-separate1">...</span>
                    @endif
    
                    @if ($page == $paginator->currentPage())
                        <span wire:key="pagination-current">{{ $page }}</span>
                    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                        <a href="#{{ $page }}" wire:key="pagination-page{{ $page }}" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                    @endif
    
                    @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                        <span wire:key="pagination-separate2">...</span>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        {{-- Last Page --}}
        @if ($paginator->hasMorePages())
            <a wire:key="pagination-last" wire:click="gotoPage({{ $paginator->lastPage() }})" href="#last" rel="last">
                {!! __('pagination.last') !!}
            </a>
        @else
            <span wire:key="pagination-last">
                {!! __('pagination.last') !!}
            </span>
        @endif
    
    @endif
</div>