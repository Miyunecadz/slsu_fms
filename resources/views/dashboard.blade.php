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
<body class="bg-white">
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container my-0 border-0">
                <a class="navbar-brand text-white ms-1" href="#">SLSU-FMS</a>
                <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item active">
                            <a class="nav-link text-light" href="{{route('dashboard')}}"><i class="fas fa-home me-1"></i> Home</a>
                        </li>
                        <li class="nav-item">
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
                                <li><a class="dropdown-item" href="#">Sign-out</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-fluid d-md-block d-lg-none nav2 border-0 px-0">
        <div class="container py-0">
            <div class="d-flex justify-content-between align-items-center">
                <div class="py-1 home w-100 active text-center mx-2">
                    <a href="{{route('dashboard')}}"><i class="fas fa-home d-block pb-1 mt-1"></i><span>Home</span></a>
                </div>
                <div class="py-1 new_folder w-100 text-center mx-2">
                    <a href="{{route('newFolder', ['dir' => request()->dir])}}"><i class="fas fa-folder d-block pb-1 mt-1"></i><span>New Folder</span></a>
                </div>
                <div class="py-1 upload-file w-100 text-center mx-2">
                    <a href="{{route('upload.file', ['dir' => request()->dir])}}"><span><i class="fas fa-upload d-block pb-1 mt-1"></i>Upload File</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light shadow-sm">
        <div class="container pt-3 pb-1">
            <nav aria-label="breadcrumb mb-0">
                <ol class="breadcrumb">
                    <li><a href="/" class="me-1">Dashboard</a></li>
                    @for ($x = 0 ; $x < count($datas['sections']) ; $x++)
                        @if ($datas['sections'][$x] != $datas['sections'][count($datas['sections']) - 1])
                        <li class="breadcrumb-item ms-1">
                            <a href="{{route('dashboard', ['dir' => 'public/' .$datas['urls'][$x]])}}">{{$datas['sections'][$x]}}</a>
                        </li>
                        @else
                        <li class="breadcrumb-item ms-0 ps-0">
                            <a class="ps-1" href="{{route('dashboard', ['dir' => 'public/' .$datas['urls'][$x]])}}">{{$datas['sections'][$x]}}</a>
                        </li>
                        @endif
                    @endfor
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid mt-3 folders">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6">
                    <div class="mobile mx-2">
                        @if(!empty($dirs))
                        <h5 class="ps-1"><i class="fas fa-folder-open me-2 text-warning"></i>Folders</h5>
                        <div class="folder-lists ms-2">
                            <ul>
                                @foreach ($dirs as $dir)
                                <li class="py-1 my-1 folder-item-list">
                                    <div class="border border-secondary p-3 rounded d-flex justify-content-between align-items-center folder" id="folder">
                                        <a class="text-secondary" href="{{route('dashboard', ['dir' => $dir])}}">{{basename($dir)}}</a>
                                        <div class='float folder-editDelete-menu'>
                                            <ul class="ps-0">
                                                <li><a href="" class="text-info"><i class="fas fa-edit"></i></a></li>
                                                <li class="ms-2"><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></li>
                                                <li class="ms-2"><a class="text-secondary folder-close" id="close"><i class="fas fa-times"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid files">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6">
                    <div class="mobile mx-2 {{!empty($files) ? 'mt-3' : ''}}">
                        @if(!empty($files))
                        <h5 class="ps-1 text-dark"><i class="fas fa-file-invoice me-2 text-primary"></i>Files</h5>
                        <div class="file-lists ms-1">
                            <ul>
                                @foreach ($files as $file)
                                <li class="py-1 my-1">
                                    <div class="border border-secondary p-3 rounded rounded d-flex justify-content-between align-items-center file" id="file">
                                        <a class="text-secondary" href="{{Storage::url($file)}}" download="{{basename($file)}}">{{basename($file)}}</a>
                                        <div class='float file-editDelete-menu'>
                                            <ul class="ps-0">
                                                <li><a href="" class="text-info"><i class="fas fa-edit"></i></a></li>
                                                <li class="ms-2"><a href="" class="text-danger"><i class="fas fa-trash-alt"></i></a></li>
                                                <li class="ms-2"><a class="text-secondary file-close" id="close"><i class="fas fa-times"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
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
    <script src="{{asset('custom/long-press.js')}}"></script>
    <script>
        var btn = document.querySelector('.floating-icon');
        btn.addEventListener('click', () => {
            btn.classList.contains('show-floating-menu') ? btn.classList.remove('show-floating-menu') : btn.classList.add('show-floating-menu')
        });

        (function () {

            var delay;
            var longpress = 0;

            var listItems = document.getElementsByClassName('folder');
            var listItem;

            for (var i = 0, j = listItems.length; i < j; i++) {
                listItem = listItems[i];

                listItem.addEventListener('long-press', function (e) {
                    var _this = this;
                    delay = setTimeout(check, longpress);
                
                    function check() {
                        _this.classList.add('is-selected');
                    }
                
                }, true);

                listItem.addEventListener('mouseup', function (e) {
                    clearTimeout(delay);
                });
                
                listItem.addEventListener('mouseout', function (e) {
                    (delay);
                });
            }

        }());

        (function () {

            var delay;
            var longpress = 0;

            var listItems = document.getElementsByClassName('file');
            var listItem;

            for (var i = 0, j = listItems.length; i < j; i++) {
                listItem = listItems[i];

                listItem.addEventListener('long-press', function (e) {
                    var _this = this;
                    delay = setTimeout(check, longpress);
                
                    function check() {
                        _this.classList.add('is-selected');
                    }
                
                }, true);

                listItem.addEventListener('mouseup', function (e) {
                    clearTimeout(delay);
                });
                
                listItem.addEventListener('mouseout', function (e) {
                    (delay);
                });
            }

            }());

        (function () {

            var closeBtn = document.getElementsByClassName('folder-close');
            var close;

            for (var i = 0, j = closeBtn.length; i < j; i++) {
                close = closeBtn[i];
            
                close.addEventListener('click', function () {
                    document.querySelectorAll('.folder').forEach((item) => {
                        if(item.classList.contains('is-selected')){
                            item.classList.remove('is-selected')
                        }
                    })
                    
                }, true);
            }

        }());

        (function () {

            var closeBtn = document.getElementsByClassName('file-close');
            var close;

            for (var i = 0, j = closeBtn.length; i < j; i++) {
                close = closeBtn[i];

                close.addEventListener('click', function () {
                    document.querySelectorAll('.file').forEach((item) => {
                        if(item.classList.contains('is-selected')){
                            item.classList.remove('is-selected')
                        }
                    })
                    
                }, true);
            }

            }());

    </script>
</body>
</html>
