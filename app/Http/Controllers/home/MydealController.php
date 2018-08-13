<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;
use App\Model\Admin\Details;
use DB;

class MydealController extends Controller
{
    //订单管理首页
    public function index()
    {
    	$uid = 1;

    	$orders = Orders::orderBy('id','desc')->where('uid',$uid)->where('status','!=',5)->get();

        //代发货
        $daifahuo = Orders::orderBy('id','desc')->where('uid',$uid)->where('status',1)->get();
        // dd($daifahuo);

        //待收货
        $daishouhuo = Orders::orderBy('id','desc')->where('uid',$uid)->where('status',2)->get();
        // dd($daishouhuo);

        //已签收
        $yiqianshou = Orders::orderBy('id','desc')->where('uid',$uid)->where('status',3)->get();
        // dd($yiqianshou);

    	$links = DB::table('friendlink')->get();
    	return view('home/order/mydeal',['orders'=>$orders,'daifahuo'=>$daifahuo,'daishouhuo'=>$daishouhuo,'yiqianshou'=>$yiqianshou,'links'=>$links,'title'=>'订单管理']);
    }

    //删除订单
    public function delete(Request $request)
    {
    	$id = $request->input('id');
    	$res = Orders::where('id',$id)->update(['status'=>5]);
    	echo $res;
    }

    //订单页确认收货
    public function status(Request $request)
    {
    	$id = $request->input('id');
    	$res = Orders::where('id',$id)->update(['status'=>3]);
    	echo $res;
    }

    //订单详情
    public function details(Request $request,$oid)
    {
    	$data = Orders::where('oid',$oid)->get();
    	// dd($data);
    	// echo '<pre>'; var_dump($orders);
    	$links = DB::table('friendlink')->get();
    	return view('home/order/details',['data'=>$data,'links'=>$links,'title'=>'订单详情页']);
    }

    //订单详情页确认收货
    public function details_status(Request $request)
    {
    	$id = $request->input('id');
    	$res = Orders::where('id',$id)->update(['status'=>3]);
    	echo $res;
    }

    //地址管理主页
    public function address()
    {
        $uid = 1;
        $res = DB::table('address')->orderBy('id','desc')->where('uid',$uid)->get();
        
        $links = DB::table('friendlink')->get();
        return view('home/order/address',['res'=>$res,'links'=>$links,'title'=>'地址管理']);
    }

    //地址管理---保存
    public function store(Request $request)
    {
        $uid = 1;
        $data = $request->except('_token');
        $data['uid'] = $uid;
        // dd($data);

        $res = DB::table('address')->insert($data);

        if($res){
            return redirect('/home/address/index');
        } else{
            return back();
        }
    }

    //地址管理--修改页
    public function edit($id)
    {

        $res = DB::table('address')->where('id',$id)->first();
        $links = DB::table('friendlink')->get();
        return view('home/order/edit',['res'=>$res,'links'=>$links,'title'=>'修改地址']);

    }

    //地址管理--修改，存入数据库
    public function update(Request $request,$id)
    {
        $data = $request->except('_token');
        // dd($res);
        $res = DB::table('address')->where('id',$id)->update($data);

        if($res){
            return redirect('/home/address/index');
        } else {
            return back();
        }

    }

    //删除收货地址
    public function del(Request $request) 
    {
        $id = $request->input('id');
        $res = DB::table('address')->where('id','=',$id)->delete();
        return $res;
    }

}
