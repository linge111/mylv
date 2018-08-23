<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Formjy;

class user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $arr = DB::select("select * from biao");
        // $arr = DB::table("biao") ->get();
        $q = $request -> input("ss");
        $arr = DB::table('biao') -> where('zh','like','%'.$q.'%') ->  paginate(5);



        return view("Admin/user_index",['arr' => $arr,'res'=>$request -> all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin/user_add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Formjy $request)
    {



        // $yh = $request -> input("zh"); 
        // if($yh == null)
        // {
        //     // return back() -> withInput();
        //     $request -> flash();
        //     return redirect("/user/create");
        // }
        
        
        $arr = $request -> except("_token");

        if($request -> hasFile('sj'))
        {
          
            $hz = $request -> file("sj") -> getClientOriginalExtension();
            $m = time().rand(1000,9999);
            $request -> file("sj") -> move("./img",$m.'.'.$hz);
            $arr['sj'] = $m.'.'.$hz;
        }

       
       $q = DB::table("biao") -> insert($arr);

      if($q)
      {
            return redirect("/user") -> with("success","添加数据成功");

      }else{
            return redirect("/user/create") -> with("error","数据添加失败"); 
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr =DB::table("biao") -> where("id","=",$id) -> first();
        return view("Admin/user_edit",['arr' => $arr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table("biao") -> where("id",$id) -> update(["zh" => $request -> input("zh"),"mm" => $request -> input("mm")]);

        return redirect("/user") -> with("success","数据修改成功");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("delete from biao where id=".$id);
        return redirect("/user"); 
    }
}
