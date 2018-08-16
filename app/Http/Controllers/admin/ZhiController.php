<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ZhiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::table('zhi')->orderBy('id','asc')->paginate(5); 
        return view('admin/zhi/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/zhi/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
         $res = $request->except('_token');
         
         $res['addtime']= time();
         $res['status'] = 1;
         // dd($res);
        
        try{

            $data = DB::table('zhi')->insert($res);

            if($data){

                return redirect('/admin/zhi')->with('success','添加成功');

            } else {

                return back()->with('error','添加失败');

            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');

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
         $res = DB::table('zhi')->where('id',$id)->first();
        // dd($res);
        return view('admin/zhi/edit',['res'=>$res]);
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
          // dd($request->all());
        $res = $request->except('_token','_method');
        // dd($res);

         try{
              

            $data = DB::table('zhi')->where('id',$id)->update($res);

            if($data){
                return redirect('/admin/zhi')->with('success','修改成功');
            } else {
                return back()->with('error','修改失败');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
