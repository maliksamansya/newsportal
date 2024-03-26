@extends('version2.frontend.layout.master')

@section('title', 'Home')

@section('content')

    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                        <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                        <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    {{--<img src="{{ asset('images/'.$topnews->image) }}" alt="{{ $topnews->title }}" class="width-100">--}}
                                    {{--<img src="{{ asset('version2/assets/img/trending/trending_top.jpg') }}" alt="">--}}
                                    <img src="{{ $trendingTopNews->image }}" alt="{{ $trendingTopNews->title }}">
                                    <div class="trend-top-cap">
                                        <span>{{$trendingTopNews->category->name}}</span>
                                        {{--<h2><a href="/page/news/slug_2">Welcome To The Best Model Winner<br> Contest At Look of the year</a></h2>--}}
                                        <h2><a href="{{ route('page.news',$trendingTopNews->slug) }}">{{$trendingTopNews->title}}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            
                            <div class="trending-bottom">
                                <div class="row">
                                @foreach($trendingBottomNews as $key => $news)
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                {{--<img src="{{ asset('version2/assets/img/trending/trending_bottom1.jpg') }}" alt="">--}}
                                                <img src="{{ $news->image }}" alt="{{ $news->title }}">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">{{$news->category->name}}</span>
                                                <h4><a href="{{ route('page.news',$news->slug) }}">{{$news->title}}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            @foreach ($rightNews as $news)                            
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        {{--<img src="{{ asset('version2/assets/img/trending/right1.jpg') }}" alt="">--}}
                                        <img style="width: 120px; height: 100px" src="{{ $news->image }}" alt="{{ $news->title }}">
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color1">{{$news->category->name}}</span>
                                        <h4><a href="{{ route('page.news',$news->slug) }}">{{$news->title}}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
            <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active dot-style d-flex dot-style">
                                @foreach ($weeklyNews as $news)                                                                    
                                    <div class="weekly-single ">
                                        <div class="weekly-img">
                                            {{--<img src="{{ asset('version2/assets/img/news/weeklyNews2.jpg') }}" alt="">--}}
                                            <img src="{{ $news->image }}" alt="{{ $news->title }}">
                                        </div>
                                        <div class="weekly-caption">
                                            <span class="color1">{{$news->category->name}}</span>
                                            <h4><a href="{{ route('page.news',$news->slug) }}">{{$news->title}}</a></h4>
                                        </div>
                                    </div> 
                                
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>           
        <!-- End Weekly-News -->
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Whats New</h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->                                            
                                <nav>                                                                     
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        {{--<a href="#" class="category-link" data-category="slug_1">Sport</a><br>--}}
                                        {{--<a class="nav-item nav-link category-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" data-category="All">All</a>--}}
                                        <a class="nav-item nav-link category-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" data-category="lifestyle">Lifestyle</a>
                                        <a class="nav-item nav-link category-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false" data-category="travel">Travel</a>
                                        <a class="nav-item nav-link category-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false" data-category="fashion">Fashion</a>
                                        <a class="nav-item nav-link category-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false" data-category="sports">Sports</a>
                                        <a class="nav-item nav-link category-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false" data-category="technology">Technology</a>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">

                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                    <div class="whats-news-caption">
                                        <div class="row" id="category-content">
                                            @include('version2.frontend.layout.partials.category-content')
                                        </div>
                                    </div>
                                </div>                                                           
                            </div>
                        <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-40">
                        <h3>Follow Us</h3>
                    </div>
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('version2/assets/img/news/icon-fb.png') }}" alt=""></a>
                                </div>
                                <div class="follow-count">  
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div> 
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('version2/assets/img/news/icon-tw.png') }}" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                                <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('version2/assets/img/news/icon-ins.png') }}" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="{{ asset('version2/assets/img/news/icon-yo.png') }}" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- New Poster -->
                    <div class="news-poster d-none d-lg-block">
                        <img src="{{ asset('version2/assets/img/news/'.$advNews->sidebar_two) }}" alt="{{ $advNews->slug }}">
                    </div>
                </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->
        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly2-news-active dot-style d-flex dot-style">
                                @foreach ($weeklyPopularNews as $news )
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ $news->image }}" alt="{{$news->title}}">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">{{$news->category_name}}</span>
                                        <p>{{ $news->created_at->diffForHumans()}}</p>
                                        <h4><a href="{{ route('page.news',$news->slug) }}">{{$news->title}}</a></h4>
                                    </div>
                                </div>                                                          
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>           
        <!-- End Weekly-News -->

        <!--  Recent Articles start -->
        <div class="recent-articles">
            <div class="container">
                <div class="recent-wrapper">
                        <!-- section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-30">
                                    <h3>Recent Articles</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="recent-active dot-style d-flex dot-style" id="latest-news">
                                    @foreach ($latestNews as $news)
                                    <div class="single-recent mb-100">
                                        <div class="what-img">
                                            <img  src="{{ $news->image }}" alt="{{$news->title}}">
                                        </div>
                                        <div class="what-cap">
                                            <span class="color1">{{$news->category_name}}</span>
                                            <h4><a href="{{ route('page.news',$news->slug) }}">{{$news->title}}</a></h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>           
        <!--Recent Articles End -->
        <!--Start pagination -->
        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    @if ($latestNews->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link"><span class="flaticon-arrow roted"></span></span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $latestNews->previousPageUrl() }}"><span class="flaticon-arrow roted"></span></a></li>
                                    @endif

                                    @foreach ($latestNews as $key => $news)
                                        <li class="page-item {{ $latestNews->currentPage() === $key + 1 ? 'active' : '' }}"><a class="page-link" href="{{ $news->url }}">{{ $key + 1 }}</a></li>
                                    @endforeach

                                    @if ($latestNews->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $latestNews->nextPageUrl() }}"><span class="flaticon-arrow right-arrow"></span></a></li>
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

        <?php 
        /*
        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        */
        ?>
        <!-- End pagination  -->
    </main>

@endsection

@push('scripts')
<script>
        $(document).ready(function() {
            // Mengirim permintaan AJAX untuk mengambil data kategori saat halaman pertama kali dimuat
            var activeCategory = $('.category-link.active').data('category'); // Mendapatkan kategori dari hyperlink yang aktif
            fetchCategoryContent(activeCategory); // Memanggil fungsi untuk mengambil konten kategori

            // Menangani klik pada tautan kategori
            $('.category-link').click(function(e) {
                e.preventDefault(); // Mencegah tindakan standar dari tautan

                var category = $(this).data('category'); // Mendapatkan kategori dari atribut data-category
                fetchCategoryContent(category); // Memanggil fungsi untuk mengambil konten kategori
            });

            // Fungsi untuk mengambil konten kategori dengan permintaan AJAX
            function fetchCategoryContent(category) {
                $.ajax({
                    url: '/partial/category/' + category,
                    type: 'GET',
                    success: function(response) {
                        $('#category-content').html(response);
                    }
                });
            }

            $(document).on('click', '.pagination a', function (e) {
                e.preventDefault();

                var page = $(this).attr('href').split('page=')[1];

                $.ajax({
                    url: '/?page=' + page,
                    type: 'get',
                    success: function(data) {
                        $('#latest-news').html(data);
                    }
                });
        });
    });

    </script>
@endpush