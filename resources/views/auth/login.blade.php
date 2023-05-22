<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");body{background-color: #eee;font-family: "Poppins", sans-serif;font-weight: 300}
        .container{height: 100vh}.card{width: 400px;border:none}
        .form-control{border: 2px solid #bdc1d2;font-size: 13px;height: 48px}
        .form-control:focus{color: #495057;background-color: #fff;border-color: #f7bfd9;outline: 0;box-shadow: none}.form{position: relative;margin-bottom: 25px}.form a{position: absolute;right: 8px;bottom: 10px;color: #6ca0d6;font-size: 13px;text-decoration: none;z-index: 10;background-color: #fff;padding: 5px}
        .continue{height: 48px;font-size: 13px;background-color: #e91e63;border: none}
        .line-text{color:#cecece}.line{background-color: #eeeff6;width: 166px;height: 2px}
        .member a{color: #e91e63;font-size: 14px}
        .member span{font-size: 13px;font-weight: 400;color: #6ca0d6}
        .facebook-button{background-color: #39559f}
        .facebook-button:hover{background-color: #39559f}
        .facebook:focus{color: #fff;background-color: #4285f4;border-color: #4285f4;box-shadow: none}
        .google-button{background-color: #4285f4}
        .google-button:hover{background-color: #4285f4}
    </style>
</head>
<body>


    <div class="container d-flex justify-content-center align-items-center">


        <div class="card">
            <div class="p-3 border-bottom d-flex align-items-center justify-content-center">
                <h5>Login to HexGig</h5> </div> <div class="p-3 px-4 py-4 border-bottom">
                    <input type="text" class="form-control mb-2" placeholder="Email/Username/Phone" />
                    <div class="form">
                        <input type="password" class="form-control" placeholder="Password" /> <a href="#">Forgot?</a>
                    </div>
                    <button class="btn btn-danger btn-block continue">Continue</button>
                    <div class="d-flex justify-content-center align-items-center mt-3 mb-3">
                        <span class="line"></span> <small class="px-2 line-text">OR</small>
                        <span class="line"></span> </div>
                        <button onclick="location.href='{{ url('auth/facebook') }}'" class="btn btn-danger btn-block continue facebook-button d-flex justify-content-start align-items-center"> <i class="fa fa-facebook ml-2"></i> <span class="ml-5 px-4">Continue with facebook</span> </button>
                        <button onclick="location.href='{{ url('auth/google') }}'" class="btn btn-danger btn-block continue google-button d-flex justify-content-start align-items-center"> <i class="fa fa-google ml-2"></i> <span class="ml-5 px-4">Continue with Google</span> </button>
                    </div>
                    <div class="p-3 d-flex flex-row justify-content-center align-items-center member"> <span>Not a member? </span> <a href="{{ route('userRegistration.index') }}" class="text-decoration-none ml-2">SIGNUP</a>
                    </div>
                </div>

            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>

