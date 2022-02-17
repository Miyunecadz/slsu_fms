<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="{{route('newFolder', ['dir' => request()->dir])}}">New Folder</a>
    <br>
    <a href="{{route('upload.file', ['dir' => request()->dir])}}">Upload File</a>
    <br>
    <hr>
    <div>
        <a href="/">Home</a>
        /

        @for ($x = 0 ; $x < count($datas['sections']) ; $x++)

            @if ($datas['sections'][$x] != $datas['sections'][count($datas['sections']) - 1])
                <a href="{{route('dashboard', ['dir' => 'public/' .$datas['urls'][$x]])}}">{{$datas['sections'][$x]}}</a> /
            @else
                <span>{{$datas['sections'][$x]}}</span>

            @endif
        @endfor

    </div>
    <h2>Folders</h2>
    <ul>
        @forelse ($dirs as $dir)
            <li><a href="{{route('dashboard', ['dir' => $dir])}}">{{basename($dir)}}</a></li>
        @empty
            <li>No folder found</li>
        @endforelse

    </ul>

    <hr>
    <h2>Files</h2>
    <ul>
        @forelse ($files as $file)
        <li><a href="{{Storage::url($file)}}" download="">{{basename($file)}}</a></li>

        @empty
            <li>No file found</li>
        @endforelse
    </ul>
</body>
</html>
