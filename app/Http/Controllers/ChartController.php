<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function index()
    {
        // (date("Y-m-d"));
    	$file=config('app.temperature');
    	$temperature=shell_exec("ls $file");
        
    	$dateall=explode("\n", $temperature);
    	
        $day=$dateall[sizeof($dateall)-3];
        $day_room=$dateall[sizeof($dateall)-2];
        for($i=0; $i<(sizeof($dateall)-1)/2;$i++){
            $date[$i]=$dateall[2*$i];
        }
        $array=shell_exec("cat $file/$day");
        $array=explode("\n", $array);
        $array_room=shell_exec("cat $file/$day_room");
        $array_room=explode("\n", $array_room);
        $n=count($array);
        for($i=0; $i<$n; $i++){
            $array[$i]=explode(' ', $array[$i]);
            $array_room[$i]=explode(' ', $array_room[$i]);
        }
        for($i=0; $i<$n-1; $i++){
            $array[$i][0]=explode(':', $array[$i][0]);
            $array[$i][0][1]=$array[$i][0][1].":".$array[$i][0][2];
            $array[$i][1]=explode('temp=', $array[$i][1]);
            $array[$i][1]=explode("'C", $array[$i][1][1]);
            $lable[$i]=$array[$i][0][1];
            $data[$i]=$array[$i][1][0]/1000;
            $array_room[$i][0]=explode(':', $array_room[$i][0]);
            $array_room[$i][0][1]=$array_room[$i][0][1].":".$array_room[$i][0][2];
            $array_room[$i][1]=explode('temp=', $array_room[$i][1]);
            $array_room[$i][1]=explode("'C", $array_room[$i][1][1]);
            $lable[$i]=$array_room[$i][0][1];
            $data_room[$i]=$array_room[$i][1][0]/1000;
        }

        $chart = new UserChart;

        \Log::info($chart->options);
        
        $chart->labels($lable );
        $chart
        ->dataset("Temp ", 'line',$data )
        
        ->options([
                'borderColor' => 'red',
                'linestyle' => 'filled', 
                'fill'=>false
            ]);
        $chart
        
        ->dataset("Temp room ", 'line',$data_room )
        ->options([
                'borderColor' => 'blue',
                'linestyle' => 'filled',
                'fill'=>false,

            ]);
        
        $start_time="00:00";
        $stop_time="00:00";
        $start_day=null;
        $stop_day=null;
        $max=max($data);
        $min=min($data);
        $avg=array_sum($data)/count($data);
        $avg= ((int)($avg*100))/100;
        $max_room=max($data_room);
        $min_room=min($data_room);
        $avg_room=array_sum($data_room)/count($data_room);
        $avg_room= ((int)($avg_room*100))/100;
        return view('temperature', compact('chart', 'date', 'day','start_time', 'stop_time','start_day', 'stop_day', 'max', 'min', 'avg', 'max_room', 'min_room', 'avg_room'));
    }

    public function post_index(Request $request)
    {
        
    	$file=config('app.temperature');
        $temperature=shell_exec("ls $file");
        $dateall=explode("\n", $temperature);
        
        $day=$request->date;
        $array=shell_exec("cat $file/$day");
        $day_room=$day."_room";
        // dd($day_room);
        $array_room=shell_exec("cat $file/$day_room");
        for($i=0; $i<(sizeof($dateall)-1)/2;$i++){
            $date[$i]=$dateall[2*$i];
        }
        $array=shell_exec("cat $file/$day");
        $array=explode("\n", $array);
        $array_room=shell_exec("cat $file/$day_room");
        $array_room=explode("\n", $array_room);
        $n=count($array);
        for($i=0; $i<$n; $i++){
            $array[$i]=explode(' ', $array[$i]);
            $array_room[$i]=explode(' ', $array_room[$i]);
        }
        for($i=0; $i<$n-1; $i++){
            $array[$i][0]=explode(':', $array[$i][0]);
            $array[$i][0][1]=$array[$i][0][1].":".$array[$i][0][2];
            $array[$i][1]=explode('temp=', $array[$i][1]);
            $array[$i][1]=explode("'C", $array[$i][1][1]);
            $lable[$i]=$array[$i][0][1];
            $data[$i]=$array[$i][1][0]/1000;
            $array_room[$i][0]=explode(':', $array_room[$i][0]);
            $array_room[$i][0][1]=$array_room[$i][0][1].":".$array_room[$i][0][2];
            $array_room[$i][1]=explode('temp=', $array_room[$i][1]);
            $array_room[$i][1]=explode("'C", $array_room[$i][1][1]);
            $lable[$i]=$array_room[$i][0][1];
            $data_room[$i]=$array_room[$i][1][0]/1000;
        }

        $chart = new UserChart;

        \Log::info($chart->options);
        
        $chart->labels($lable );
        $chart
        ->dataset("Temp ", 'line',$data )
        
        ->options([
                'borderColor' => 'red',
                'linestyle' => 'filled', 
                'fill'=>false
            ]);
        $chart
        
        ->dataset("Temp room ", 'line',$data_room )
        ->options([
                'borderColor' => 'blue',
                'linestyle' => 'filled',
                'fill'=>false,

            ]);
        
        $start_time="00:00";
        $stop_time="00:00";
        $start_day=null;
        $stop_day=null;
        $max=max($data);
        $min=min($data);
        $avg=array_sum($data)/count($data);
        $avg= ((int)($avg*100))/100;
        $max_room=max($data_room);
        $min_room=min($data_room);
        $avg_room=array_sum($data_room)/count($data_room);
        $avg_room= ((int)($avg_room*100))/100;
        return view('temperature', compact('chart', 'date', 'day','start_time', 'stop_time','start_day', 'stop_day', 'max', 'min', 'avg', 'max_room', 'min_room', 'avg_room'));
        
       
    }
    public function show_temperature(Request $request){

        $start_time[0]=$request->start_day;
        $stop_time[0]=$request->stop_day;
        
        
        if($request->start_time==null){
            $start_time[1]="00:00";
        }else $start_time[1]=$request->start_time;
        if($request->stop_time==null){
            $stop_time[1]="00:00";
        } else $stop_time[1]=$request->stop_time;
        if($start_time[0]>$stop_time[0]||($start_time[0]==$stop_time[0]&&$start_time[1]>$stop_time[1])) return redirect()->action('ChartController@index')->with('error', 'The time is not valid!');
        else{
            

            $file=config('app.temperature');
            $temperature=shell_exec("ls $file");
            $dateall=explode("\n", $temperature);
            $day=null;
            $t=0;
            for($i=0; $i<(sizeof($dateall)-1)/2;$i++){
                $date[$i]=$dateall[2*$i];
            }
            foreach ($date as $value) {
                # code...
                if($value>=$start_time[0]&&$value<=$stop_time[0]){
                    $array_date[$t]=$value;
                    $t++;
                }
            }
            if(isset($array_date)){
                if($start_time[0]==$stop_time[0]){
                    
                    $array=shell_exec("cat $file/$array_date[0]");
                    $array=explode("\n", $array);
                    $array_date_room=$array_date[0]."_room";
                    $array_room=shell_exec("cat $file/$array_date_room");
                    $array_room=explode("\n", $array_room);
                    $n=count($array);
                    for($i=0; $i<$n; $i++){
                        $array[$i]=explode(' ', $array[$i]);
                        $array_room[$i]=explode(' ', $array_room[$i]);
                    }
                    $k=0;
                    for($i=0; $i<$n-1; $i++){
                        $array[$i][0]=explode(':', $array[$i][0]);
                        $array[$i][0][1]=$array[$i][0][1].":".$array[$i][0][2];
                        $array_room[$i][0]=explode(':', $array_room[$i][0]);
                            
                        $array_room[$i][0][1]=$array_room[$i][0][1].":".$array_room[$i][0][2];
                        if($array[$i][0][1]>=$start_time[1]&&$array[$i][0][1]<=$stop_time[1]){
                            $array[$i][1]=explode('temp=', $array[$i][1]);
                            $array[$i][1]=explode("'C", $array[$i][1][1]);
                            $lable[$k]=$array[$i][0][1];
                            $data[$k]=$array[$i][1][0]/1000;
                            $array_room[$i][1]=explode('temp=', $array_room[$i][1]);
                            $array_room[$i][1]=explode("'C", $array_room[$i][1][1]);
                            $data_room[$k]=$array_room[$i][1][0]/1000;
                            $k++;
                        }
                        
                    }
                }else{
                    
                    $k=0;
                    // $size=sizeof($array_date)-1;
                    for($j=0; $j<sizeof($array_date); $j++){
                        if($array_date[$j]==$start_time[0]){
                            $array=shell_exec("cat $file/$array_date[$j]");
                            $array=explode("\n", $array);
                            $array_date_room=$array_date[$j]."_room";
                            $array_room=shell_exec("cat $file/$array_date_room");
                            $array_room=explode("\n", $array_room);
                            $n=count($array);
                            for($i=0; $i<$n; $i++){
                                $array[$i]=explode(' ', $array[$i]);
                                $array_room[$i]=explode(' ', $array_room[$i]);
                            }
                            for($i=0; $i<$n-1; $i++){
                                $array[$i][0]=explode(':', $array[$i][0]);
                                $array[$i][0][1]=$array[$i][0][1].":".$array[$i][0][2];
                                $array_room[$i][0]=explode(':', $array_room[$i][0]);
                                $array_room[$i][0][1]=$array_room[$i][0][1].":".$array_room[$i][0][2];
                                if($array[$i][0][1]>=$start_time[1]){
                                    $array[$i][1]=explode('temp=', $array[$i][1]);
                                    $array[$i][1]=explode("'C", $array[$i][1][1]);
                                    $lable[$k]=$array[$i][0][1];
                                    $data[$k]=$array[$i][1][0]/1000;
                                    $array_room[$i][1]=explode('temp=', $array_room[$i][1]);
                                    $array_room[$i][1]=explode("'C", $array_room[$i][1][1]);
                                    $data_room[$k]=$array_room[$i][1][0]/1000;
                                    $k++;
                                }
                                
                            }
                        }else{
                            if($array_date[$j]==$stop_time[0]){
                                $array=shell_exec("cat $file/$array_date[$j]");
                                $array=explode("\n", $array);
                                $array_date_room=$array_date[$j]."_room";
                                $array_room=shell_exec("cat $file/$array_date_room");
                                $array_room=explode("\n", $array_room);
                                $n=count($array);
                                for($i=0; $i<$n; $i++){
                                    $array[$i]=explode(' ', $array[$i]);
                                    $array_room[$i]=explode(' ', $array_room[$i]);
                                }
                                for($i=0; $i<$n-1; $i++){
                                    $array[$i][0]=explode(':', $array[$i][0]);
                                    $array[$i][0][1]=$array[$i][0][1].":".$array[$i][0][2];
                                    $array_room[$i][0]=explode(':', $array_room[$i][0]);
                                    $array_room[$i][0][1]=$array_room[$i][0][1].":".$array_room[$i][0][2];
                                    if($array[$i][0][1]<=$stop_time[1]){
                                        $array[$i][1]=explode('temp=', $array[$i][1]);
                                        $array[$i][1]=explode("'C", $array[$i][1][1]);
                                        $lable[$k]=$array[$i][0][1];
                                        $data[$k]=$array[$i][1][0]/1000;
                                        $array_room[$i][1]=explode('temp=', $array_room[$i][1]);
                                        $array_room[$i][1]=explode("'C", $array_room[$i][1][1]);
                                        $data_room[$k]=$array_room[$i][1][0]/1000;
                                        $k++;
                                    }
                                    
                                }
                            }
                            else{
                                $array=shell_exec("cat $file/$array_date[$j]");
                                $array=explode("\n", $array);
                                $array_date_room=$array_date[$j]."_room";
                                $array_room=shell_exec("cat $file/$array_date_room");
                                $array_room=explode("\n", $array_room);
                                $n=count($array);
                                for($i=0; $i<$n; $i++){
                                    $array[$i]=explode(' ', $array[$i]);
                                    $array_room[$i]=explode(' ', $array_room[$i]);
                                }
                                for($i=0; $i<$n-1; $i++){
                                    $array[$i][1]=explode('temp=', $array[$i][1]);
                                    $array[$i][1]=explode("'C", $array[$i][1][1]);
                                    $lable[$k]=$array[$i][0][1];
                                    $data[$k]=$array[$i][1][0]/1000;
                                    $array_room[$i][1]=explode('temp=', $array_room[$i][1]);
                                    $array_room[$i][1]=explode("'C", $array_room[$i][1][1]);
                                    $data_room[$k]=$array_room[$i][1][0]/1000;
                                    $k++;
                                    
                                } 
                            }
                        }
                    }
                }
                    
                    
                    if(isset($data)){
                        $chart = new UserChart;

                        \Log::info($chart->options);
                        
                        $chart->labels($lable );
                        $chart
                        ->dataset("Temp ", 'line',$data )
                        
                        ->options([
                                'borderColor' => 'red',
                                'linestyle' => 'filled', 
                                'fill'=>false
                            ]);
                        $chart
                        
                        ->dataset("Temp room ", 'line',$data_room )
                        ->options([
                                'borderColor' => 'blue',
                                'linestyle' => 'filled',
                                'fill'=>false,

                            ]);
                        
                        $start_time=$start_time[1];
                        $stop_time=$stop_time[1];
                        $start_day=$request->start_day;
                        $stop_day=$request->stop_day;
                        $max=max($data);
                        $min=min($data);
                        $avg=array_sum($data)/count($data);
                        $avg= ((int)($avg*100))/100;
                        $max_room=max($data_room);
                        $min_room=min($data_room);
                        $avg_room=array_sum($data_room)/count($data_room);
                        $avg_room= ((int)($avg_room*100))/100;
                        return view('temperature', compact('chart', 'date', 'day','start_time', 'stop_time','start_day', 'stop_day', 'max', 'min', 'avg', 'max_room', 'min_room', 'avg_room'));
                    }else return redirect()->action('ChartController@index')->with('error', 'No data display!');


                
            }
            else return redirect()->action('ChartController@index')->with('error', 'No data display!');
                

        }

    }

}
