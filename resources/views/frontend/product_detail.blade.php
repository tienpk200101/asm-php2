@extends('frontend.layouts.layout')
@section('css')
    <style>
        #product_detail, #form-reviews{
            display: none;
        }

        #click_detail{
            width: 100px;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-8">
        <div class="product-content-right">
            <div class="product-breadcroumb">
                <a href="">Trang chủ</a>
                <a href="">Điện thoại</a>
                <a href="">{{$product->name}}</a>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="product-images">
                        <div class="product-main-img">
                            <img src="{{asset('storage/'.$product->image)}}" alt="">
                        </div>

                        <div class="product-gallery">
                            <img src="img/product-thumb-1.jpg" alt="">
                            <img src="img/product-thumb-2.jpg" alt="">
                            <img src="img/product-thumb-3.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="product-inner">
                        <h2 class="product-name">{{$product->name}}</h2>
                        <div class="product-inner-price">
                            <ins>{{$product->price}}đ</ins>
                        </div>

                        <form action="" class="cart">
                            <div class="quantity">
                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                            </div>
                            <button class="add_to_cart_button" type="submit">Add to cart</button>
                        </form>

{{--                        <div class="product-inner-category">--}}
{{--                            <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>--}}
{{--                        </div>--}}

                        <div role="tabpanel">
                            <ul class="product-tab" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                <li role="presentation"><a href="#profile" id="reviews" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                            </ul>
                            <div id="form-reviews">

                                <div id="profile">
                                    <h2>Reviews</h2>
                                    <div class="submit-review">
                                        <p><label for="name">Name</label> <input name="name" type="text"></p>
                                        <p><label for="email">Email</label> <input name="email" type="email"></p>
                                        <div class="rating-chooser">
                                            <p>Your rating</p>

                                            <div class="rating-wrap-post">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                        <p><input type="submit" value="Submit"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    <h2>Chi tiết sản phẩm</h2>
                    <div id="product_detail">
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-info" id="click_detail">Xem thêm</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#click_detail').click(function (){
                $('#product_detail').slideDown(1000);
                $('#click_detail').text('Thu gọn');
            });

            $('#click_detail').dblclick(function (){
                $('#product_detail').slideUp(1000);
                $('#click_detail').text('Xem thêm');
            });

            $('#reviews').click(function () {
                $('#form-reviews').slideToggle(500);
            })
        });
    </script>
@endsection
