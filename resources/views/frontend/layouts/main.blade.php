@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navside')
<div class="col l-10 m-12 c-12">
    <div class="home-filter hide-on-mobile-tablet">
        <span class="home-filter__label">Sắp xếp theo</span>
        <button class="home-filter__btn btn">Phổ biến</button>
        <button class="home-filter__btn btn btn--primary">Mới nhất</button>
        <button class="home-filter__btn btn btn">Bán chạy</button>

        <div class="select-input">
            <span class="select-input__label">Giá</span>
            <i class="select-input__icon fas fa-angle-down"></i>

            <!-- List option -->
            <ul class="select-input__list">
                <li class="select-input__item">
                    <a href="" class="select-input__link">Giá: Thấp đến cao</a>
                </li>
                <li class="select-input__item">
                    <a href="" class="select-input__link">Giá: Cao đến thấp</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="home-product">
        <div class="row sm-gutter">
    @foreach ($products as $item)
    <div class="col l-2-4 m-4 c-6">
        <!-- Product item -->
        <a class="home-product-item" href="{{route('Route_FrontEnd_Detail', ['id' => $item->id])}}">
            <div class="home-product-item__img" style="background-image: url({{asset('storage/'.$item->image)}});">
            </div>
            <h4 class="home-product-item__name">{{$item->name}}
            </h4>
            <div class="home-product-item__price">
                {{-- <span class="home-product-item__price-old">4.500.000đ</span> --}}
                <span class="home-product-item__price-new">{{$item->price}}đ</span>
            </div>
            <div class="home-product-item__action">
                <span class="home-product-item__like home-product-item__like--liked">
                    <i class="home-product-item__liked-icon-empty far fa-heart"></i>
                    <i class="home-product-item__liked-icon-fill fas fa-heart"></i>
                </span>
                <div class="home-product-item__rating">
                    <i class="home-product-item__star--gold fas fa-star"></i>
                    <i class="home-product-item__star--gold fas fa-star"></i>
                    <i class="home-product-item__star--gold fas fa-star"></i>
                    <i class="home-product-item__star--gold fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="home-product-item__sold">1008 đã bán</span>
            </div> 
            <div class="home-product-item__origin">
                {{-- <span class="home-product-item__origin-name">Trung Quốc</span> --}}
            </div>
            <div class="home-product-item__favourite">
                <i class="fas fa-check"></i>
                <span>Yêu thích</span>
            </div>
            <div class="home-product-item__sale-off">
                <span class="home-product-item__sale-off-percent">12%</span>
                <span class="home-product-item__sale-off-label">Giảm</span>
            </div>
        </a>
    </div>
    @endforeach
</div>

<ul class="pagination home-product__pagination">
    <li class="pagination-item">
        <a href="index_2.html" class="pagination-item__link">
            <i class="pagination-item__icon fas fa-angle-left"></i>
        </a>
    </li>
    <li class="pagination-item pagination-item--active">
        <a href="" class="pagination-item__link">1</a>
    </li>
    <li class="pagination-item">
        <a href="" class="pagination-item__link">2</a>
    </li>
    <li class="pagination-item">
        <a href="" class="pagination-item__link">3</a>
    </li>
    <li class="pagination-item">
        <a href="" class="pagination-item__link">4</a>
    </li>
    <li class="pagination-item">
        <a href="" class="pagination-item__link">5</a>
    </li>
    <li class="pagination-item">
        <a href="" class="pagination-item__link">...</a>
    </li>
    <li class="pagination-item">
        <a href="" class="pagination-item__link">14</a>
    </li>
    <li class="pagination-item">
        <a href="" class="pagination-item__link">
            <i class="pagination-item__icon fas fa-angle-right"></i>
        </a>
    </li>
</ul>
</div>
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
