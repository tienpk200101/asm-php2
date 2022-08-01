<form id="add-cate" class="mt-4" method="post" action="{{route('route_BackEnd_Category_Post')}}" enctype="multipart/form-data">
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
        @error('name')
            <p class="text text-danger">{{$message}}</p>
        @enderror
    </div>
    <div class="form-group">
        <div class="btn btn-danger" id="close">Hủy</div>
        <button class="btn btn-primary">Thêm</button>
    </div>
    @csrf
</form>
