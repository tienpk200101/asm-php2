@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection
@section('css')
    <style>
        #content {
            position: relative;
        }
        #add-cate {
            display: none;
        }

        #update-cate{
            /*display: none;*/
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
                        @include('admin.categories.add')
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
{{--                                    <td>{{$item->name}}</td>--}}
                                    <td><a href="{{url('/admin/categories/detail/'.$item->id)}}">{{$item->name}}</a></td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td class="text-center"><a class="text-danger" href="{{route('route_BackEnd_Category_Destroy', ['id' => $item->id])}}">Xóa</a></td>
{{--                                    <td>{{$item->status}}</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form col-lg-6 col-md-6 col-sm-6">
{{--                        @include('admin.categories.edit')--}}
                    </div>
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
