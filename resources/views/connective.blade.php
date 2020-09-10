<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connective management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/connective.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
</head>

<body>
   @include('title')
    <div class="container-login100" style="background-image: url('/images/NIK_0477.JPG');">
    <div class="login100-form validate-form p-b-33 p-t-5">
        <span class="card-title" style="color: darkred; font-family: courier; font-size: 200%;margin: 10px 20px; font-weight: bold; ">
                    CONNECTIVE MANAGEMENT
        </span>
          <div class="container-fluid">
            <div class="row">
        
              <div class="col">
                <!-- Table list connective -->
                  <div class="card-title" style="margin: 10px 0px; font-size: 150%; color: darkred;">
                        LIST CONNECTIVE
                  </div>
                  <div class="table-responsive">
                  <table class="table " border="1">
                      <thead>
                        <tr>
                            <th>User full name</th>
                            <th style="width: 60%">Device</th>
                            <th style="width: 10%">Tool</th>
                            
                        </tr>
                      </thead>
                      </tbody>
                        <?php foreach ($user as $value) {?>
                        <tr>
                            <td><?php echo $value->fullname;?> </td>
                            <td>
                              <form action="/addcn_us/{{$value->id}}" method="">
                                  <select id="id_cn" name="id_cn[]" class="selectpicker form-control" multiple data-live-search="true" data-container="body">
                                    
                                    <?php foreach ($st as $value1) {?>
                                      <?php if($check[$value->id][$value1->id]==1){ ?>
                                        <option value="{{$value1->id}}" selected> <?php echo $value1->name ?></option>
                                      <?php }else{ ?>
                                        <option value="{{$value1->id}}"><?php  echo $value1->name ?></option>
                                      <?php } ?>

                                    <?php } ?>
                                  </select>
                                  
                            </td>
                            <td>
                                  <button class="btn btn-primary" type="submit">Save</button>
                              </form>  
                            
                            </td>
                            
                        </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                </div>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert" style=" margin: 50px 10px">
                            {{ session('success') }}
                        </div>
                    @endif
              </div>
            
              <div class="col">
                  <div class="card-title" style="margin: 10px 0px; font-size: 150%; color: darkred;">
                    LIST USER
                  </div>
                  @if (session('success1'))
                      <div class="alert alert-success" role="alert" style=" margin: 10px 0px;width: 100%">
                          {{ session('success1') }}
                      </div>
                  @endif
                  @if (session('error1'))
                      <div class="alert alert-danger" role="alert" style=" margin: 10px 0px;width: 90%">
                          {{ session('error1') }}
                      </div>
                  @endif  
                  <div class="table-responsive">
                    <table class="table " border="1" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Full name</th>

                                <th>User name</th>
                                
                                <th>Email</th>
                            </tr>
                        </thead>
                        </tbody>
                              <?php foreach ($user as $value) {?>
                              <tr>
                                
                                  <td><?php echo $value->fullname;?> </td>

                                  <td><?php echo $value->username;?> </td>
                                  
                                  <td><?php echo $value->email;?> </td>

                                  
                                </form> 
                              </tr>
                                <?php } ?>
                          </tbody>
                      </table>
                    </div>
        
                  <div class="card-title" style="margin: 10px 0px; font-size: 150%; color: darkred;">
                    LIST DEVICE
                  </div>
                 
                  <div class="table-responsive">
                  <table class="table" border="1"style="width: 100%">
                      <thead>
                          <tr>
                              <th style="width: 25%">Name</th>
                              <th style="width: 15%">Ip address</th>
                              <th style="width: 5%">Is show user</th>
                              <th style="width: 15%">Script on Device</th>
                              <th style="width: 15%">Script off Device</th>
                              <th style="width: 25%">Status Path</th>
                          </tr>
                      </thead>
                      </tbody>
                            <?php foreach ($st as $value) {?>
                            <tr >
                              <form action="/addcn_dv/{{$value->id}}" method="">
                                <td><?php echo $value->name;?> </td>
                                <td><?php echo $value->ip_address;?> </td>
                                <td><?php 
                                  if($value->isShowUser==0)
                                  echo "no";
                                  else echo "yes";?> </td>
                                <td><?php echo $value->scriptOn;?> </td>
                                <td><?php echo $value->scriptOff;?> </td>
                                <td><?php echo $value->statusPath;?> </td>
                      
                              </form>
                            </tr>
                              <?php } ?>
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
    </div>



  <script src="js/main.js"></script>
  <script >
  $(function(){
  $("select").bsMultiSelect();
  });   
  </script>
 

@include('footer')

</body>

</html>