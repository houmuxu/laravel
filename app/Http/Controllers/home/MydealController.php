<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;
use App\Model\Admin\Details;
use DB;

class MydealController extends Controller
{
    public function index()
    {
    	$uid = 1;
    	$orders = Orders::orderBy('id','desc')->where('uid',$uid)->where('status','!=',5)->get();
    	$links = DB::table('friendlink')->get();
    	return view('home/order/mydeal',['orders'=>$orders,'links'=>$links,'title'=>'订单管理']);
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

}
