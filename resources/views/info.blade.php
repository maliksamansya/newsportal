<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/breaking-news-ticker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>
<body>
    <header>
        {{-- @include('frontend.layout.partials.header') --}};
        <!-- frontend.layout.partials.header -->
        <div class=""> 
            <div class="header-top-area">
                <div class="container">
                    <div class="header-top">
                        <div class="info">
                            <ul>
                                @php 
                                    $timezone = 'Asia/Dhaka';
                                    date_default_timezone_set($timezone);
                                @endphp
                                <li><span>{{ date('h:i A') }} - {{ date('d M Y') }}</span></li>

                                @guest
                                    <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a></li>
                                    <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Sign in</a></li>
                                    @else
                                    <li><a href="{{ route('profile') }}"><i class="fas fa-user-alt"></i> {{ auth()->user()->name }}</a></li>
                                    <li><a href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form-front').submit();"><i class="fas fa-sign-in-alt"></i> Logout</a></li>
                                    <form id="logout-form-front" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest

                            </ul>
                        </div>

                        @if(isset($newstickers) && count($newstickers) > 0) 
                            <div class="breaking-news-ticker" id="breakingnewsticker">
                                <div class="bn-label">Breaking News</div>
                                <div class="bn-news">
                                    <ul>
                                        @foreach ($newstickers as $key => $news)
                                            <li><a href="{{ route('page.news',$news->slug) }}">{{ ++$key}}. {{ $news->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="bn-controls">
                                    <button><span class="bn-arrow bn-prev"></span></button>
                                    <button><span class="bn-action"></span></button>
                                    <button><span class="bn-arrow bn-next"></span></button>
                                </div>
                            </div>
                        @endif

                        <div class="socials">
                            <ul>
                                @if(isset($headersettings) && $headersettings['facebook'])
                                    <li><a href="{{ $headersettings['facebook'] }}" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                @endif
                                @if(isset($headersettings) && $headersettings['twitter'])
                                    <li><a href="{{ $headersettings['twitter'] }}" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                                @endif
                                @if(isset($headersettings) && $headersettings['linkedin'])
                                    <li><a href="{{ $headersettings['linkedin'] }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                @endif
                                @if(isset($headersettings) && $headersettings['youtube'])
                                    <li><a href="{{ $headersettings['youtube'] }}" target="_blank"><i class="fab fa-youtube-square"></i></a></li>
                                @endif
                                @if(isset($headersettings) && $headersettings['vimeo'])
                                    <li><a href="{{ $headersettings['vimeo'] }}" target="_blank"><i class="fab fa-vimeo-square"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="header-logo">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            @if(isset($headersettings) && $headersettings['site_logo'])
                                <img src="{{ asset('images/'.$headersettings['site_logo']) }}" alt="Logo">
                            @elseif(isset($headersettings) && $headersettings['site_name'])
                                {{ $headersettings['site_name'] }}
                            @else
                                NEWS PORTAL
                            @endif
                        </a>
                    </div>
                    <?php 
                    /* 
                    <div class="ads">
                        @foreach ($headerads as $item)
                            @if (request()->is('/') && $item->type == 'home')
                                <img src="{{ asset('images/advertisements/'.$item->header_top) }}" alt="Ads" class="width-100">
                            @elseif ($item->type == 'category')
                                @if(request()->path() == 'page/category/'.$item->slug)
                                    <img src="{{ asset('images/advertisements/'.$item->header_top) }}" alt="Ads" class="width-100">
                                @endif
                            @endif
                            
                        @endforeach
                    </div>
                    
                    */
                    ?>
                    
                </div>
            </div>
        </div> 

        {{-- @include('frontend.layout.partials.mainmenu') --}};
        <div class="header-menu-container">
            <div class="container">
                <div class="header-menu">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>

                            @if(isset($mainmenus[0]))
                                @foreach($mainmenus[0] as $mainmenu)
                                <li>
                                    <a href="{{ $mainmenu->menu_url }}">{{ $mainmenu->name }}</a>
                                    
                                    @if(isset($mainmenus[$mainmenu->id]))
                                        <i class="fas fa-angle-down"></i>
                                        <ul>
                                            @foreach($mainmenus[$mainmenu->id] as $mainmenu)
                                                <li>
                                                    <a href="{{ $mainmenu->menu_url }}">{{ $mainmenu->name }}</a> 
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                                @endforeach
                            @endif

                            <li>
                                <a href="javascript:void(0)"><i class="fas fa-ellipsis-v"></i></a>
                                @if(isset($mainmenus[10000]))
                                    <ul>
                                        @foreach($mainmenus[10000] as $mainmenu)
                                            <li>
                                                <a href="{{ $mainmenu->menu_url }}">{{ $mainmenu->name }}</a> 
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        </ul>
                    </nav>
                    <div class="search">
                        <form action="{{ route('page.search') }}" method="GET">
                            <input id="searchinput" type="text" name="search" placeholder="SEARCH">
                            <button class="search-btn" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <!-- 'frontend.index' -->
    <div class="">
        <section class="section">
            <div class="section-grid container">

                @foreach($topnewslist as $key => $topnews)
                <!-- <div class="">{{$topnews}}</div> -->
                <div class="section-item">
                        <a href="{{ route('page.news',$topnews->slug) }}">
                            <img src="{{ asset('images/'.$topnews->image) }}" alt="{{ $topnews->title }}" class="width-100">
                        </a>
                        
                        <h3 style="background-color: red;">
                            <a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a>
                        </h3>
            
                        @if($key == 0)
                            <p>{{ $topnews->details }}</p>
                        @endif
            
                        <ul>
                            <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ $topnews->category->name }}</a></li>
                            <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                        </ul>
                    </div>
                @endforeach
            
            </div>
        </section>

        <section class="section">
            <div class="section-news container">

                <div class="news">

                    <div class="news-category-container">
                        <h2>Recent Category</h2>
                        <div class="news-category">
                            @foreach($newscategory_one as $key => $topnews)
                                <div class="section-item">

                                    <a href="{{ route('page.news',$topnews->slug) }}" class="bg-image" style="background-image:url({{ asset('images/'.$topnews->image) }})"></a>

                                    <div>
                                        <h3><a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a></h3>

                                        @if($key == 0)
                                            <p>{{ $topnews->details }}</p>
                                        @endif

                                        <ul>
                                            <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ @$topnews->category->name }}</a></li>
                                            <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="news-category-container">
                        <h2>Recent Lifestyle</h2>
                        <div class="news-lifestyle">
                            @foreach($newscategory_two as $topnews)
                                <div class="section-item">

                                    <a href="{{ route('page.news',$topnews->slug) }}" class="bg-image" style="background-image:url({{ asset('images/'.$topnews->image) }})"></a>

                                    <div>
                                        <h3><a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a></h3>

                                        <p>{{ $topnews->details }}</p>

                                        <ul>
                                            <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ $topnews->category->name }}</a></li>
                                            <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="news-category-container">
                        <h2>Tech News</h2>
                        <div class="news-technology">
                            @foreach($newscategory_three as $topnews)
                                <div class="section-item">
                                    <a href="{{ route('page.news',$topnews->slug) }}">
                                        <img src="{{ asset('images/'.$topnews->image) }}" alt="{{ $topnews->title }}" class="width-100">
                                    </a>
                                    
                                    <h3><a href="{{ route('page.news',$topnews->slug) }}">{{ $topnews->title }}</a></h3>

                                    <p>{{ $topnews->details }}</p>

                                    <ul>
                                        <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ $topnews->category->name }}</a></li>
                                        <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <!-- sidebar section -->
                <aside class="sidebar">
                    <div class="sidebar-item">
                        <div class="tabs-container">
                            <div class="tabs">
                                <div data-target="#panel-one" class="tab active">Popular</div>
                                <div data-target="#panel-two" class="tab">Recent</div>
                                <div data-target="#panel-three" class="tab">Discussed</div>
                            </div>
                            <div class="panel active" id="panel-one">
                                @foreach($newstabspopular as $popular)
                                    <div class="section-item">
                                        <h3><a href="{{ route('page.news',$popular->slug) }}">{{ $popular->title }}</a></h3>
                                        <ul>
                                            <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$popular->category->slug) }}">{{ $popular->category->name }}</a></li>
                                            <li><i class="far fa-clock"></i> {{ $popular->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <div class="panel" id="panel-two">
                                @foreach($newstabsrecent as $recent)
                                    <div class="section-item">
                                        <h3><a href="{{ route('page.news',$recent->slug) }}">{{ $recent->title }}</a></h3>
                                        <ul>
                                            <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$recent->category->slug) }}">{{ $recent->category->name }}</a></li>
                                            <li><i class="far fa-clock"></i> {{ $recent->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <div class="panel" id="panel-three">
                                @foreach($newscategory_two as $topnews)
                                    <div class="section-item">
                                        <h3><a href="">{{ $topnews->title }}</a></h3>
                                        <ul>
                                            <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ $topnews->category->name }}</a></li>
                                            <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <?php /* 
                    <div class="sidebar-item">
                        <div class="sidebar-news category-news">
                            <h2>Category List</h2>
                            @foreach($newscategory_list as $newscategory)
                                <div class="section-item">
                                    <h3>
                                        <i class="far fa-arrow-alt-circle-right"></i>
                                        <a href="{{ route('page.category',$newscategory->slug) }}">{{ $newscategory->name }}</a>
                                        <span>({{ $newscategory->newslist_count }})</span>
                                    </h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    */ ?> 
                    <?php /* 
                    <div class="sidebar-item">
                        <div class="sidebar-news news-with-image">
                            <h2>Sidebar News Image</h2>
                            @foreach($newscategory_two as $topnews)
                                <div class="section-item">
                                    <div class="section-item-news">
                                        <a href="#">
                                            <img src="{{ asset('images/'.$newsinRandomOrder->image) }}" alt="{{ $newsinRandomOrder->title }}" class="width-100">
                                        </a>
                                        <h3><a href="">{{ $topnews->title }}</a></h3>
                                    </div>
                                    <ul>
                                        <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ $topnews->category->name }}</a></li>
                                        <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    */ ?> 
                    

                    <div class="sidebar-item">
                        <div class="sidebar-news">
                            <h2>Sidebar News</h2>
                            @foreach($newscategory_two as $topnews)
                                <div class="section-item">
                                    <h3><a href="">{{ $topnews->title }}</a></h3>
                                    <ul>
                                        <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$topnews->category->slug) }}">{{ $topnews->category->name }}</a></li>
                                        <li><i class="far fa-clock"></i> {{ $topnews->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                  
                    <?php /* 
                    <div class="sidebar-item">
                        <div class="sidebar-news">
                            <h2>Random News</h2>
                            @if($newsinRandomOrder)
                            <div class="section-item">
                                <a href="#">
                                    <img src="{{ asset('images/'.$newsinRandomOrder->image) }}" alt="{{ $newsinRandomOrder->title }}" class="width-100">
                                </a>
                                <h3><a href="">{{ $newsinRandomOrder->title }}</a></h3>
                                <p>{{ $newsinRandomOrder->details }}</p>
                                <ul>
                                    <li><i class="far fa-folder"></i> <a href="{{ route('page.category',@$newsinRandomOrder->category->slug) }}">{{ @$newsinRandomOrder->category->name }}</a></li>
                                    <li><i class="far fa-clock"></i> {{ $newsinRandomOrder->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    */ ?> 
                    
                    @push('scripts')
                        <script>
                            $(function(){

                                const tabs = document.querySelector('.tabs');
                                const panels = document.querySelectorAll('.panel');
                                tabs.addEventListener('click', function(e){
                                    if(e.target.tagName == 'DIV'){
                                        const targetPanel = document.querySelector(e.target.dataset.target);
                                        panels.forEach(function(panel){
                                            if(panel == targetPanel){
                                                panel.classList.add('active');
                                                targetPanel.classList.add('active');
                                            }else{
                                                panel.classList.remove('active');
                                            }
                                        });
                                    }
                                });
                                
                                $('.tabs > .tab').on('click', function(e){
                                    $('.tab').removeClass('active');
                                    $(this).addClass('active');
                                });
                                    
                            });
                        </script>
                    @endpush

                </aside>
                
            </div>
        </section>

    </div>

    <!-- footer -->
    <footer>

        {{--@include('frontend.layout.partials.footer')--}}
        <div class="footer-top-area">
            <div class="container">
                <div class="footer-top">

                    <div class="footer-column">
                        <h2>About Us</h2>
                        @if(isset($headersettings) && $headersettings['about_us'])
                            {!! $headersettings['about_us'] !!}
                        @endif
                    </div>
                    <?php 
                    /* 
                    <div class="footer-column">
                        <h2>Categoies</h2>
                        @foreach($footernewscategorylist as $newscategory)
                            <div class="section-item news-category-list">
                                <h3>
                                    <i class="far fa-arrow-alt-circle-right"></i>
                                    <a href="{{ route('page.category',$newscategory->slug) }}">{{ $newscategory->name }}</a>
                                    <span>({{ $newscategory->newslist_count }})</span>
                                </h3>
                            </div>
                        @endforeach
                    </div>
                    */
                    ?>
                    

                    <div class="footer-column">
                        <h2>News Subscription</h2>
                        <div class="newsletter-subscription">
                            <p>Stay updated and get our latest news right into your inbox and get awesome offers.</p>
                            <form action="" method="">
                                <input type="email" name="" class="mailbox" placeholder="yourmail@example.com">
                                <input type="submit" value="Subscribe" class="submitbox">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-bottom">
                    <p>&copy; 2018 - All right reserved by Developer Canvas.</p>
                </div>
            </div>
        </div>

    </footer>

    
    @push('scripts')
        <script>
            $(function(){

                // 
                    
            });
        </script>
    @endpush

     <!-- master script -->
     <!-- jQuery 3 -->
    <script src="{{ asset('backend/components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/breaking-news-ticker.min.js') }}"></script>
    @stack('scripts')

    <script>
        $(function(){
            $('#breakingnewsticker').breakingNews({radius: 0});
        });
    </script>
    
</body>
</html>