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
                @include('admin.alert')
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <div class="table-list mt-4">
                        <a href="{{route('Route_BackEnd_Staff_Add')}}" class="btn btn-outline-success">Thêm nhân viên</a>
                        <table class="container-fluid table table-bordered my-4">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Ảnh</th>
                                <th>Ngày tạo</th>
                                <th>Ngày Sửa</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                static $i = 1;
                            @endphp
                            @foreach($staffs as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('/admin/users/detail/'.$item->id)}}">{{$item->name}}</a></td>
                                    <td>{{$item->email}}</td>
                                    <td><img src="{{asset('storage/'.$item->avatar)}}" width="100px" style="border-radius: 50%"/></td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td><input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $staffs->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
