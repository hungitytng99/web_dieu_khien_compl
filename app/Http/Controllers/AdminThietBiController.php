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
    class AdminThietBiController extends Controller{   

    public function index()
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //redirect()->route('loginn');}
        $st = DB::table('thiet_bi')->orderBy('id', 'asc')->get();
        return view('/admin_thiet_bi',compact('st'));
    }

    public function edit($id)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //redirect()->route('loginn');}
        $value = DB::table('thiet_bi')->find($id);
        $pageName = 'Update Thiet Bi';
        return view('/edit_thiet_bi', compact('value', 'pageName'));
    }

    public function update(Request $request, $id)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //redirect()->route('loginn');}

        //$value=$request->all();
        if($request->name==null){
        
        return redirect()->action('AdminThietBiController@edit',['id'=>$id])->with('error', 'Name and status may not be blank.');    
        }
        if($request->isShowUser==null) $isShowUser=false;
        else $isShowUser=true;
        $news = DB::table('thiet_bi')
                ->where('id',$id)
                ->update(array(
                    'name'=> $request->name,
                    'ip_address'=> $request->ip_address,
                    'isShowUser'=>$isShowUser,
                    'port'=>$request->port,
                    'scriptOn'=>$request->scriptOn,
                    'scriptOff'=>$request->scriptOff,
                    'statusPath'=>$request->statusPath
                ));
        return redirect()->action('AdminThietBiController@index')->with('success', 'Update success.');
        
    }
    public function delete($id)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //redirect()->route('loginn');}
        $value = DB::table('thiet_bi')
                ->where('id',$id)
                ->delete();
        $value = DB::table('connective')
                ->where('id_tb',$id)
                ->delete();
        
        return redirect()->action('AdminThietBiController@index')->with('success', 'Delete success.');
    }
    public function add(Request $request)
    {
        if (Cookie::get('table')!='admin')
            return redirect()->away('/');
            //redirect()->route('loginn');}
        if($request->name!=null){
        if($request->isShowUser==null) $isShowUser=false;
        else $isShowUser=true;
        DB::table('thiet_bi')
        ->insert(
            [ 'name'=>$request->name,
                    'ip_address'=> $request->ip_address,
                    'isShowUser'=>$isShowUser,
                    'port'=>$request->port,
                    'scriptOn'=>$request->scriptOn,
                    'scriptOff'=>$request->scriptOff,
                    'statusPath'=>$request->statusPath
                ]);
        return redirect()->action('AdminThietBiController@index')->with('success', 'Add success.');        
            
        }
        
            return redirect()->action('AdminThietBiController@index')->with('error', 'Add fail.Name not null');
        



    }
}
