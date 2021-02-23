@if ($news->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($news->onFirstPage())
            <li class="disabled"><span>@lang('pagination.previous')</span></li>
        @else
            <li><a href="{{ $news->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($news->hasMorePages())
            <li><a href="{{ $news->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li class="disabled"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
