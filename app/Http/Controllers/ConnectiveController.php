<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Cookie;
    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    class ConnectiveController extends Controller{   

    public function connective()
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            // return redirect()->route('loginn');
        $user = DB::table('users')->orderBy('username', 'asc')->get();
        $st = DB::table('thiet_bi')->orderBy('name', 'asc')->get();
        $cn = DB::table('connective')
                ->join('thiet_bi', 'thiet_bi.id', '=', 'connective.id_tb')
                ->join('users', 'users.id', '=', 'connective.id_us')
                ->orderBy('username', 'asc')
                ->get();
        $check[0][0]=0;
        foreach ($user as $key1) {
            # code...
            foreach ($st as $key2) {
                # code...
                $check[$key1->id][$key2->id]=0;
            }
        }
        foreach ($cn as $key) {
            # code...
            $check[$key->id_us][$key->id_tb]=1;
        }
        return view('/connective',compact('user', 'st', 'cn', 'check'));
    }



    public function add_user_connect(Request $request, $id){
        
        $idtb=$request->id_cn;

        DB::table('connective')
            ->where('id_us',$id)
            ->delete();


        if($idtb!=null){
            foreach ($idtb as $key) {
                DB::table('connective')
                ->insert([
                    'id_us'=>$id, 'id_tb'=>$key]);
            }
        }
        
        return redirect()->action('ConnectiveController@connective')->with('success1', 'Change success!');

    }



}

