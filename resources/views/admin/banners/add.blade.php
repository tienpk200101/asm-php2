@extends('admin.layouts.layout')
@section('title')
    {{$title}}
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
                        <form method="post" action="{{route('Route_BackEnd_Banner_Post')}}" enctype="multipart/form-data" class="col-8">
                            <div class="form-group">
                                <label>Tên banner</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            @error('name')
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
                                <label>Url</label>
                                <input type="text" name="url" class="form-control" value="{{old('url')}}">
                            </div>
                            @error('url')
                            <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <a href="{{route('Route_BackEnd_Banner_List')}}" class="btn btn-primary">Quay lại</a>
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
