<ul class="pagination">
@if ($paginator->hasPages())
    
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="page-item disabled">
        <span>
            {!! __('pagination.previous') !!}
        </span>
    </li>
    @else   
    <li class="page-item">
        <a class="c-hand" href="#prev" wire:click="previousPage" rel="prev">
            {!! __('pagination.previous') !!}
        </a>
    </li>
    @endif

    <!-- Pagination Elements -->
    @foreach ($elements as $element)
        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
            <!--  Use three dots when current page is greater than 3.  -->
            @if ($paginator->currentPage() > 3 && $page === 2)
                <li class="page-item">
                    <span>...</span>
                </li>
                @endif

                <!--  Show active page two pages before and after it.  -->
                @if ($page == $paginator->currentPage())
                <li class="page-item active">
                    <a>{{ $page }}</a>
                </li>
                @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2)
                <li class="page-item c-hand">
                    <a wire:click="gotoPage({{$page}})">{{ $page }}</a>
                </li>
                @endif

                <!--  Use three dots when current page is away from end.  -->
                @if ($paginator->currentPage() < $paginator->lastPage() - 2  && $page === $paginator->lastPage() - 1)
                <li class="page-item">
                    <span>...</span>
                </li>
                @endif
            @endforeach
        @endif
    @endforeach
    
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item">
        <a class="c-hand" href="#next" wire:click="nextPage" rel="next">
            {!! __('pagination.next') !!}
        </a>
    </li>
    @else
    <li class="page-item disabled">
        <span>
            {!! __('pagination.next') !!}
        </span>
    </li>
    @endif

@endif
</ul>