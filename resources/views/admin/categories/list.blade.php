@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection
@section('css')
    <style>
        #add-cate {
            display: none;
        }
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
                        <button class="btn btn-outline-success" id="add-category" >Thêm danh mục</button>
                        <form id="add-cate" class="mt-4" method="post" action="{{route('route_BackEnd_Category_Post')}}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <div class="btn btn-danger" id="close">Hủy</div>
                                <button class="btn btn-primary">Thêm</button>
                            </div>
                            @csrf
                        </form>
                        <table class="container-fluid table table-bordered my-4">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên danh mục</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($categories as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->name}}</td>
{{--                                    <td><a href="{{url('/admin/product/detail/'.$item->id)}}">{{$item->name}}</a></td>--}}
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>{{$item->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--                    <div class="form col-lg-6 col-md-6 col-sm-6">--}}
                    {{--                        @include('admin.products.add')--}}
                    {{--                    </div>--}}
                    <div class="d-flex justify-content-center">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#add-category').click(function (){
                $('#add-cate').slideDown("slow");
                // $('.table-list').fadeTo(300, 0.2);
            })

            $('#close').click(function (){
                $('#add-cate').slideUp("slow");
                // $('.table-list').fadeTo(300, 1);
            })
        })
    </script>
@endsection
