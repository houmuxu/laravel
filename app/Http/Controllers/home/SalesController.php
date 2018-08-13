<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Sales;
use App\Model\Admin\Salespic;
use DB;

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

    	return view('home.sales.show',['title'=>'促销商品详情页','links'=>$links,'data'=>$data,'res'=>$res]);
    }

    public function ajax()
    {
    	
    }
}
