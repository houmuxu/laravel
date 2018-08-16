<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('advert')->orderBy('adid','asc')->paginate(5); 
        //随机获取一张广告
        $advert = DB::table('advert')->inRandomOrder()->first();
        // dd($advert);
        return view('admin/advert/index',['data'=>$data,'advert'=>$advert]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin/advert/add');
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
        $res = $request->except('_token','adpic');
        // dd($res);

         try{
        
            
            if($request->hasFile('adpic')){

                    //  名字
                    $name = date('Ymd',time()).str_random(6);

                    //  后缀
                    $suffix = $request->file('adpic')->getClientOriginalExtension();

                    //  移动
                    $move = $request->file('adpic')->move('./uploads/advert/',$name.'.'.$suffix);

                    $res['adpic'] = '/uploads/advert/'.$name.'.'.$suffix;

                    // dd($res);

            }
            $res['zhi_status'] = 1;
            // dd($res);

            $data = DB::table('advert')->insert($res);

            if($data){
                return redirect('/admin/advert')->with('success','添加成功');
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
    public function edit($adid)
    {
        $res = DB::table('advert')->where('adid',$adid)->get();
        // dd($res);
        return view('admin/advert/edit',['res'=>$res]);
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
        $res = $request->except('_token','adpic','_method');
        // dd($res);

         try{
        
            
            if($request->hasFile('adpic')){

                    $aa = DB::table('advert')->where('adid',$id)->first();
                    // dd($aa->adpic);
                    //删除文件
                    unlink('.'.$aa->adpic);
                    // dd($bb);

                    //  名字
                    $name = date('Ymd',time()).str_random(6);

                    //  后缀
                    $suffix = $request->file('adpic')->getClientOriginalExtension();

                    //  移动
                    $move = $request->file('adpic')->move('./uploads/advert/',$name.'.'.$suffix);

                    $res['adpic'] = '/uploads/advert/'.$name.'.'.$suffix;

                    // dd($res);

            }

            $data = DB::table('advert')->where('adid',$id)->update($res);

            if($data){
                return redirect('/admin/advert')->with('success','添加成功');
            } else {
                return back()->with('error','添加失败');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');

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
