<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Cache;
use Cookie;
use \DB;

class UserController extends Controller{

public function __construct() {
        @session_start();        
}    
public function postlogin(Request $request){
        $username=$request->username;
        $password=$request->password;
        
        $admin=DB::table('admin') 
            ->where('username','like',$username)
            ->get();
        foreach ($admin as $value) {
            # code...
            if(Hash::check($password, $value->password)){
                Cookie::queue("login", 'admin', 365*24*60);
                $id=$value->id;
                if($value->google2fa_secret!=NULL){
                    Cookie::queue("password", $password, 365*24*60);
                    return redirect()->action('GoogleAuthController@one_time_password', ['id' => $id]);

                } else {
                    // Cookie::queue("table", 'admin', 365*24*60);
                    Cookie::queue("ID", $id, 365*24*60);
                    // Cookie::queue("name", $value->fullname, 365*24*60);
                    Cookie::queue("password", $password, 365*24*60);
                    return redirect()->action('Auth\RegisterController@create_register', ['id' => $id]);
                }
                
                
                break; 
            }
        } 
        
        $user=DB::table('users') 
        	->where('username','like',$username)
        	->get();
        foreach ($user as $value) {
        	# code...
        	if(Hash::check($password, $value->password)){
                Cookie::queue("login", 'users', 365*24*60);
                
                $id=$value->id;
                if($value->google2fa_secret!=NULL){
                    // return view('login',compact('id'));
                    Cookie::queue("password", $password, 365*24*60);
                    return redirect()->action('GoogleAuthController@one_time_password', ['id' => $id]);

                } else {
                    
                    // Cookie::queue("table", 'users', 365*24*60);
                    Cookie::queue("ID", $id, 365*24*60);
                    // Cookie::queue("name", $value->fullname, 365*24*60);
                    Cookie::queue("password", $password, 365*24*60);
                    return redirect()->action('Auth\RegisterController@create_register', ['id' => $id]);
                }
                //return redirect()->action('LoginController@index', ['id' => $id]);    
        	}
        	
        }


    return redirect()->away('/')
            //return redirect()->route('loginn')
    ->with('error', 'Login failed! User account or password incorrect.');   
               
}





public function postregister(Request $request){
    DB::table('users')
        ->insert(
            [ 'username'=>$request->username,
            'fullname'=>$request->fullname ,
            'email'=>$request->email ,
            'password'=>Hash::make($request->password)]);
        return redirect()->away('/');
            //return redirect()->action('LoginController@login');
}

protected function create(array $data)
    {
        return User::create([
            'username'=>$request->username,
            'fullname'=>$request->fullname ,
            'email'=>$request->email ,
            'password'=>Hash::make($request->password),
            'google2fa_secret' => $data['google2fa_secret'],
        ]);
    }



public function logout(){
    
    // Cookie::forget('ID');
    // Cookie::forget('table');
    // Cookie::forget('login');
    Cookie::queue("ID", null, 365*24*60);
    Cookie::queue("table", null, 365*24*60);
    Cookie::queue("login", null, 365*24*60);
    Cookie::queue("name", null, 365*24*60);
    Cookie::queue("password", null, 365*24*60);
    Cache::flush();
    return redirect()->away('/');
            //return redirect()->route('loginn');
}

public function get_update_pw(){
    if(Cookie::get('table')=='admin'){
        $id=Cookie::get('ID');
        $user=DB::table('admin') 
                ->where('id',$id)
                ->first();}
    if(Cookie::get('table')=='users'){
        $id=Cookie::get('ID');
        $user=DB::table('users') 
                ->where('id',$id)
                ->first();}
    $key=$user->google2fa_secret;
    if(Cookie::get('table')!=null) return view('edit_pw',compact('key'));
}

public function post_update_pw(Request $request){
    if($request->new_password!=$request->confirm_new_password)
        return redirect()->action('UserController@get_update_pw')
            ->with('error', 'Confirm password not true!'); 
    $google2fa = app('pragmarx.google2fa');
    if(Cookie::get('table')=='admin'){
        $id=Cookie::get('ID');
        $user=DB::table('admin') 
                ->where('id',$id)
                ->first();

        if(!Hash::check($request->password, $user->password)){
            return redirect()->action('UserController@get_update_pw')
            ->with('error', 'password incorrect'); 
        }

        if(($user->google2fa_secret!=null)&&(!$google2fa->verifyKey($user->google2fa_secret, $request->one_time_pw))){
            return redirect()->action('UserController@get_update_pw')
            ->with('error', 'one time password incorrect'); 
        }
        DB::table('admin')
            ->where("id",$id)
            ->update(
                [ 'password'=>Hash::make($request->new_password),]);
        return redirect()->action('HomeController@homead', ['id' => $id]);
    }
    if(Cookie::get('table')=='users'){

        $id=Cookie::get('ID');
        $user=DB::table('users') 
                ->where('id',$id)
                ->first();

        if(!Hash::check($request->password, $user->password)){
            return redirect()->action('UserController@get_update_pw')
            ->with('error', 'password incorrect'); 
        }
        if(($user->google2fa_secret!=null)&&(!$google2fa->verifyKey($user->google2fa_secret, $request->one_time_pw))){
            return redirect()->action('UserController@get_update_pw')
            ->with('error', 'one time password incorrect'); 
        }
        DB::table('users')
            ->where("id",$id)
            ->update(
                [ 'password'=>Hash::make($request->new_password),]);
        return redirect()->action('HomeController@home', ['id' => $id]);
    }
}

}


?>
