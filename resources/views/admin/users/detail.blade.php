@extends('admin.layouts.layout')
@section('title')
    {{$title}}
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/'.$user->avatar)}}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$user->name}}</h3>
{{--                        <p class="text-muted text-center"></p>--}}
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ngày tạo</b> <a class="float-right">{{$user->created_at}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Ngày sửa</b> <a class="float-right">{{$user->updated_at}}</a>
                            </li>
                        </ul>
                        <a href="{{route('Route_BackEnd_User_List')}}" class="btn btn-primary">Quay lại</a>
{{--                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
