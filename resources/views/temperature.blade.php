<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Temperature</title>
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
                    <div class="login100-form validate-form p-b-33 p-t-5">
                        <table style="width: 100%" class="table-responsive">
                            <tr>
                                <th style="border:1px solid white;width: 40%">
                                    <form id = "submitChange" action="/chart" method="post" >
                                        @csrf
                                        <select class="custom-select" id="date" name="date"  onchange= "isChecked()" style="margin: 10px 50px; font-size: 100%; color: darkred; width: 80%; height: 40px; font-weight: bold;" >
                                            <?php for($i=sizeof($date)-1; $i>=0; $i--) {?>
                                                <?php if($date[$i]==$day){ ?>
                                                    <option value="{{$date[$i]}}" selected > <?php echo $date[$i] ?></option>
                                                <?php }else{ ?>

                                                    <option value="{{$date[$i]}}" > <?php echo $date[$i] ?></option>
                                                <?php } ?>
                                            <?php }?>
                                        </select>
                                        
                                        
                                    </form>
                                </th>
                                <th style="border:1px solid white;width: 60%">
                                    <form action="/show_temperature" class="input-group mb-2" style="width: 100%">
                                        <div class="input-group-prepend" >
                                            <div class="input-group-text" style="color: darkred; background-color: moccasin">Start</div>
                                        </div>
                                        <input class="form-control"  type="date" id="start_time" name="start_day" value="{{$start_day}}" required>
                                        <input class="form-control"  type="time" id="start_time" name="start_time" value="{{$start_time}}" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="color: darkred; background-color: moccasin">Stop</div>
                                        </div>
                                        <input class="form-control"  type="date" id="stop_time" name="stop_day" value="{{$stop_day}}" required>
                                        <input class="form-control"  type="time" id="stop_time" name="stop_time" value="{{$stop_time}}" >
                                        <div class="input-group-prepend">
                                            <button class="input-group-text" type="submit" style="color: darkred; background-color: moccasin">Show</button>
                                        </div>
                                        <div class="input-group-prepend">
                                            <a class="input-group-text" href="/chart" style="color: darkred; background-color: moccasin">Reset</a>
                                        </div>
                                        
                                    </form>
                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert" style=" margin: 10px 0px;width: 100%">
                                            {{ session('error') }}
                                        </div>
                                    @endif 
                                </th>
                                
                                
                            </tr>
                            
                        </table>
                        
                        <div style="width: 100%;margin: 0 auto;">
                            {!! $chart->container() !!}
                        </div>
                        
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
                        {!! $chart->script() !!}
                        <table style="width: 100%" class="table-responsive">
                            <tr>
                                <th style="color: darkred;border:1px solid white;width: 30% ; padding: 0px 50px; font-size: 80%">
                                    <?php echo " max : $max" ?>
                                </th>
                                <th style="color: darkred;border:1px solid white;width: 30%; padding: 0px 50px; font-size: 80%">
                                    <?php echo " min : $min" ?>
                                </th>
                                <th style="color: darkred;border:1px solid white;width: 30%; padding: 0px 50px; font-size: 80%">
                                    <?php echo " avg : $avg" ?>
                                </th>
                            </tr>
                                

                        </table>
                        <table style="width: 100%" class="table-responsive">
                            <tr>
                                <th style="color: blue ;border:1px solid white;width: 30% ; padding: 0px 50px; font-size: 80%">
                                    <?php echo " max : $max_room" ?>
                                </th>
                                <th style="color: blue;border:1px solid white;width: 30%; padding: 0px 50px; font-size: 80%">
                                    <?php echo " min : $min_room" ?>
                                </th>
                                <th style="color: blue;border:1px solid white;width: 30%; padding: 0px 50px; font-size: 80%">
                                    <?php echo " avg : $avg_room" ?>
                                </th>
                            </tr>
                                

                        </table>
                    </div>
                </div>
            </div>
        @include('footer')
        <script type="text/javascript">
            function isChecked() {
                document.getElementById("submitChange").submit();
            }
        </script>
        <div id="dropDownSelect1"></div>
        <script src="js/main.js"></script>
    </body>
</html>
</pre>

