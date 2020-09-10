
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    @include('title')
   <div class="limiter">

    <div class="container-login100" style="background-image: url('/images/NIK_0477.JPG');">
        <form id = "submitChange" class="login100-form validate-form p-b-33 p-t-5" action="" method="post">
                <span  style="color: darkred; font-family: courier; font-size: 200%;margin: 50px 50px; font-weight: bold;">
                            ADMIN CONTROL
                </span>
            <div class="row">
                
                <div class="col">
                
            
                <table style="margin: 50px 50px; border:1px solid white;">
                    <?php foreach ($st as $value) {?>
                    <tr>
                        <td style="border:1px solid white;"> <?php echo $value->name;?></td>

                        <td style="border:1px solid white;"> 
                             <label class="switch">
                                <?php if($ison[$value->id]==0){ ?>
                                    <input class="switch-input" type="checkbox" onchange = "isChecked()" name ="<?php  echo $value->id ?> "/>
                                <?php }
                                else { ?>

                                    <input class="switch-input" type="checkbox" checked onchange = "isChecked()" name ="<?php  echo $value->id ?>" />
                                <?php } ?>
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                            </label> 
                        </td>

                        <td style="border:1px solid white; padding: 10px 20px">
                            Port: 
                            <?php echo $value->port;?>
                        </td>
                        <td style="border:1px solid white; padding: 10px 10px">
                             <?php 
                             if($value->isShowUser==false){
                                echo "No show user";
                             }else{
                                 if($ison[$value->id]==0){
                                    echo "0";
                                 }else{
                                    if($value->ip_address!=NULL){
                                            $ip=$value->ip_address;
                                            $port=$value->port;
                                            $user=config('app.USER');
                                            $command="ssh -p $port $user@$ip -t who";
                                            $name=shell_exec($command);
                                            $array=explode("\n", $name);
                                        
                                            $n=count($array);
                                        
                                            for($i=0; $i<$n; $i++){
                                                    $array[$i]=explode(' ', $array[$i]);
                                                }
                                            for($i=0; $i<count($array); $i++){
                                            for($j=$i+1; $j<count($array); $j++){
                                                    if(($array[$i][0]===$array[$j][0])&&($array[$i][count($array[$i])-1]===$array[$j][count($array[$j])-1])) {
                                                        $array[$i][0]="";
                                                        $n--;
                                                }
                                            }
                                        }
                                        echo $n-1;
                                        echo "<br>";
                                        for($i=0; $i<count($array); $i++){
                                            if($array[$i][0]===""){}
                                            else {
                                                echo $array[$i][0];echo $array[$i][count($array[$i])-1];
                                                echo "<br>";
                                            }
                                        }
                                    }                       
                                 }
                             }


                            ?>   
                        </td>
                        <td style="border:1px solid white; padding: 10px 30px; font-style: italic; font-size: 80%">
                          <?php
                            if($ison[$value->id]==1){
                              echo "Turn on: $value->start_time";
                            }
                          ?>
                        </td>

                    </tr>
                    
                      <?php }?>
                    <tr>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert" style=" margin: 20px 50px">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                    </tr>
                    
                </table>
                @csrf
                </div>
                <div class="col" style="margin: 100px 100px">
                    <div class="card border-success mb-3" style="max-width: 30rem;">
                      <div class="card-header bg-transparent border-success" style=" font-family: courier; font-size: 300%; font-weight: bold; color: blue">MITECH</div>
                      <div class="card-body text-success">
                        <h5 class="card-title">Click to turn on / off the device</h5>
                        <p class="card-text">The number of users and the user information is displayed next to the turn on / off button.</p>
                        <p class="card-text">Shows when the device is turned on.</p>
                      </div>
                      <div class="card-footer bg-transparent border-success" >
                      <p class="card-text" style="color: red; font-weight: bold">Remember to turn off the device when not in use. </p>
                      <p class="card-text" style="color: red; font-weight: bold">If no user logs into the device for 30 seconds, the device will automatically shut down.</p>
                      </div>
                    </div>
                </div>
            </div>

                
        
        </form>
    </div>
</div>

@include('footer')

    <script type="text/javascript">
        function isChecked() {
            document.getElementById("submitChange").submit();
        }
        $("document").ready(function(){
            setTimeout(function(){
               $("div.alert").remove();
            }, 5000 ); // 5 secs

        });
    </script>
    <div id="dropDownSelect1"></div>
    <script src="js/main.js"></script>


</body>
<!-- checked -->
</html>