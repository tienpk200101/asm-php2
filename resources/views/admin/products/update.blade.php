@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
    <form method="post" action="{{route('handle_product')}}" enctype="multipart/form-data" class="col-8">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label>Loại sản phẩm</label>
            <select id="cate_id" name="cate_id" class="form-control">
                @foreach($categories as $item)
                    <option value="{{$item->id}}" {{($product->cate_id == $item->id) ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" name="image" class="form-control">
            <img src="{{asset('storage/'.$product->image)}}" width="200px" />
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label>Mô tả ngắn</label>
            <input type="text" name="description_short" class="form-control" value="{{$product->description_short}}">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="description" placeholder="{{$product->description}}"></textarea>
        </div>
        <div class="form-group">
            <a href="{{route('admin_product')}}" class="btn btn-primary">Quay lại</a>
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        </div>
        @csrf
    </form>

@endsection
