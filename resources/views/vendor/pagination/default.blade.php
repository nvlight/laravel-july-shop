@if ($paginator->hasPages())
    <div class="pager-bottom">
        <div class="pager i-pager pagination">
            <div class="pageToInsert pagination__wrapper">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span class="pagination-item pagination__item active">1</span>
{{--                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                        <span aria-hidden="true">&lsaquo;</span>--}}
{{--                    </li>--}}
                @else
                    <a class="pagination-prev pagination__prev" href="{{ $paginator->previousPageUrl() }}">
                        <span class="arrow prev"></span>
                        Предыдущая страница
                    </a>
{{--                    <li>--}}
{{--                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
{{--                    </li>--}}
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
{{--                        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>--}}
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                @if (!$paginator->onFirstPage())
                                    <a class="pagination-item pagination__item active" href="#">{{ $page }}</a>
                                @endif
{{--                                <li class="active" aria-current="page"><span>{{ $page }}</span></li>--}}
                            @else
                                <a class="pagination-item pagination__item" href="{{ $url }}">{{ $page }}</a>
{{--                                <li><a href="{{ $url }}">{{ $page }}</a></li>--}}
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a class="pagination-next pagination__next" href="{{ $paginator->nextPageUrl() }}">Следующая страница
                        <span class="arrow next"></span>
                    </a>
{{--                    <li>--}}
{{--                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}
{{--                    </li>--}}
                @else
{{--                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                        <span aria-hidden="true">&rsaquo;</span>--}}
{{--                    </li>--}}
                @endif
            </div>
        </div>
    </div>
@endif
