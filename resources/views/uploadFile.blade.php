<form action="{{route('postFile')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="myFile" /><br/>
    <button type="submit">Submit</button>
</form>
