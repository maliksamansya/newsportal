@if(isset($news))
    @foreach ($news as $item)
        <?php $category =  optional($item)->category;?>
        <div class="col-lg-6 col-md-6">
            <div class="single-what-news mb-100">
                <div class="what-img">
                    <img src="{{ optional($item)->image }}" alt="">
                </div>
                <div class="what-cap">
                    <span class="color1">{{ optional($category)->name }}</span>
                    <h4><a href="#">{{optional($item)->title}}</a></h4>
                </div>
            </div>
        </div>
       
    @endforeach
    <?php
    /*
        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    @if ($news->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link"><span class="flaticon-arrow roted"></span></span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $news->previousPageUrl() }}"><span class="flaticon-arrow roted"></span></a></li>
                                    @endif

                                    @foreach ($news as $key => $news)
                                        <li class="page-item {{ $news->currentPage() === $key + 1 ? 'active' : '' }}"><a class="page-link" href="{{ $news->url }}">{{ $key + 1 }}</a></li>
                                    @endforeach

                                    @if ($news->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $news->nextPageUrl() }}"><span class="flaticon-arrow right-arrow"></span></a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link"><span class="flaticon-arrow right-arrow"></span></span></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    */
    ?>
    
@endif

<?php
/*
<!-- Tampilkan navigasi paginasi di sini -->
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-start">
        <li class="page-item"><a class="page-link" href="{{ route('pagination.category', ['slug' => $categorySlug]) }}"><span class="flaticon-arrow roted"></span></a></li>
        <!-- Tampilkan nomor halaman -->
        {{ $news->links() }}
        <li class="page-item"><a class="page-link" href="{{ route('pagination.category', ['slug' => $categorySlug]) }}"><span class="flaticon-arrow right-arrow"></span></a></li>
    </ul>
</nav>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <!-- Tombol sebelumnya -->
        @if ($news->onFirstPage())
            <li class="page-item disabled"><span class="page-link">Previous</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $news->previousPageUrl() }}" rel="prev">Previous</a></li>
        @endif

        <!-- Nomor halaman -->
        @foreach ($news as $item)
            <li class="page-item {{ $item->isCurrentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $item->url }}">{{ $item->page }}</a>
            </li>
        @endforeach

        <!-- Tombol selanjutnya -->
        @if ($news->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $news->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Next</span></li>
        @endif
    </ul>
</nav>
*/

?>

