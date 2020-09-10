
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit device</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<style type="text/css">
    .button1 {
      background-color: indianred;
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 15px;
      margin: 10px 10px;
      cursor: pointer;
      border-radius: 8px;
    }
    .input1 {
      width: 95%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid darkred;
      outline: none;
    }

    .input1:focus {
      background-color:lightcoral;
    }
</style>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('/images/NIK_0477.JPG');">

      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">
          Edit device
        </span>
        

        <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="/updatetb/{{$value->id}}">


            @method('PATCH')
            @csrf
            
            <div class="form-group" style="margin: 5px 5px; font-size: 100%; color: darkred;">
                <label for="exampleInputName">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName"  placeholder="Enter Name" value="{{ $value->name }}" required>
              </div>
              <div class="form-group" style="margin: 5px 5px; font-size: 100%; color: darkred;">
                <label for="exampleInputIp_address">Ip address</label>
                <input type="text" name="ip_address" class="form-control" id="exampleInputIp_address"  placeholder="Enter ip address" value="{{ $value->ip_address }}" required>
              </div>
              <div class="form-group" style="margin: 5px 5px; font-size: 100%; color: darkred;">
                <label for="exampleInputPort">Port</label>
                <input type="text" name="port" class="form-control" id="exampleInputPort"  placeholder="Enter port" value="{{ $value->port }}" required>
              </div>
              <div class="form-group" style="margin: 5px 5px; font-size: 100%; color: darkred;">
                <label for="exampleInputon">Script on Device</label>
                <input type="text" name="scriptOn" class="form-control" id="exampleInputon"  placeholder="Enter Script on Device"  value="{{ $value->scriptOn }}" required>
              </div>
              <div class="form-group" style="margin: 5px 5px; font-size: 100%; color: darkred;">
                <label for="exampleInputoff">Script off Device</label>
                <input type="text" name="scriptOff" class="form-control" id="exampleInputoff"  placeholder="Enter Script off Device" value="{{ $value->scriptOff }}" required>
              </div>
              <div class="form-group" style="margin: 5px 5px; font-size: 100%; color: darkred;">
                <label for="exampleInputStatus">Status Path</label>
                <input type="text" name="statusPath" class="form-control" id="exampleInputStatus"  placeholder="Enter Status Path" value="{{ $value->statusPath }}" required>
              </div>
              
              <?php
              if($value->isShowUser==1){
              ?>
              <input type="checkbox" name="isShowUser" value="isShowUser" style="margin: 5px 5px;" checked >
              <label for="isShowUser" style="color: darkred;margin: 5px 5px;"> Show user</label><br>

              <?php
              }
              ?>

              <?php
              if($value->isShowUser==0){
              ?>
              <input type="checkbox" name="isShowUser" value="isShowUser" style="margin: 5px 5px;"  >
              <label for="isShowUser" style="color: darkred;margin: 5px 5px;"> Show user</label><br>

              <?php
              }
              ?>
              @if (session('error'))
                <div class="alert alert-danger" style="margin: 5px 5px;"; role="alert" style="color:Tomato">
                    {{ session('error') }}
                </div>
              @endif

              <button class="btn btn-info" type="submit" style="margin: 5px 5px;">Submit</button>
          
          
              <a class="btn btn-warning" href="/admin_thiet_bi">Cancel</a>
            
        </form>
      </div>
    </div>
  </div>
  

@include('footer')

  <div id="dropDownSelect1"></div>
  <script src="js/main.js"></script>

</body>
</html>





