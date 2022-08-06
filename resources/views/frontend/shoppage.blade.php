@extends('frontend.layouts.layout')
@section('content')
    @foreach($products as $product)
    <div class="col-md-3 col-sm-6 gap-4">
        <div class="single-shop-product" style="max-height: 300px">
            <div class="product-upper text-center">
                <img src="{{asset('storage/'.$product->image)}}" alt="" style="max-height: 262.5px;">
            </div>
            <h4 class="text-center"><a href="{{route('Route_FrontEnd_Detail', ['id' => $product->id])}}">{{$product->name}}</a></h4>
            <div class="product-carousel-price text-center">
                <ins>{{$product->price}}đ</ins>
{{--                <del>$999.00</del>--}}
            </div>
        </div>
        <div class="product-option-shop text-center">
            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
        </div>
    </div>
    @endforeach
@endsection

@section('page')
    <div class="text-center">
        {{ $products->links() }}
    </div>
@endsection
