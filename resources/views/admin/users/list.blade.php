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
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">{{$title}}</h3>
                            </div>
                            <div class="col-md-6">
                                <form action="{{route('Route_BackEnd_User_List')}}" method="get">
                                    <div class="form-group d-flex flex-md-row">
                                        <input type="text" name="search" placeholder="Tìm kiếm" class="form-control"/>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-list mt-4">
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
                            @foreach($users as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><a href="{{url('/admin/users/detail/'.$item->id)}}">{{$item->name}}</a></td>
                                    <td>{{$item->email}}</td>
                                    <td><img src="{{asset('storage/'.$item->avatar)}}" width="100px" style="border-radius: 50%"/></td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>
                                        <input data-id="{{$item->id}}" class="toggle-class" type="checkbox" name="toggle" id="toggle" data-toggle="toggle" data-on="Enabled" data-off="Disabled" {{ $item->status ? 'checked' : ''}} />
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');
                alert(user_id);
                // $.ajax({
                //     type: "GET",
                //     dataType: "json",
                //     url: '/changeStatus',
                //     data: {'status': status, 'user_id': user_id},
                //     success: function(data){
                //         console.log(data.success)
                //     }
                // });
            })
        })
    </script>
@endsection

