
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <script>
        function pageAction(page){
            document.getElementById("page").setAttribute('value',page)
            document.getElementById("searchForm").submit();
        }
    </script>

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous button is-link is-outlined" title="This is the first page" disabled><i class="fas fa-angle-left"></i> &nbsp; 上一頁</a>
        @else
            <a onclick="pageAction({{ isset($_GET['page']) ? $_GET['page']-1:1 }})" rel="prev" aria-label="@lang('pagination.previous')" class="pagination-previous button is-link is-outlined"><i class="fas fa-angle-left"></i> &nbsp; 上一頁</a>

        @endif
        <ul class="pagination-list">
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span class="pagination-ellipsis">&hellip;</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="pagination-link is-current" aria-label="Page {{ $page }}" aria-current="page">{{ $page }}</a></li>
                    @else
                        <li><a onclick="pageAction({{ $page }})" class="pagination-link button is-link is-outlined" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        </ul>
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a onclick="pageAction({{ isset($_GET['page']) ? $_GET['page']+1:1 }})" rel="next" aria-label="@lang('pagination.next')" class="pagination-next button is-link is-outlined"><i class="fas fa-chevron-right"></i> &nbsp; 下一頁</a>
        @else
        <a class="pagination-next button is-link is-outlined" disabled>下一頁&nbsp;<i class="fas fa-chevron-right"></i> </a>
        @endif

    </nav>

