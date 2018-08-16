<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Sales;
use App\Model\Admin\Salespic;
use DB;
use Cookie;

class SalesController extends Controller
{
    public function index()
    {
    	$sales = Sales::get();
    	$links = DB::table('friendlink')->get();
    	return view('home.sales.index',['title'=>'促销商品活动页面','sales'=>$sales,'links'=>$links]);
    }

    public function show($id)
    {
    	$links = DB::table('friendlink')->get();
    	$data = Sales::where('sid',$id)->first();
    	$res = DB::table('salespic')->where('sid',$id)->get();

        // 我的足迹
           
            Cookie::queue('uid',1,7*24*60);
            Cookie::queue('gid',$id,7*24*60);
            Cookie::queue('uptime',time(),7*24*60);

        //  我的足迹结束

    	return view('home.sales.show',['title'=>'促销商品详情页','links'=>$links,'data'=>$data,'res'=>$res]);
    }

    
}
