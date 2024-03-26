@if(isset($news))
    @foreach ($news as $item)
    {{--<div class="">{{$item}}</div>--}}
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
@endif
