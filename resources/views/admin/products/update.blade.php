@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('admin.alert')
                <form method="post" action="{{route('route_BackEnd_Product_Update', ['id' => request()->route('id')])}}" enctype="multipart/form-data" class="col-8">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    </div>
                    @error('name')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
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
                    @error('image')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="price" class="form-control" value="{{$product->price}}">
                    </div>
                    @error('price')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <input type="text" name="description_short" class="form-control" value="{{$product->description_short}}">
                    </div>
                    @error('description_short')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" id="content" name="description" placeholder="">{!! $product->description !!}</textarea>
                    </div>
                    @error('description')
                    <p class="text text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <a href="{{route('admin_product')}}" class="btn btn-primary">Quay lại</a>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </div>
                    @csrf
                </form>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
