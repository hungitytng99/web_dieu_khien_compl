<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Support\Facades\Hash;
use Session;
use Cookie;
use \DB;
//use App\Http\Controllers\Cookie;

class LoginController extends Controller{   
    public function login() {
        ini_set("display_errors", "1");
        error_reporting(E_ALL);
    	//dd(Cookie::get('ID'));
    	if(Cookie::get('table')==null){
            // Cookie::queue("ID", null, 365*24*60);
            // Cookie::queue("table", null, 365*24*60);
            // Cookie::queue("login", null, 365*24*60);
            // Cookie::queue("name", null, 365*24*60);
            // Cookie::queue("password", null, 365*24*60);
            // Cache::flush();
            return view('login');
        } 
    	if(Cookie::get('table')=='admin'){
            // Session::put('login', true);
            // Session::push('user.id', $id);
            $id=Cookie::get('ID');
            $password=Cookie::get('password');
            $value=DB::table('admin') 
            ->where('ID',$id)
            ->first();
            if(Hash::check($password, $value->password)){
                Cookie::queue("name", $value->fullname, 365*24*60);
                return redirect()->action('HomeController@homead'); 
            }else return redirect()->action('UserController@logout');
            
			
    	}
    	if(Cookie::get('table')=='users'){
    		
            // Session::put('login', true);
            // Session::push('user.id', $id);
            $id=Cookie::get('ID');
            $password=Cookie::get('password');
            $value=DB::table('users') 
            ->where('id',$id)
            ->first();
            
            if(Hash::check($password, $value->password)){
                Cookie::queue("name", $value->fullname, 365*24*60);
                return redirect()->action('HomeController@home', ['id' => $id]);
            }else return redirect()->action('UserController@logout');
			
                 
    	}
    }
    public function register(){
        return view('myregister');
    }

    
}
?>