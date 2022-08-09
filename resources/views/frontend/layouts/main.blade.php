@extends('frontend.layouts.layout')
@section('content')

@endsection
@section('slider')
    <div class="block-slider block-slider4">

        <ul class="" id="bxslider-home4">
            @foreach($banners as $banner)
            <li class="mySlides">
                <a href="{{$banner->url}}"><img src="{{asset('storage/'.$banner->image)}}" alt="Slide" style="max-height: 400px; margin: 0; padding: 0;"></a>
                <div class="caption-group">
{{--                    <h2 class="caption title">--}}
{{--                        iPhone <span class="primary">6 <strong>Plus</strong></span>--}}
{{--                    </h2>--}}
{{--                    <h4 class="caption subtitle">Dual SIM</h4>--}}
{{--                    <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>--}}
                </div>
            </li>
            @endforeach
        </ul>
        <div class="bx-controls bx-has-pager bx-has-controls-direction">
            <div class="">
                <a class="bx-prev"  onclick="slug(-1)"><i class="fa fa-angle-left"></i></a>
                <a class="bx-next"  onclick="slug(1)"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>

@endsection
@section('css')
        <style>
            .mySlides{
                /*display: none;*/
            }
        </style>
@endsection
@section('script')
    <script>

        let slideIndex = 1;
        autoSlideShow();

        function slug(n) {
            slideShow(slideIndex += n);
        }

        function slideShow(n){
            let i;
            let slides = document.getElementsByClassName('mySlides');
            let slideLength = slides.length;
            if(n > slideLength){
                slideIndex = 1;
            }

            if(n < 1) {
                slideIndex = slideLength;
            }

            for (i = 0; i < slideLength; i++) {
                slides[i].style.display = 'none';
            }

            slides[slideIndex - 1].style.display = 'block';
        }

       function autoSlideShow() {
           let i;
           let slides = document.getElementsByClassName('mySlides');
           slideIndex++;

           if(slideIndex < 1){
               slideIndex = slides.length;
           }

           if(slideIndex > slides.length){
               slideIndex = 1;
           }

           let slideLength = slides.length;

           for (let  i = 0; i < slideLength; i++){
               slides[i].style.display = 'none';
           }

           slides[slideIndex - 1].style.display = 'block';
           setTimeout(autoSlideShow, 3000)
       }
    </script>
@endsection
