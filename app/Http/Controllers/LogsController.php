<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
use Session;
use Cookie;
use \DB;
// use Illuminate\Support\Facades\Cache;
//use App\Http\Controllers\Cookie;

class LogsController extends Controller{
	public function index(){
		if (Cookie::get('table')!='admin')
            return redirect()->away('/');

        $counts=DB::table('logs')
        	->count();
        $numbers=[10,20,30,50,100, $counts];
        // dd(isset($number));
        // if(Cookie::get("number")==null||Cookie::get("number")>$counts){
        //     if($counts>20){
        //         Cookie::queue("number",20, 365*24*60);
        //     }else{
        //         Cookie::queue("number",$counts, 365*24*60);
        //     }
            
        // }
        
        // $number=Cookie::get("number");
        // $number=(int)$number;
        if(!Cache::has('number')){
            $number=20;
            Cache::put('number', $number);
        } else $number=Cache::get('number');

        if($number>0){
            if($counts%$number>0){
                $count=(int)($counts/$number)+1;
            }else $count=$counts/$number;
        }else $count=0;
        Cache::put('count', $count);
            
        if((!Cache::has('check'))||Cache::get('check')>$counts){
            Cache::put('check', 1);
        } 

        $check=Cache::get('check');
        
        $logs=DB::table('logs')
        // ->whereBetween('id', [$counts-$number*$check+1, $counts-$number*($check-1)])
        ->orderBy('id', 'desc')
        ->offset($number*($check-1))
        ->limit($number)
        ->get();
        $start_day=null;
        $stop_day=null;
		return view('logs', compact('numbers', 'number', 'count','check', 'logs', 'counts', 'start_day','stop_day'));
	}

    public function change_number(Request $request){
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
        $number=$request->number;
        // $counts=DB::table('logs')
        //     ->count();
        // if($number>$counts){
        //     $number=$counts;
        // }
        Cache::put('number', $number);
        Cache::put('check', 1);
        // Cookie::queue("number",$number, 365*24*60);
        // Cookie::queue("check",1, 365*24*60);
        return redirect()->action('LogsController@index');
    }

    public function show_logs($check){
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
        if($check=='pre'){
            $check=Cache::get('check');
            if($check>1) $check--;
        }
        if($check=='next'){
            $check=Cache::get('check');
            $count=Cache::get('count');
            if($check<$count) $check++;
        }

        Cache::put('check', $check);
        // Cookie::queue("check",$check, 365*24*60);
        return redirect()->action('LogsController@index');
    }
	
    public function start_day(Request $request){
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
        $day=$request->start_day;
        
        $logs=DB::table('logs')
        ->whereDate('start_time',$day)
        ->orderBy('id', 'desc')
        ->get();
        $counts=0;
        $count=0;
        $numbers=[10,20,30,50,100, $counts];
        
        $number=Cache::get('number');
        $check=Cache::get('check');
        // $number=Cookie::get("number");
        // $number=(int)$number;
        // $check=Cookie::get('check');
        // $check=(int)$check;
        $start_day=$day;
        $stop_day=null;
        return view('logs', compact('numbers', 'number', 'count','check', 'logs', 'counts', 'start_day','stop_day'));
    }

    public function stop_day(Request $request){
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
        $day=$request->stop_day;
        
        $logs=DB::table('logs')
        ->whereDate('stop_time',$day)
        ->orderBy('id', 'desc')
        ->get();
        $counts=0;
        $count=0;
        $numbers=[10,20,30,50,100, $counts];
        
        $number=Cache::get('number');
        $check=Cache::get('check');
        // $number=Cookie::get("number");
        // $number=(int)$number;
        // $check=Cookie::get('check');
        // $check=(int)$check;
        $stop_day=$day;
        $start_day=null;
        return view('logs', compact('numbers', 'number', 'count','check', 'logs', 'counts', 'start_day','stop_day'));
    }

}