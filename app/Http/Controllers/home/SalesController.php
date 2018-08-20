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
           
            Cookie::queue('uid',session('uid'),7*24*60);
            Cookie::queue('gid',$id,7*24*60);
            Cookie::queue('uptime',time(),7*24*60);

        //  我的足迹结束

    	return view('home.sales.show',['title'=>'促销商品详情页','links'=>$links,'data'=>$data,'res'=>$res]);
    }

    //   立即购买
    public function shop_now(Request $request)
    {
        // $arr = $request->input('res');

        // dd($arr);
        $uid = session('uid');
        $arr = $_GET['res'];
        $sid = $arr[0];
        $num = $arr[1];
        $goodsattr = $arr[2];
        $goods = Sales::where('sid',$sid)->get();
        $gname = $goods[0]->gname;
        $newprice = $goods[0]->newprice;
        $prs = $newprice * $num;
         $data = array('uid'=>$uid,'gid'=>$sid,'gname'=>$gname,'num'=>$num,'price'=>$newprice,'goodsattr'=>$goodsattr,'prs'=>$prs);
        // $res = Cartinfo::create($data);
        var_dump($data);

         try{
            $rs = DB::table('cartinfoone')->insert($data);
            if($rs){
                echo 1;
            }
        } catch(\Exception $e){
            echo 0;
        }
        echo $rs;

    }

    
}
