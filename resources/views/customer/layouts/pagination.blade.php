@if ($paginator->hasPages())
    <div class="paginatoin-area">
        <div class="row">
            <div class="col-lg-6 col-md-6 pt-xs-15">
                <p>
                    Showing {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} of {{ $paginator->total() }}
                    item(s)
                </p>
            </div>
            <div class="col-lg-6 col-md-6">
                <ul class="pagination-box pt-xs-20 pb-xs-15">
                    <!-- Previous page link -->
                    @if (!$paginator->onFirstPage())
                        <li><a href="{{ $paginator->previousPageUrl() }}" class="Previous" rel="prev"><i
                                    class="fa fa-chevron-left"></i> Previous</a></li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($elements as $element)
                        <!-- "Three Dots" Separator -->
                        @if (is_string($element))
                            <li class="disabled"><a class="page-link"><span>{{ $element }}</span></a></li>
                        @endif

                        <!-- Array Of Links -->
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}" class="Next"> Next <i
                                    class="fa fa-chevron-right"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
