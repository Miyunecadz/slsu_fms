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
        <nav class="navbar navbar-expand-lg navbar-light bg-light login">
            <div class="container my-0 border-0">
                <div class="row">
                    <div class="navbar-logo d-flex justify-content-start align-items-center py-2">
                        <img width="70" src="{{asset('img/SLSU.png')}}" alt="SLSU Logo">
                        <div class="ms-3">
                            <a class="navbar-brand text-light d-block d-md-none" href="#">SOUTHERN LEYTE <br>STATE UNIVERSITY</a>
                            <a class="navbar-brand text-light d-none d-md-block" href="#">SOUTHERN LEYTE STATE UNIVERSITY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid bg-light shadow-sm">
        <div class="container py-3">
            <h4 class="text-left">File Management System</h4>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <!-- <h3 class="text-center">Southern Leyte State University</h3>
                <h3 class="text-center">File Management System</h3> -->
                <div class="py-4 px-3 mt-3">
                    <h3 class="text-center">Login User Credential</h3>
                    <form action="" class="mt-5">
                        <div class="form-group mt-1">
                            <label for="">Enter username</label>
                            <input type="text" class="form-control py-3" placeholder="Your username here ...">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Enter password</label>
                            <input type="password" class="form-control py-3" placeholder="Your password here ...">
                        </div>
                        <div class="mt-5" align="center">
                            <button class="btn btn-primary py-2 px-3 login-btn"><i class="fas fa-pencil me-2"></i>LOGIN</button> 
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-muted text-center mt-5 footer">SLSU-FMS @ CCSIT - 2022</p>
            <p class="text-muted text-center footer">Developed By: CCSIT Dev Team</p>
        </div>
    </div>
    
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
