<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
use Carbon\Carbon;

/**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
*/

class HomeController extends Controller{   
    public function __construct()
    {
        $this->middleware(['2fa']);
    }

    public function home($id) {
    
        if (Cookie::get('ID')!=$id || Cookie::get('table')!='users')
            return redirect()->away('/');
            //return redirect()->route('loginn');
        
        $st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();
        $ison[0]=0;
        foreach ($st as $key){
            $command="cat $key->statusPath";
            $ison[$key->id_tb]=shell_exec($command);
            // DB::table('thiet_bi')
            // ->where('id', $key->id_tb)
            // ->update(['isOn'=>$ison]);
        }
            
        $st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();

        return view('home',compact('st', 'ison'));
        
     }

    public function homead(){
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //return redirect()->route('loginn');
        
        $st = DB::table('thiet_bi')
        ->orderBy('id', 'asc')
        ->get();
        $ison[0]=0;
        foreach ($st as $key){
            $command="cat $key->statusPath"; // cat /tmp/status_device_01
            $ison[$key->id]=shell_exec($command);
            
        }
           

        $st = DB::table('thiet_bi')
        ->orderBy('id', 'asc')
        ->get();

        return view('admin',compact('st', 'ison'));
    }

    public function change(Request $request, $id)
    {

        if (Cookie::get('ID')!=$id || Cookie::get('table')!='users')
            return redirect()->away('/');
            //return redirect()->route('loginn');

        $st = DB::table('thiet_bi')
                ->join('connective', 'thiet_bi.id', '=', 'connective.id_tb')
                ->where('connective.id_us',$id)
                ->get();
        foreach ($st as $key) {
            # code...

            if($request->has(strval($key->id)."_" ) || $request->has($key->id))
            {   
                $command="cat $key->statusPath"; // cat /tmp/status_device_01
                $ison=shell_exec($command);
                if($ison==0){
                    $this->TurnOn($key->scriptOn);
                    $time=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
                    DB::table('thiet_bi')
                    ->where('id',$key->id)
                    ->update([
                        'start_time'=>$time]);
                    $name=Cookie::get('name');
                    $table=Cookie::get('table');
                    DB::table('logs')
                    ->insert([
                        'start_time'=>$time,
                        'table'=>$table,
                        'user'=>$name,
                        'device'=>$key->name]);
                    
                }
                
            }
            else
            {
                $command="cat $key->statusPath"; // cat /tmp/status_device_01
                $ison=shell_exec($command);
                if($ison==1){
                    $this->TurnOff($key->scriptOff);
                    $time=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
                    DB::table('thiet_bi')
                        ->where('id',$key->id)
                        ->update([
                            'stop_time'=>$time]);
                    $name=Cookie::get('name');
                    $table=Cookie::get('table');
                    DB::table('logs')
                        ->insert([
                            'stop_time'=>$time,
                            'table'=>$table,
                            'user'=>$name,
                            'device'=>$key->name]);
                }

                
                // dd($time->toDateTimeString());
                // DB::table('thiet_bi') ->where('id',$key->id)->update(['isOn'=>0]);
            }
        }
        
        return redirect()->action('HomeController@home', ['id' => $id])->with('success', 'Success!');
        
    }
    public function changead(Request $request)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //return redirect()->route('loginn');
        $stt = DB::table('thiet_bi')->get();
        foreach ($stt as $key) {
            # code...

            if($request->has(strval($key->id)."_" ) || $request->has($key->id))
            {   
                $command="cat $key->statusPath"; // cat /tmp/status_device_01
                $ison=shell_exec($command);
                if($ison==0){
                    $this->TurnOn($key->scriptOn);
                    $time=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
                    DB::table('thiet_bi')
                    ->where('id',$key->id)
                    ->update([
                        'start_time'=>$time]);
                    
                    
                }
                
            }
            else
            {
                $command="cat $key->statusPath"; // cat /tmp/status_device_01
                $ison=shell_exec($command);
                if($ison==1){
                    $this->TurnOff($key->scriptOff);
                    $time=Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
                    DB::table('thiet_bi')
                        ->where('id',$key->id)
                        ->update([
                            'stop_time'=>$time]);
                    
                }

                
                // dd($time->toDateTimeString());
                // DB::table('thiet_bi') ->where('id',$key->id)->update(['isOn'=>0]);
            }
        }
        return redirect()->action('HomeController@homead')->with('success', 'Success!', 5);
        
    }   

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function TurnOn($script){
        $command="cat $script";
        $comman=shell_exec("$command");
        // dd($command);
        shell_exec("$comman");
    }

    public function TurnOff($script){
        $command="cat $script";
        $comman=shell_exec("$command");
        // dd($command);
        shell_exec("$comman");
    }
}

