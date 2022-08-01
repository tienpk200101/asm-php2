@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection
@section('css')
    /*<style>*/

/*        .form {*/
/*            display: none;*/
/*            position: absolute;*/
/*            top: 50px;*/
/*            left: 400px;*/
/*            right: 0;*/
/*        }*/
/*    </style>*/
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
                        <a class="btn btn-outline-success" id="add-product" href="{{route('add_product')}}">Thêm sản phẩm</a>
                        <table class="container-fluid table table-bordered my-4">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên sản phẩm</th>
                                <th>Hãng</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                static $i = 1;
                            @endphp
                            @foreach($products as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('/admin/product/detail/'.$item->id)}}">{{$item->name}}</a></td>
                                    <td>{{$item->cate_name}}</td>
                                    <td><img src="{{asset('storage/'.$item->image)}}" width="100px"/></td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td class="text-center">
                                        <a href="{{route('route_BackEnd_Product_Destroy', ['id' => $item->id])}}" id="deleteProduct" class="text text-danger">Xóa</a>
                                    </td>
{{--                                    <td><input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled"></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    <div class="form col-lg-6 col-md-6 col-sm-6">--}}
{{--                        @include('admin.products.add')--}}
{{--                    </div>--}}
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('document').ready(function (){
            $('#clickMe').on('click', function (){
                if(confirm('Bạn có chắc chắn muốn xóa sản phẩm này chứ ?') == false) {

                }
            })
        })
    </script>
@endsection
