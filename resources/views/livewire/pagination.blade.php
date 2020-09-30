<nav>
    <ul class="pagination">
    @if ($paginator->hasPages())
        
        {{-- First Page --}}
        @if ($paginator->onFirstPage())
        <li wire:key="pagination-first" class="page-item disabled">
            <span>
                {!! __('pagination.first') !!}
            </span>
        </li>
        @else   
        <li wire:key="pagination-first" class="page-item">
            <a class="c-hand" href="#first" wire:click="gotoPage(1)" rel="first">
                {!! __('pagination.first') !!}
            </a>
        </li>
        @endif
    
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($paginator->currentPage() > 3 && $page === 2)
                    <li wire:key="pagination-separate1" class="page-item">
                        <span>...</span>
                    </li>
                    @endif
    
                    @if ($page == $paginator->currentPage())
                    <li wire:key="pagination-current" class="page-item active">
                        <a tabindex="0">{{ $page }}</a>
                    </li>
                    @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                    <li wire:key="pagination-page{{ $page }}" class="page-item c-hand">
                        <a href="#{{ $page }}" wire:click="gotoPage({{$page}})">{{ $page }}</a>
                    </li>
                    @endif
    
                    @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                    <li wire:key="pagination-separate2" class="page-item">
                        <span>...</span>
                    </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        {{-- Last Page --}}
        @if ($paginator->hasMorePages())
        <li wire:key="pagination-last" class="page-item">
            <a class="c-hand" href="#last" wire:click="gotoPage({{ $paginator->lastPage() }})" rel="last">
                {!! __('pagination.last') !!}
            </a>
        </li>
        @else
        <li wire:key="pagination-last" class="page-item disabled">
            <span>
                {!! __('pagination.last') !!}
            </span>
        </li>
        @endif
    
    @endif
    </ul>
</nav>