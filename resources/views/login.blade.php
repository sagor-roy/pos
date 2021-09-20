<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        html,
        body {
            background-color: #dddddd;
        }
        .login_box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            margin-top: 120px;
        }
        label.icon {
            font-size: 20px;
            padding: 2px 10px;
            border: 1px solid #ddd;
            margin: 0;
            color: #6c757d;
            border-right: none;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7 col-sm-8 col-10 mx-auto">
                    <div class="login_box shadow">
                        <div class="text-center">
                            <img width="80" class="rounded-circle" src="https://icons-for-free.com/iconfiles/png/512/business+costume+male+man+office+user+icon-1320196264882354682.png" alt="img">
                            <h5 class=" font-weight-bold">ADMIN</h5>
                        </div>
                        @if(session('message'))
                            <div class="alert alert-{{ session('type') == 'success' ? 'success':'danger' }}">{{ session('message') }}</div>
                        @endif
                        <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="input-group mt-3">
                                <label class="icon"><i class="fas fa-envelope fa-1x"></i></label>
                                <input type="email" name="email" placeholder="example@gmail.com" value="{{ old('email') }}" class="form-control rounded-0" required>
                            </div>
                            <div class="input-group mt-3">
                                <label class="icon"><i class="fas fa-lock fa-1x"></i></label>
                                <input type="password" id="myInput" name="password" placeholder="Password" class="form-control rounded-0" required>
                            </div>
                            <div class="form-group mt-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <input onclick="myFunction()" type="checkbox" id="show">
                                        <label class="font-weight-normal mb-0 ml-1" for="show">Show Password</label>
                                    </div>
                                    <div>
                                        <a href="">Forgotten Password?</a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        function myFunction() {
          var x = document.getElementById("myInput");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        </script>
</body>
</html>
