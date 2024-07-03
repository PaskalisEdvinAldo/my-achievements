<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MyAchievements - Registration</title>
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom fonts for this template-->
    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}

    <!-- Custom styles for this template-->
    
</head>

<body class="bg-gradient-gray">
    
    <div class="container">
        
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="img/sekolah.png" class="image-fluid" width="450px" height="600px" style="border-radius: 0.3rem 0 0 0.3rem">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <div id="form-errors" class="tet-danger">
                                <form class="user" action="{{ route('register.validation') }}" id="register" method="POST" name="register">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control  @error('fullname')
                                            is-invalid @enderror" id="fullname" name="fullname"
                                            placeholder="Full Name" required autofocus value="{{ old('fullname') }}">
                                            @error('fullname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('nickname')
                                            is-invalid @enderror" id="nickname" name="nickname"
                                            placeholder="Nickname" required value="{{ old('nickname') }}">
                                            @error('nickname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select id="category" class="form-select @error('category') is-invalid @enderror" form="register" name="category" value="{{ old('category') }}" required>
                                            <option selected disabled>choose category</option>
                                            <option value="Fiction" {{ old('category') == 'Fiction' ? 'selected' : '' }}>Fictional Character Name</option>
                                            <option value="Pet" {{ old('category') == 'Pet' ? 'selected' : '' }}>Pet Name</option>
                                            <option value="Place" {{ old('category') == 'Favorite' ? 'selected' : '' }}>Favorite Place</option>
                                        </select>
                                        @error('category')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div id="fictional_character" style="display: none;">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('fictional_character')
                                            is-invalid @enderror" id="fictional_character" name="fictional_character"
                                            placeholder="Fictional Character Name" value="{{ old('fictional_character') }}">
                                            @error('fictional_character')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="pet_name" style="display: none;">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('pet_name')
                                            is-invalid @enderror" id="pet_name" name="pet_name"
                                            placeholder="Pet's Name" value="{{ old('pet_name') }}">
                                            @error('pet_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="favorite_place" style="display: none;">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('favorite_place')
                                            is-invalid @enderror" id="favorite_place" name="favorite_place"
                                            placeholder="Favorite Place" value="{{ old('favorite_place') }}">
                                            @error('favorite_place')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email')
                                        is-invalid @enderror" id="email" name="email"
                                        placeholder="Email Address" required value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control @error('password')
                                            is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                                            <span class="bi bi-eye-slash-fill p-1 text-center" id="togglePassword" style="position: absolute; right:20px; top: 2.5px; background-color:white;"></span>
                                            @error('password')
                                               <div class="invalid-feedback">
                                                   {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control @error('password_confirmation')
                                            is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                                            <span class="bi bi-eye-slash-fill p-1 text-center" id="toggleRePassword" style="position: absolute; right:20px; top: 2.5px; background-color:white;"></span>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">Register Account</button>
                                    <hr>
                                </form>
                            </div>
                            <div class="text-center">
                                <p class="h6 text-center">Already registered? <a class="small" href="{{ route('login.index') }}">Login!</a></p>
                                <p class="h6 text-center text-gray-600 small mb-1">OR</p>
                                <p class="h6 text-center">Back to Home Page? <a class="small" href="{{ route('landingpage') }}">Home</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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

    <script>
        window.addEventListener("DOMContentLoaded", function () {
            const togglePassword = document.querySelector("#toggleRePassword");
            const password = document.querySelector("#password_confirmation");
            
            togglePassword.addEventListener("click", function (e) {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
                // toggle the eye / eye slash icon
                this.classList.toggle("bi-eye");
            });
        });
    </script>

    <script>
        document.getElementById('category').addEventListener('change', function() {
            var category = this.value;
            if (category === 'Fiction') {
                document.getElementById('fictional_character').style.display = 'block';
                document.getElementById('pet_name').style.display = 'none';
                document.getElementById('favorite_place').style.display = 'none';
            } else if (category === 'Pet') {
                document.getElementById('pet_name').style.display = 'block';
                document.getElementById('fictional_character').style.display = 'none';
                document.getElementById('favorite_place').style.display = 'none';
            } else if (category === 'Place') {
                document.getElementById('favorite_place').style.display = 'block';
                document.getElementById('fictional_character').style.display = 'none';
                document.getElementById('pet_name').style.display = 'none';
            }
        });
    </script>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</html>