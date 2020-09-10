<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    @include('title')
   <div class="limiter">

    <div class="container-login100" style="background-image: url('/images/NIK_0477.JPG');">
        <div  class="login100-form validate-form p-b-33 p-t-5" >
            <div class="row">
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-10">
                    <table style="width: 100%" class="table-responsive">
                    <tr>
                        <th style="border:1px solid white;width: 20%">
                            <table class="table-responsive">
                                <tr> Show :
                                    <form id = "submitChange" action="/change_number" method="get" >
                                        @csrf
                                        <select class="custom-select" id="number" name="number" onchange= "isChecked()" style="margin: 5px 10px; font-size: 100%; color: darkred; width: 30%; height: 40px; background-color: white;font-weight: bold;" >
                                            <?php
                                            $checks=0;
                                            for ($i=0; $i<sizeof($numbers)-1;$i++) {
                                                # code...
                                                if($numbers[$i]==$number){ $checks=1;?>
                                                    <option value="{{$numbers[$i]}}" selected > <?php echo $numbers[$i] ?></option>
                                                <?php }else{ ?>
                                                    <option value="{{$numbers[$i]}}"  > <?php echo $numbers[$i] ?></option>
                                                <?php }
                                            }
                                            if($numbers[sizeof($numbers)-1]==$number&&$checks==0){ ?>
                                                <option value="{{$numbers[sizeof($numbers)-1]}}" selected > <?php echo "ALL" ?></option>
                                                <?php }else{ ?>
                                                    <option value="{{$numbers[sizeof($numbers)-1]}}"  > <?php echo "ALL" ?></option>
                                                <?php }
                                            
                                            ?>
                                            
                                        </select>
                                        
                                        
                                    </form>    
                                    entries                
                                </tr>
                                </table>   
                        </th>
                        <th style="border:1px solid white;width: 30%">
                            <form action="/start_day" class="input-group mb-2" style="width: 80%">
                                <div class="input-group-prepend" >
                                    <div class="input-group-text" style="color: darkred; background-color: moccasin">Start</div>
                                </div>
                                <input class="form-control"  type="date" id="start_day" name="start_day" value="{{$start_day}}" required>
                                <div class="input-group-prepend">
                                    <button class="input-group-text" type="submit" style="color: darkred; background-color: moccasin">Find</button>
                                </div>
                                <div class="input-group-prepend">
                                    <a class="input-group-text" href="/logs" style="color: darkred; background-color: moccasin">Reset</a>
                                </div>
                            </form>
                        </th>
                        <th style="border:1px solid white;width: 30%">
                            <form action="/stop_day" class="input-group mb-2" style="width: 80%">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="color: darkred; background-color: moccasin">Stop</div>
                                </div>
                                <input class="form-control"  type="date" id="stop_day" name="stop_day" value="{{$stop_day}}" required>
                                <div class="input-group-prepend">
                                    <button class="input-group-text" type="submit" style="color: darkred; background-color: moccasin">Find</button>
                                </div>
                                <div class="input-group-prepend">
                                    <a class="input-group-text" href="/logs" style="color: darkred; background-color: moccasin">Reset</a>
                                </div>
                            </form>
                        </th>
                        <th style="border:1px solid white;width: 20%">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="color: darkred; background-color: moccasin">Search</div>
                                </div>
                                <input type="text" id="myInput" class="form-control" style="width: 70%" onkeyup="myFunction()" placeholder="Search for ..." title="Type in a name">
                            </div>
                            
                        </th>
                    </tr>
                </table>
                
                
                <div class="table-responsive">
                    <table id="myTable" class="table" border="1"  style="width: 100%">
                        <thead>
                            <tr>
                            <th style="width:5%;">ID</th>
                            <th style="width:20%;">Start time</th>
                            <th style="width:20%;">Stop time</th>
                            <th style="width:25%;">Device</th>
                            <th style="width:30%;">User name</th>
                            </tr>
                        </thead>
                        </tbody>
                            <?php foreach ($logs as $value) {?>
                            <tr>
                            <td><?php echo $value->id?> </td>
                            <td><?php echo $value->start_time?> </td>
                            <td><?php echo $value->stop_time?> </td>
                            <td><?php echo $value->device?> </td>
                            <td><?php echo $value->user?> </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                        
                <div class="row">
                    <div class="col-md-10" style="text-align: left;">
                        <?php if($counts>0){ ?>
                            Showing <?php echo ($check-1)*$number ?> to <?php if($counts>$check*$number)echo $check*$number; else echo $counts ?> of <?php echo $counts ?> entries
                        <?php } ?>
                            
                    </div > 
                    <div class="col-md-2">
                        <?php if($counts>0){ ?>
                            <nav aria-label="" class="table-responsive mb-2"  >
                            <ul class="pagination mb-0">
                                <li class="page-item"><a class="page-link" href="/show_logs/pre" tabindex="-1" style="color: darkred; background-color: moccasin">Pre</a></li>
                                <?php
                                for($i=1;$i<=$count; $i++) {
                                    # code...
                                    if($i==$check){ ?>
                                        <li class="page-item active" ><a class="page-link" href="/show_logs/{{$i}}" style="color: darkred; background-color: moccasin"><?php echo $i ?></a></li>
                                    <?php }else{ ?>
                                        <li class="page-item "><a class="page-link" href="/show_logs/{{$i}}" style="color: darkred; background-color: moccasin"><?php echo $i ?></a></li>
                                    <?php }
                                }
                                ?>
                                <li class="page-item"><a class="page-link" href="/show_logs/next" style="color: darkred; background-color: moccasin">Next</a></li>
                                
                            </ul>
                            </nav>
                        <?php } ?>
                        
                    </div>
                    
                </div>
                        
            
                </div>
                <div class="col-md-1">
                    
                </div>
            </div>
                
        </div>
    </div>
</div>

@include('footer')
    
    <div id="dropDownSelect1"></div>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        function isChecked() {
            document.getElementById("submitChange").submit();
        }
    </script>
    <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        td1 = tr[i].getElementsByTagName("td")[4];
        if (td||td1) {
          txtValue = td.textContent || td.innerText;
          txtValue1 = td1.textContent || td1.innerText;
          if ((txtValue.toUpperCase().indexOf(filter) > -1)||(txtValue1.toUpperCase().indexOf(filter) > -1)) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }       
      }
    }
    </script>
    
</body>
</html>


