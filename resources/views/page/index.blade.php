@if ($paginator->hasPages())
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <!-- 前へ移動ボタン -->
            @if (!$paginator->onFirstPage())
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">前へ</a></li>
            @endif

            <!-- ページ番号 -->
            @foreach ($elements as $element)
                <!-- "三点リーダ" -->
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                <!-- 配列のページ番号 -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <!-- Current Page -->
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @elseif ($page === 1 || $page === $paginator->lastPage() || ($page >= $paginator->currentPage() - $paginator->onEachSide && $page <= $paginator->currentPage() + $paginator->onEachSide))
                            <!-- Pages around the current page and the first/last page -->
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @elseif (($page === $paginator->currentPage() - ($paginator->onEachSide + 1)) || ($page === $paginator->currentPage() + ($paginator->onEachSide + 1)))
                            <!-- "Three Dots" Separator -->
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- 次へ移動ボタン -->
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">次へ</a></li>
            @endif
        </ul>
    </nav>
@endif
