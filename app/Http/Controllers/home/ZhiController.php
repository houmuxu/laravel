<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodspic;

class ZhiController extends Controller
{
    
	public function index()
	{
		$zhi = DB::table('zhi')->where('status',2)->first();
		// dd($zhi);
		 //随机获取一张商品
        $goods1 = Goods::inRandomOrder()->take(3)->get(); 
        $goods2 = Goods::inRandomOrder()->take(3)->get(); 
        $goods3 = Goods::inRandomOrder()->take(3)->get(); 
        // dd($goods1);
		$links = DB::table('friendlink')->get();
		return view('home/zhi/zhi',['zhi'=>$zhi,'goods1'=>$goods1,'goods2'=>$goods2,'goods3'=>$goods3,'title'=>'松鼠新闻','links'=>$links]);
	}

}
