@if ($paginator->hasPages())

<nav aria-label="Page navigation example">
        <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
           <button disabled="disabled" class="btn btn-default disable">Previous</button>
        @else
            <li>
            <a title="First" href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary">
                << 
            </a>           
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())
                        <li><a class="btn m-btn--pill btn-outline-primary">{{ $page }}</a></li>
                    @else
                        <li><a class="btn m-btn--pill btn-outline-metal" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())        
            <li>
                <a  href="{{ $paginator->nextPageUrl() }}" title="Last" class="btn btn-primary" >
                >>
                </a>
            </li>
        @else
            <li>
                <button disabled="disabled" class="btn btn-default disable">Next</button>
            </li>
        @endif
    </ul>
@endif



