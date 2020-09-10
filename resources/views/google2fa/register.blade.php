
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register controller</title>
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
          Set up Google Authenticator
        </span>
        
            <div class="panel-body" style="text-align: center;">
                    <p style="color: white">Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code {{ $secret }}</p>
                    <p style="color: white">Use the google authenticator app on your phone to create 2-factor authentication. </p>
                    <a style="color: white" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en"> download here</a>

                    <div>
                        <img src="{{ $QR_Image }}">
                    </div>
                    @if (!@$reauthenticating) {{-- add this line --}}

                        <p style="color: white">You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
                            <div class="container-login100-form-btn m-t-32">
                                <a href="/complete-registration"><button class="login100-form-btn">Complete Registration</button></a>
                            </div>
                    @endif {{-- and this line --}}
            </div>
          
          @csrf
      </div>
    </div>
  </div>
  
@include('footer')


 <div id="dropDownSelect1"></div>
  <script src="js/main.js"></script>

</body>
</html> 

