@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
{{--                @include('admin.alert')--}}
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <div class="table-list mt-4">
                        <form id="add-cate" class="mt-4" method="post" action="{{route('route_BackEnd_Category_Update', ['id' => $category->id])}}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}" />
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a class="btn btn-primary" href="{{route('route_BackEnd_Category_List')}}">Quay lại</a>
                                <button class="btn btn-warning" type="reset" id="close">Reset</button>
                                <button class="btn btn-success" type="submit">Cập nhật</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
