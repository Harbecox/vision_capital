@php
if (! isset($scrollTo)) {
    $scrollTo = 'body_';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
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
                        <a style="cursor: pointer" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before">Previous</a>
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
                                    <li><a style="cursor: pointer" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

</div>
