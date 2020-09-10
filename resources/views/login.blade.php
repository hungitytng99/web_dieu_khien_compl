
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login controller</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('/images/NIK_0477.JPG');">

      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Login
        </span>
        

        <form class="login100-form validate-form p-b-33 p-t-5" action="" method="post">


          <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="username" placeholder="User name"required>
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="password" placeholder="Password"required>
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>
          <div class="pull-right" style="padding: 10px 10px;font-family: courier; font-size: 20%;">
            <a class="btn btn-primary" style="font-size: 15px; color: tomato"  href="/myregister">Create new account</a>
          </div>
        @if (session('error'))
          <div class="pull-left" role="alert" style="color: tomato">
              {{ session('error') }}
          </div>
        @endif
          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </div>
  
@include('footer')


  <div id="dropDownSelect1"></div>
  <script src="js/main.js"></script>

</body>
</html>