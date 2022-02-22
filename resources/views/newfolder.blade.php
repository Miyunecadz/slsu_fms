<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('custom/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
</head>
<body>
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container my-0 border-0">
                <a class="navbar-brand text-white ms-1" href="#">SLSU-FMS</a>
                <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('dashboard')}}"><i class="fas fa-home me-1"></i> Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-light" href="{{route('newFolder', ['dir' => request()->dir])}}"><i class="fas fa-folder me-1"></i> New Folder</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{route('upload.file', ['dir' => request()->dir])}}"><i class="fas fa-upload me-1"></i> Upload File</a>
                        </li>
                    </ul>
                </div>
                <span class="navbar-text">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="dropdown img-icon d-flex justify-content-center align-items-center">
                            <b>BA</b>
                        </div>
                        <h6 class="d-none d-md-block text-white mt-1 ms-2">Benigno E. Ambus Jr.</h6>
                        <div class="dropdown">
                            <div class="btn btn-danger dropdown-toggle ms-1" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></div>
                            <ul class="dropdown-menu p-1" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{route('login')}}">Sign-out</a></li>
                            </ul>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-fluid d-md-block d-lg-none nav2 border-0 px-0">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="py-2 home w-100 text-center mx-2">
                    <a href="{{route('dashboard')}}"><i class="fas fa-home d-block pb-1 mt-1"></i><span>Home</span></a>
                </div>
                <div class="py-2 new_folder w-100 active text-center mx-2">
                    <a href="{{route('newFolder', ['dir' => request()->dir])}}"><i class="fas fa-folder d-block pb-1 mt-1"></i><span>New Folder</span></a>
                </div>
                <div class="py-2 upload-file w-100 text-center mx-2">
                    <a href="{{route('upload.file', ['dir' => request()->dir])}}"><span><i class="fas fa-upload d-block pb-1 mt-1"></i>Upload File</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container pt-3 pb-1">
            <nav aria-label="breadcrumb mb-0">
                <ol class="breadcrumb">
                    <li><a href="/" class="me-1 text-primary">Dashboard</a></li>
                    @for ($x = 0 ; $x < count($datas['sections']) ; $x++)
                        @if ($datas['sections'][$x] != $datas['sections'][count($datas['sections']) - 1])
                        <li class="breadcrumb-item">
                            <a class="ms-1" href="{{route('dashboard', ['dir' => 'public/' .$datas['urls'][$x]])}}">{{$datas['sections'][$x]}}</a>
                        </li>
                        @else
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard', ['dir' => 'public/' .$datas['urls'][$x]])}}" class="ms-1 text-primary">{{$datas['sections'][$x]}}</a>
                        </li>
                        @endif
                    @endfor
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-3 text-dark"><i class="fas fa-folder me-2 text-warning"></i>Create Folder</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('create.folder')}}" method="post" class="mt-3 px-3">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="folder_name">Enter folder name</label>
                        <input type="hidden" id="folder_name" name="dir" value="{{$dir ?? 'public/'}}">
                        <input type="text" class="form-control mt-2 py-3" name="name" id="name" placeholder="Folder name">
                    </div>
                    <button class="btn btn-primary mt-3 px-4 create-folder" type="submit"><i class="fas fa-folder-plus me-1"></i> Create</button>
                </form>
            </div>
        </div>
    </div>
    <div class="shadow-sm d-block d-md-none floating-icon">
        <i class="fas fa-plus"></i>
    </div>
    <div class="floating-menu border shadow-sm">
        <ul>
            <li class="my-1 py-1"><a href="{{route('newFolder', ['dir' => request()->dir])}}" class="text-secondary"><i class="fas fa-folder-plus me-2"></i>Create new folder</a></li>
            <li class="my-1 py-1"><a href="{{route('upload.file', ['dir' => request()->dir])}}" class="text-secondary"><i class="fas fa-upload me-2"></i>Upload file</a></li>
        </ul>
    </div>
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>
        var btn = document.querySelector('.floating-icon');
        btn.addEventListener('click', () => {
            btn.classList.contains('show-floating-menu') ? btn.classList.remove('show-floating-menu') : btn.classList.add('show-floating-menu')
        })
    </script>
</body>
</html>
