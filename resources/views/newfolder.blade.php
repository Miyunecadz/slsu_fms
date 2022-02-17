<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create folder to {{$dir??'root'}}</h1>
    <form action="{{route('create.folder')}}" method="post">
        @csrf
        <input type="hidden" name="dir" value="{{$dir ?? 'public/'}}">
        <input type="text" name="name" id="name" placeholder="Folder name">
        <button type="submit">Create</button>
    </form>
</body>
</html>
