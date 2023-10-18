@php

  $sliders = App\Models\Slider::orderBy('slider_title','ASC')->get();

@endphp

<div class="wrap-main-slide">
    <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false" >

        @foreach($sliders as $slider)
            <div class="item-slide">
                <img src="{{asset("$slider->slider_image")}}" alt="" class="img-slide">
                <div class="slide-info slide-3">
                    <h2 class="f-title">{{$slider->slider_title}}</h2>
                    <span class="f-subtitle">{{$slider->short_title}}</span>

                </div>
            </div>
        @endforeach


    </div>
</div>
