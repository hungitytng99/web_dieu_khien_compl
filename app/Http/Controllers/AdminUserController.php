<?php

    namespace App\Http\Controllers;

    use App\News;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Session;
    use Cookie;

    /**
     *  Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    class AdminUserController extends Controller{   

    public function index()
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //return redirect()->route('loginn');
        $user = DB::table('users')->orderBy('id', 'asc')->get();
        return view('/admin_user',compact('user'));
    }
    public function edit($id)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //return redirect()->route('loginn');}
        $value = DB::table('users')->find($id);
        $pageName = 'News - Update';
        return view('/edit_user', compact('value', 'pageName'));
    }
    public function update(Request $request, $id)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //return redirect()->route('loginn');
        //$value=$request->all();
        $user = DB::table('users')->find($id);

        if($request->username!=$user->username){
            $user1=DB::table('users') 
                    ->where('username',$request->username)
                    ->count();
            $user2=DB::table('admin') 
                    ->where('username',$request->username)
                    ->count();
            if($user1+$user2>0) return redirect()->action('AdminUserController@edit', compact('id'))->with('error', 'The username already exists!');
        }


        if($request->email!=$user->email){
            $user1=DB::table('users') 
                    ->where('email',$request->email)
                    ->count();
            $user2=DB::table('admin') 
                    ->where('email',$request->email)
                    ->count();
            if($user1+$user2>0) return redirect()->action('AdminUserController@edit', compact('id'))->with('error', 'The email already exists!');
        }

        $news = DB::table('users')
                ->where('id',$id)
                ->update(array(
                    'username'=> $request->username,
                    'fullname'=> $request->fullname,
                    'email'=> $request->email
                ));
        return redirect()->action('AdminUserController@index')->with('success', 'Update success.');
        
    }
    public function delete($id)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //return redirect()->route('loginn');
        $value = DB::table('users')
                ->where('id',$id)
                ->delete();

        $value = DB::table('connective')
                ->where('id_us',$id)
                ->delete();

        return redirect()->action('AdminUserController@index')->with('success', 'Delete success.');
    }
    public function add(Request $request)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //redirect()->route('loginn');
        if($request->password!=$request->confirm_password) return redirect()->action('AdminUserController@index')->with('error', 'Confirm password false!');

        $user1=DB::table('users') 
                ->where('username',$request->username)
                ->count();
        $user2=DB::table('admin') 
                ->where('username',$request->username)
                ->count();
        if($user1+$user2>0) return redirect()->action('AdminUserController@index')->with('error', 'The username already exists!');

        $user1=DB::table('users') 
                ->where('email',$request->email)
                ->count();
        $user2=DB::table('admin') 
                ->where('email',$request->email)
                ->count();
        if($user1+$user2>0) return redirect()->action('AdminUserController@index')->with('error', 'The email already exists!');

        DB::table('users')
        ->insert(
            [ 'username'=>$request->username, 'fullname'=>$request->fullname , 'email'=>$request->email , 'password'=>Hash::make($request->password)]);
        return redirect()->action('AdminUserController@index')->with('success', 'Add success.');

    }

    public function reset_pw($id){
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //return redirect()->route('loginn');}
        $value = DB::table('users')->find($id);
        
        return view('/reset_pw', compact('value'));
    }
    public function post_reset_pw(Request $request,$id){
        if($request->new_password!=$request->confirm_new_password)
        return redirect()->action('AdminUserController@reset_pw', ["id"=>$id])
            ->with('error', 'Confirm password not true!'); 
        else{
            
            DB::table('users')
                ->where('id',$id)
                ->update(array(
                    'password'=> Hash::make($request->new_password),
                    'google2fa_secret'=> null
                ));
            return redirect()->action('AdminUserController@index')->with('success', 'Reset password success.');
        }
            

    }

}
