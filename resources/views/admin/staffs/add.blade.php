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
                        <form method="post" action="{{route('Route_BackEnd_Staff_Post')}}" enctype="multipart/form-data" class="col-8">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                            </div>
                            @error('name')
                                <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}">
                            </div>
                            @error('name')
                                <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            @error('avatar')
                            <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                            @error('password')
                                <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" name="confirm-password" class="form-control" value="">
                            </div>
                            @error('confirm-password')
                                <p class="text text-danger">{{$message}}</p>
                            @enderror
                            <div class="form-group">
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-success">Thêm nhân viên</button>
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
