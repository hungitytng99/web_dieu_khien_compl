
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Device management</title><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
      <form class="login100-form validate-form p-b-33 p-t-5" action="/addtb" method="post" >
        
        <span  style="color: darkred; font-family: courier; font-size: 200%;margin: 50px 50px; font-weight: bold; ">
                    DEVICE MANAGEMENT
        </span>
        
        <div class="row">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
          <div class="col-md-4">
              <div class="card-title" style="margin: 10px 50px; font-size: 150%; color: darkred;">
                ADD DEVICE
              </div>
            <form >
            <!-- <div class="card-body"> -->
              <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                <label for="exampleInputName">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName"  placeholder="Enter Name" required>
              </div>
              <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                <label for="exampleInputIp_address">Ip address</label>
                <input type="text" name="ip_address" class="form-control" id="exampleInputIp_address"  placeholder="Enter ip address" required>
              </div>
              <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                <label for="exampleInputPort">Port</label>
                <input type="text" name="port" class="form-control" id="exampleInputPort"  placeholder="Enter port" required>
              </div>
              <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                <label for="exampleInputon">Script on Device</label>
                <input type="text" name="scriptOn" class="form-control" id="exampleInputon"  placeholder="Enter Script on Device" required>
              </div>
              <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                <label for="exampleInputoff">Script off Device</label>
                <input type="text" name="scriptOff" class="form-control" id="exampleInputoff"  placeholder="Enter Script off Device" required>
              </div>
              <div class="form-group" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                <label for="exampleInputStatus">Status Path</label>
                <input type="text" name="statusPath" class="form-control" id="exampleInputStatus"  placeholder="Enter Status Path" required>
              </div>
              
              <div class="form-check" style="margin: 10px 50px; font-size: 100%; color: darkred;">
                <input type="checkbox" name="isShowUser" value="isShowUser" class="form-check-input" id="exampleCheck1" checked>
                <label class="form-check-label" for="exampleCheck1">Show user</label>
              </div>
              <button type="submit" class="btn btn-lg btn-primary" style="margin: 10px 50px; font-size: 100%;">ADD</button>
            <!-- </div> -->
            </form>

            
          </div>
          <div class="col-md-8">

            <div style="border:1px solid white;width: 100%;vertical-align: top">
              <div class="card-title" style="margin: 20px 0px; font-size: 150%; color: darkred;">
                    LIST DEVICE
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
              <table class="table" border="1" style="width: 100%" style="margin:  10px 0px">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Ip address</th>
                        <th>Show user</th>
                        <th>Port</th>
                        <th>Script on Device</th>
                        <th>Script off Device</th>
                        <th>Script get status</th>
                        <th>Tools</th>
                        
                    </tr>
                </thead>
                </tbody>
                      <?php foreach ($st as $value) {?>
                      <tr>
                          <td><?php echo $value->name;?> </td>
                          <td><?php echo $value->ip_address;?> </td>
                          <td><?php 
                            if($value->isShowUser==0)
                            echo "no";
                            else echo "yes";?> </td>
                          <td><?php echo $value->port;?> </td>
                          <td><?php echo $value->scriptOn;?> </td>
                          <td><?php echo $value->scriptOff;?> </td>
                          <td><?php echo $value->statusPath;?> </td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <a type="button" class="btn btn-info" href="/edittb/{{$value->id}}">Edit</a> 
                              <a type="button" onclick="return confirm('Do you want to delete device <?php echo $value->name ?> ?')" class="btn btn-danger" href="/deletetb/{{$value->id}}">Delete</a>
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
