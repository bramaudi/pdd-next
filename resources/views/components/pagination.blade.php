<ul class="pagination">
@if ($paginator->hasPages())
    
    {{-- First Page --}}
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <span>
            {!! __('pagination.first') !!}
        </span>
    </li>
    @else   
    <li class="page-item">
        <a class="c-hand" href="#" wire:click="gotoPage(1)" rel="first">
            {!! __('pagination.first') !!}
        </a>
    </li>
    @endif

    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($paginator->currentPage() > 3 && $page === 2)
                <li class="page-item">
                    <span>...</span>
                </li>
                @endif

                @if ($page == $paginator->currentPage())
                <li class="page-item active">
                    <a>{{ $page }}</a>
                </li>
                @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                <li class="page-item c-hand">
                    <a wire:click="gotoPage({{$page}})">{{ $page }}</a>
                </li>
                @endif

                @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                <li class="page-item">
                    <span>...</span>
                </li>
                @endif
            @endforeach
        @endif
    @endforeach
    
    {{-- Last Page --}}
    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a class="c-hand" href="#" wire:click="gotoPage({{ $paginator->lastPage() }})" rel="last">
            {!! __('pagination.last') !!}
        </a>
    </li>
    @else
    <li class="page-item disabled">
        <span>
            {!! __('pagination.last') !!}
        </span>
    </li>
    @endif

@endif
</ul>