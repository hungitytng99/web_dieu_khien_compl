
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit user</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('/images/NIK_0477.JPG');">

      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Update profile
        </span>
        

        <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="">

                  @csrf
                  <div class="form-group" style=" margin: 5px 5px;font-size: 100%; color: darkred;">
                    <label for="exampleInputName">User name</label>
                    <input type="text" name="username" class="form-control" id="exampleInputName"  placeholder="Enter Name" value="{{ $user->username }}" required>
                  </div>
                  <div class="form-group" style=" margin: 5px 5px;font-size: 100%; color: darkred;">
                    <label for="exampleInputFullName">Full name</label>
                    <input type="text" name="fullname" class="form-control" id="exampleInputFullName" value="{{ $user->fullname }}" placeholder="Enter full name" required>
                  </div>
                  <div class="form-group" style="margin: 5px 5px; font-size: 100%; color: darkred;">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $user->email }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  @if (session('error'))
                  <div class="alert alert-danger" style="margin: 5px 5px"; role="alert" style="color:Tomato">
                      {{ session('error') }}
                  </div>
                @endif

                <button class="btn btn-info" type="submit" style="margin: 5px 5px">Submit</button>
            
            
                <?php if(Cookie::get('table')=='users'){ ?>
                    <a class="btn btn-warning" href="/home/{{$user->id}}">Cancel</a>
                <?php }
                ?>
                <?php if(Cookie::get('table')=='admin'){ ?>
                    <a class="btn btn-warning" href="/homead">Cancel</a>
                <?php }
                ?>
            
        </form>
      </div>
    </div>
  </div>
  
@include('footer')


  <div id="dropDownSelect1"></div>
  <script src="js/main.js"></script>

</body>
</html>




