<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fireworks</title>
    <link rel="icon" href="{{url('assets/img/logo.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3 shadow">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <img src="{{url('assets/img/logo.png')}}" alt="" style="width:80px;"
                                            class="mx-auto d-block">
                                        <h5 class="card-title text-center pb-0 fs-4"><b>Login to Your Account</b></h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post" action="{{url('/')}}"
                                        id="loginForm">
                                        @if(Session::has('success'))
                                        <div class="alert  alert-success">{{Session::get('success')}}</div>
                                        @endif
                                        @if(Session::has('fail'))
                                        <div class="alert  alert-danger">{{Session::get('fail')}}</div>
                                        @endif
                                        @csrf

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Email</label>
                                            <input class="form-control" type="text" name="email" id="email">
                                            <span class="text-danger">
                                                @error('email')
                                                {{$message}}

                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input class="form-control" type="password" name="password"
                                                    id="password">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="showPasswordBtn">Show</button>
                                            </div>
                                            <span class="text-danger">
                                                @error('password')
                                                {{$message}}
                                                @enderror
                                            </span>
                                        </div>

                                        <script>
                                        const passwordInput = document.getElementById('password');
                                        const showPasswordBtn = document.getElementById('showPasswordBtn');

                                        showPasswordBtn.addEventListener('click', () => {
                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                showPasswordBtn.innerText = 'Hide';
                                            } else {
                                                passwordInput.type = 'password';
                                                showPasswordBtn.innerText = 'Show';
                                            }
                                        });
                                        </script>




                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="remember-me">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" id="login-btn">

                                                Login
                                            </button>
                                        </div>

                                        <p class="text-muted text-center mt-3 mb-0">Don't have an account? <a href="#"
                                                class="text-primary ml-1" data-bs-toggle="modal"
                                                data-bs-target="#myModal">register</a>
                                        </p>

                                    </form>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->





    <!-- The User Registration Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create User Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{url('/users')}}">
                        @csrf
                        <label>Name</label>
                        <input class=" w3-input w3-border w3-round" type="text" name="name">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                        <br>

                        <label>Email</label>
                        <input class="w3-input w3-border w3-round" type="text" name="email"><br>

                        <label>Password</label>
                        <input class="w3-input w3-border w3-round" type="text" name="password"><br>

                        <label>Role</label>
                        <input class="w3-input w3-border w3-round" type="text" name="role"><br>



                        <input type="hidden" name="status" value="Active"><br>


                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </form>
                </div>



            </div>
        </div>
    </div>



    <script>
    document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
    }, false);
    </script>

    <script>
    // Get references to the email, password, and remember me checkbox elements
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const rememberMeCheckbox = document.getElementById("remember-me");

    // Load the email and password from local storage if they exist
    if (localStorage.getItem("email")) {
        emailInput.value = localStorage.getItem("email");
    }

    if (localStorage.getItem("password")) {
        passwordInput.value = localStorage.getItem("password");
    }

    // Save the email and password to local storage when the remember me checkbox is clicked
    rememberMeCheckbox.addEventListener("click", () => {
        if (rememberMeCheckbox.checked) {
            localStorage.setItem("email", emailInput.value);
            localStorage.setItem("password", passwordInput.value);
        } else {
            localStorage.removeItem("email");
            localStorage.removeItem("password");
        }
    });
    </script>

    <style>
    a {
        text-decoration: none;
    }
    </style>




</body>

</html>