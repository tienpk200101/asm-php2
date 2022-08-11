@extends('frontend.layouts.layout')

@section('content')

<div class="app__container--detail">
    @include('frontend.layouts.navside')
    <div class="product__detail">
        <img src="https://cdn1.viettelstore.vn/images/Product/ProductImage/medium/1a536.jpg" class="product__detail--img" alt="">
    </div>
    <div class="product__info">
        <h2 class="product__info--title">{{$product->name}}
            <a href=""></a>
        </h2>
        <div class="product__info--rate">
            <p class="product__info--rate--number">5.0</p>
            <div class="product__info--rate--star">
                <i class="home-product-item__star--orange fas fa-star"></i>
                <i class="home-product-item__star--orange fas fa-star"></i>
                <i class="home-product-item__star--orange fas fa-star"></i>
                <i class="home-product-item__star--orange fas fa-star"></i>
                <i class="home-product-item__star--orange fas fa-star"></i>
            </div>
            <p class="product__info--text product__text"><span class="text_under">5234</span> Đánh giá
            </p>
            <p class="product__info--sold product__text"><span class="text--bold">3421</span> Đã bán</p>
        </div>
        <div class="grid-664">
            <div class="product__price">
                <span class="product__price--number">₫{{$product->price}}</span>
            </div>
            <div class="product__transport">
                <p class="product__transport--text">Vận Chuyển</p>
                <ul class="product__transport--list">
                    <li class="product__transport--item">
                        <div class="product__transport--item--choice">
                            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/1cdd37339544d858f4d0ade5723cd477.png" width="25" height="15" class="_2geN66">
                            <span class="product__transport--item--choice--text">Miễn phí vận
                                chuyển</span>
                        </div>
                        <div class="product__transport--item--choice">
                            <i class="fas fa-truck-moving product__transport--item--choice--icon"></i>
                            <span class="product__transport--item--choice--address">
                                Vận chuyển tới
                            </span>
                            <span class="product__transport--item--choice--text">
                                Huyện Thạch Thất
                                <i class="fas fa-chevron-down product__transport--item--icon"></i>
                            </span>
                        </div>
                    </li>
                    <li class="product__transport--item">
                        <div class="product__transport--item--take">
                            <span class="product__transport--item--choice--address product__transport--item--take--go">
                                Phí vận chuyển
                            </span>
                            <span class="product__transport--item--choice--text product__transport--item--text">
                                đ0
                                <i class="fas fa-chevron-down product__transport--item--icon"></i>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="product__quanlity product__transport">
                <span class="product__quanlity--text">Số lượng</span>
                <div class="product__quanlity--table">
                    <span>-</span>
                    <span>1</span>
                    <span>+</span>
                </div>
                <span class="product__quanlity--text">455 sản phẩm có sẵn</span>
            </div>
            <div class="product__cart product__transport">
                <button class="product__cart--box product__cart--add">
                    <i class="fas fa-shopping-cart product__cart--add--icon"></i>
                    <p class="product__cart--add--text">Thêm vào giỏ hàng</p>
                </button>
                <button class="product__cart--box product__cart--soldnow">
                    <span class="product__cart--soldnow">Mua ngay</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection