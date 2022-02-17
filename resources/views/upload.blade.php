<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Uploading file to {{$dir??'root'}}</h1>
    <form action="{{route('upload.file')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="dir" value="{{$dir}}">
        <input type="file" name="file" id="file" >
        <button type="submit">Upload</button>
    </form>
</body>
</html>
