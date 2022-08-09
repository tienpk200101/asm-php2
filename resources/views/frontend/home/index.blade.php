@extends('frontend.layouts.layout')
@section('content')
@foreach ($products as $product)
<div>
    <img src="{{asset('storage/'.$product->image)}}" style="height: 250px" alt="">
    <br>
    <br>
    <p class="text-center">{{ $product->name }}</p>
    <p class="text-center">{{ number_format($product->price) }} VNĐ</p>
</div>
@endforeach
@endsection