<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Lunbo;
use Config;

class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/lunbo/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/lunbo/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = $request->except('file','_token');

        $pic = $request->file('pic');
        //名字
        $name =  date('Ymd',time()).str_random(6);
        //后缀
        $suffix = $pic->getClientOriginalExtension();
        //移动
        $pic->move(Config::get('webconfig.uploadlunbo'),$name.'.'.$suffix);
        //存入数组
        $res['pic'] = '/uploads/lunbo/'.$name.'.'.$suffix;
        $res['uptime'] = time();

        try{
            $ju = Lunbo::create($res);
            if($ju){
                return redirect('/admin/lunbo')->with('success','添加轮播图成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加轮播图失败');
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
        //
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
        //
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
