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
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
{{--                    @include('admin.alert')--}}
                    <div class="table-list mt-4 d-flex justify-content-center">
                        <form method="post" action="{{route('handle_product')}}" enctype="multipart/form-data" class="col-8">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            @error('name')
                                <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select id="cate_id" name="cate_id" class="form-control">
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('cate_id')
                            <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            @error('image')
                            <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" name="price" class="form-control" value="{{old('price')}}">
                            </div>
                            @error('price')
                            <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <input type="text" name="description_short" class="form-control" value="{{old('description_short')}}">
                            </div>
                            @error('description_short')
                            <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" id="content" name="description"></textarea>
                            </div>
                            @error('description')
                            <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
