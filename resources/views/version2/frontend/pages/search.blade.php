@extends('version2.frontend.layout.master')

@section('title', 'Search Page')

@section('content')

    <section class="section">
        <div class="page-header container">
            <h1>Search result for: @if(isset($_GET['search'])) {{ $_GET['search'] }} @endif</h1>
            <ul>
                <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a></li>
            </ul>
        </div>
    </section>

    <section class="section">
        <div class="section-news container">

            <div class="news">
                <div class="news-lifestyle">
                    @forelse($newssearch as $news)
                        <div class="trand-right-single d-flex">
                            <div class="trand-right-img">
                                <img src="{{ asset('images/'.$news->image) }}" alt="" style="border-radius: 6px;">
                            </div>
                            <div class="trand-right-cap" style="padding-left: 18px;">
                                <span class="color1">{{ $news->category->name }}</span>
                                <h4 style="font-size: 18px;"><a class="hoverTitle" style="font-weight: 500px;line-height: 1.4;" href="{{ route('page.news',$news->slug) }}">{{ $news->title }}</a></h4>
                                <ul>
                                    <li><i class="far fa-folder"></i> <a style="color: #777;" href="{{ route('page.category',$news->category->slug) }}">{{ $news->category->name }}</a></li>
                                    <li><i class="far fa-clock"></i> {{ $news->created_at->diffForHumans() }}</li>
                                </ul>
                            </div>
                        </div>
                        <?php 
                            /*
                            <div class="section-item">

                                <a href="{{ route('page.news',$news->slug) }}" class="bg-image" style="background-image:url({{ asset('images/'.$news->image) }}); display: block;"></a>
                                
                                <div>
                                    <h3><a href="{{ route('page.news',$news->slug) }}">{{ $news->title }}</a></h3>

                                    <p>{{ $news->details }}</p>

                                    <ul>
                                        <li><i class="far fa-folder"></i> <a href="{{ route('page.category',$news->category->slug) }}">{{ $news->category->name }}</a></li>
                                        <li><i class="far fa-clock"></i> {{ $news->created_at->diffForHumans() }}</li>
                                    </ul>
                                </div>
                            </div>

                            */
                        ?>
                        
                    @empty 
                        <h2>No result found!</h2>
                    @endforelse
                </div>
            </div>
            <?php
                /*
                 <aside class="sidebar">
                    @include('frontend.pages.sidebar')
                </aside>
                */
            ?>
             <!-- New Poster -->
             <div class="news-poster d-none d-lg-block">
                <img src="{{ asset('version2/assets/img/news/'.$advNews->sidebar_two) }}" alt="{{ $advNews->slug }}">
            </div>
           

        </div>
    </section>

@endsection

@push('styles')
    <style>
        /* Your component-specific styles here */
        .page-header {
            background-color: #F9F9F9;
            display: flex;
            justify-content: space-between;
            border: 1px solid #f5f5f5; }
        .page-header h1 {
            text-transform: uppercase;
            font-size: 1.2rem;
            font-weight: 500;
            color: #454545;
            font-weight: bold;
            position: relative;
            padding: 1rem;
            margin: 0; }
        .page-header h1::before {
            position: absolute;
            top: 0;
            left: 0;
            width: 0.4rem;
            height: 100%;
            content: '';
            background-color: #d32c2c; }
        .page-header ul {
            display: flex;
            padding: 1rem; }
        .page-header ul li {
            padding: 0 0.3rem;
            align-self: center; }
        .page-header ul li:nth-child(even) {
            color: #CCC; }
        .page-header ul a {
            color: #222;
            text-decoration: none; }
        .page-header ul a:hover {
            text-decoration: underline; }
        .page-header ul.border-vertical {
            position: relative; }
        .page-header ul.border-vertical::before {
            position: absolute;
            top: 0;
            left: 0;
            width: 0.4rem;
            height: 100%;
            content: '';
            background-color: #d32c2c; }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto; }
        .section {
            margin-top: 30px;
            margin-bottom: 30px; }
        .section-news {
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-gap: 30px; }
        .section-news .news-lifestyle {
            display: grid;
            grid-gap: 15px; }
        .section-item {
            border: 1px solid #DDDDDD; }
        .section-item h3 {
            margin: 0.7rem 0; }
        .section-item h3 a {
            text-decoration: none;
            color: #222; }
        .section-item h3 a:hover {
            color: #888;
            text-decoration: underline; }
        .section-item p {
            margin-top: 0; }
        .section-item ul {
            padding-bottom: 5px; }
        .section-item ul li {
            color: #777;
            text-transform: uppercase;
            font-size: 0.7rem; }
        .section-item ul li:last-child {
            text-align: right;
            float: right; }
        .section-item ul li a {
            text-decoration: none;
            color: #777; }
        .section-item ul li a:hover {
            text-decoration: underline; 
            color: #777;}
        .section-item h3,
        .section-item ul,
        .section-item p {
            padding-left: 8px;
            padding-right: 8px; }
        .bg-image {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-color: #454545; }
        .trand-right-single {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        span {
            color: #000;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 400;
            padding: 10px 15px;
            line-height: 1;
            margin-bottom: 15px;
            display: inline-block;
        }
        .trand-right-cap ul {
            padding-bottom: 5px; 
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .trand-right-cap ul li {
            color: #777;
            text-transform: uppercase;
            font-size: 0.7rem; }
        .trand-right-cap ul li:last-child {
            text-align: right;
            float: right; }
        .hoverTitle:hover{
            color: #777;
        }
    </style>
@endpush

@push('scripts')

@endpush