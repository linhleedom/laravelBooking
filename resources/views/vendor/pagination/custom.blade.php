@if ($paginator->hasPages())
    <!--back up button-->
        <a href="#" class="scroll-to-top" title="Back up">Top</a> 
	<!--//back up button-->
    <div class="pager">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="disabled"><a href="#">&lt;</a></span>
        @else
            <span><a href="{{ $paginator->toArray()['first_page_url'] }}">First</a></span>
            <span><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></span>
         @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="current"><a>{{ $page }}</a></span>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                        <span><a href="{{ $url }}">{{ $page }}</a></span>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <span>...</span>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <span><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></span>
            <span><a href="{{ $paginator->toArray()['last_page_url'] }}">Last</a></span>
        @else
            <span class="disabled"><a>&raquo;</a></span>
        @endif
    </div>
@endif