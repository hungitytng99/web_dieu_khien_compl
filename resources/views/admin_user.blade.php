

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  @include('title')
  <div class="limiter">
    <div class="container-login100" style="background-image: url('/images/NIK_0477.JPG');">
        
      <form class="login100-form validate-form p-b-33 p-t-5" action="/addus" method="post" >
        
        <span  style="color: darkred; font-family: courier; font-size: 200%;margin: 50px 50px; font-weight: bold; ">
                    USER MANAGEMENT
        </span>
    
        
        <div class="row">
        
          <div class="col-md-4">
                <div class="card-title" style="margin: 10px 50px; font-size: 150%; color: darkred;">
                  ADD USER
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <form>
                  <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="username" class="form-control" id="exampleInputName"  placeholder="Enter Name" required>
                  </div>
                  <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                    <label for="exampleInputFullName">Full name</label>
                    <input type="text" name="fullname" class="form-control" id="exampleInputFullName"  placeholder="Enter full name" required>
                  </div>
                  <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                  </div>
                  <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="confirm_password" placeholder="Confirm password" required>
                  </div>
                  <button type="submit" class="btn btn-lg btn-primary" style="margin: 10px 50px; font-size: 100%; ">ADD</button>
                </form>


                
          </div>
          <div class="col-md-8">
            <div style="width: 100%;vertical-align: top">
                <div class="card-title" style="margin: 20px 0px; font-size: 150%; color: darkred;">
                    LIST USER
                </div>

                @if (session('success'))
                    <div class="alert alert-success" role="alert" style=" margin: 10px 0px;width: 100%">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert" style=" margin: 10px 0px;width: 100%">
                        {{ session('error') }}
                    </div>
                @endif  
                <div class="table-responsive">
                <table class="table" border="1"  style="width: 100%;">
                  <thead>
                      <tr>
                          <th style="width: 30%">Full name</th>
                          <th style="width: 30%">User name</th>
                          <th style="width: 40%">Email</th>
                          <th style="width: 30%">Tools</th>
                      </tr>
                  </thead>
                  </tbody>
                        <?php foreach ($user as $value) {?>
                        <tr>
                            <td><?php echo $value->fullname;?> </td>
                            <td><?php echo $value->username;?> </td>
                            <td><?php echo $value->email;?> </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" class="btn btn-info" href="/editus/{{$value->id}}">Edit</a>  
                                <a type="button" onclick="return confirm('Do you want to delete user <?php echo $value->fullname ?> ?')"  class="btn btn-danger" href="/deleteus/{{$value->id}}">Delete </a>
                                <a type="button" class="btn btn-warning" href="/reset_pw/{{$value->id}}">Reset Password</a>  
                              </div>
                              
                            </td>
                        </tr>
                          <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
    
</form>
</div>
</div>
@include('footer')

  <div id="dropDownSelect1"></div>
  <script src="js/main.js"></script>    
</body>

</html>
