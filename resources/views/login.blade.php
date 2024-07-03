<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyAchievements - Login</title>

    
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body class="bg-gradient-gray">

    <div class="container">
        
        @if(session()->has('success'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
          </svg>
          <div class="alert alert-success alert-dismissible d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        @endif

        @if(session()->has('loginError'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
          </svg>
        <div class="alert alert-danger alert-dismissible d-flex align-items-center mt-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        @endif
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="mt-0 col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/sekolah.png" class="image-fluid" width="450px" height="600px" style="border-radius: 0.3rem 0 0 0.3rem">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h2 class="h2 text-gray-900 mb-4">Welcome to MyAchievements</h2>
                                        <h6 class="h6 text-gray-dark-900 mb-4">SMKN 2 Singosari Student Achievement Management Website</h6>
                                    </div>
                                    <form class="user" action="/login" name="login" id="login" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" @if(Cookie::has('email')) value="{{ Cookie::get('email') }}" @endif class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Email Address" autofocus required value="{{ old('email') }}" autocomplete="email">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" @if(Cookie::has('password')) value="{{ Cookie::get('password') }}" @endif class="form-control"
                                                id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                                <span class="bi bi-eye-slash-fill p-1 text-center" id="togglePassword" style="position: relative; right:-395px; top: -30px; background-color:white;"></span>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="custom-control custom-checkbox small">
                                                                <input type="checkbox" @if(Cookie::has('email')) checked @endif class="custom-control-input" id="remember" name="remember">
                                                                <label class="custom-control-label" for="remember">Remember
                                                                    Me</label>
                                                            </div>
                                                        </div>
                                                        <div class="col text-end">
                                                            <a class="small" href="{{ route('forgotpassword.index') }}">Forgot Password?</a>
                                                        </div>
                                                    </div>                                            
                                                </div>
                                        </div>
                                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p class="h6 text-center">Not yet registered? <a class="small" href="{{ route('register.index') }}">Create an Account!</a></p>
                                        <p class="h6 text-center text-gray-600 small mb-1">OR</p>
                                        <p class="h6 text-center">Back to Home Page? <a class="small" href="{{ route('landingpage') }}">Home</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    {{-- <!-- Bootstrap core JavaScript-->
        <script src="jquery/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        
        <!-- Core plugin JavaScript-->
        <script src="jquery-easing/jquery.easing.min.js"></script>
        
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script> --}}

</body>
    <script>
        window.addEventListener("DOMContentLoaded", function () {
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");
        
            togglePassword.addEventListener("click", function (e) {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                // toggle the eye / eye slash icon
                this.classList.toggle("bi-eye");
            });
        });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</html>