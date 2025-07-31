@if ($paginator->hasPages())
    <div class="pagination">
        <div class="pagination__info">
            {!! __('Showing :firstItem to :lastItem of :total entries', ['firstItem' => $paginator->firstItem(), 'lastItem' => $paginator->lastItem(), 'total' => $paginator->total()]) !!}
        </div>
        <div class="pagination__list">
            <p>
                @if ($paginator->onFirstPage())
                    <span>Previous</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}">Previous</a>
                @endif
            </p>
            <ul>
                @foreach ($elements as $element)
{{--                     "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif
                        {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><a>{{ $page }}</a></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endif

