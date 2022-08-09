@extends('admin.layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            @include('admin.alert')
            <div class="card card-info mt-3">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <div class="table-list mt-4  d-flex justify-content-center">
                    <form method="post" action="{{route('Route_BackEnd_Staff_Post')}}" enctype="multipart/form-data" class="col-6">
                        <div class="text-center">
                            <label for="image">
                                <img src="{{asset('storage/'.$user->avatar)}}" style="width: 200px; height: 200px; border-radius: 50%;"/>
                            </label>
                            <input type="file" id="image" name="avatar" class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        @error('name')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled>
                        </div>
                        @error('name')
                            <p class="text text-danger">{{$message}}</p>
                        @enderror
                        
                        @error('avatar')
                        <p class="text text-danger">{{$message}}</p>
                        @enderror
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Cập nhật</button></button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
