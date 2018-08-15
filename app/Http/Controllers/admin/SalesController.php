<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Sales;
use App\Model\Admin\Salespic;
use DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = DB::table('sales')->where(function($query) use($request){
            $gname = $request->input('gname');
            $min = $request->input('min');
            $max = $request->input('max');
            if(!empty($gname)){
                $query->where('gname','like','%'.$gname.'%');
            }
            if(!empty($min)){
                 $query->where('newprice','>=',$min);
            }
            if(!empty($max)){
                 $query->where('newprice','<=',$max);
            }
        })->paginate(10);
        
        return view('admin.sales.index',['data'=>$data,'request'=>$request,'title'=>'促销商品列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.sales.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  获得数据
        $res = $request->except('_token','salespic');

        $res['uptime'] = time();
        // echo"<pre>";
        // var_dump($res);

        try{
        
            $data = Sales::create($res);
            //  通过id号获得图片
            $id = $data->sid;
            
            $sales = Sales::find($id);
            if($request->hasFile('salespic')){
                foreach($request->file('salespic') as $k=>$v){
                    //  名字
                    $name = date('Ymd',time()).str_random(6);

                    //  后缀
                    $suffix = $v->getClientOriginalExtension();

                    //  移动
                    $move = $v->move('./uploads/sales/',$name.'.'.$suffix);

                    //  添加商品图片
                    $sales->salespic()->createMany([
                       ['salespic' => '/uploads/sales/'.$name.'.'.$suffix]
                    ]);
                }
            }

            if($data){
                return redirect('/admin/sales');
            }

        }catch(\Exception $e){

            return back();

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
        $data = Sales::find($id);

        return view('admin.sales.edit',['data'=>$data]);
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
        $res = $request->except('_token','_method','salespic');
        $res['uptime'] = time();
         try{
        
            $data = Sales::where('sid',$id)->update($res);
            $sales = Sales::find($id);
            if($request->hasFile('salespic')){
                foreach($request->file('salespic') as $k=>$v){
                    //  名字
                    $name = date('Ymd',time()).str_random(6);

                    //  后缀
                    $suffix = $v->getClientOriginalExtension();

                    //  移动
                    $move = $v->move('./uploads/sales/',$name.'.'.$suffix);

                    //  添加商品图片
                    $sales->salespic()->createMany([
                       ['salespic' => '/uploads/sales/'.$name.'.'.$suffix]
                    ]);
                }
            }

            if($data){
                return redirect('/admin/sales');
            }

        }catch(\Exception $e){

            return back();

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
        //  删除关联图片
        $res = Salespic::where('sid',$id)->get();
      
        foreach($res as $k=>$v){
            $del = unlink('.'.$v->salespic);
        }

        //  删除主表图片     
            $sid = Sales::find($id);
            // echo'<pre>';
            // var_dump($sid);

            $sdel = $sid ->where('sid',$id)->delete();
        
        //  删除主表
        if($sdel){
            $rs = Sales::destroy($id);
            return redirect('/admin/sales');
        }else{
       
            return back();
        }
    }
}
