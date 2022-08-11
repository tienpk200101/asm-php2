<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('search')}}" method="get">
        <input type="text" name="search" value="{{old('search')}}"/>
        <br/>
        <button type="submit">Search</button>
    </form>
    <ul>
        @foreach($products as $item)
            <li>{{$item->name}}</li>
        @endforeach
    </ul>
</body>
</html>
