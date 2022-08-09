@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection
@section('css')
    <style>
        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
        .toggle.ios .toggle-handle { border-radius: 20px; }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                @include('admin.alert')
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <div class="table-list mt-4">
                        <a class="btn btn-outline-success" id="add-product" href="{{route('Route_BackEnd_Banner_Add')}}">Thêm banner</a>
                        <table class="container-fluid table table-bordered my-4">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên banner</th>
                                <th>Ảnh</th>
                                <th>URL</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                static $i = 1;
                            @endphp
                            @foreach($banners as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('/admin/banners/detail/'.$item->id)}}">{{$item->name}}</a></td>
                                    <td><img src="{{asset('storage/'.$item->image)}}" width="100px"/></td>
                                    <td>{{$item->url}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route('Route_BackEnd_Banner_Destroy', ['id' => $item->id])}}" id="deleteProduct" class="text text-danger">Xóa</a>
                                    </td>
                                    {{--                                    <td><input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled"></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $banners->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
