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

		//查询松鼠知数据
		$zhi = DB::table('zhi')->where('status',2)->first();
		// dd($zhi);
		 //随机获取一张商品
        $goods1 = Goods::inRandomOrder()->take(3)->get(); 
        $goods2 = Goods::inRandomOrder()->take(3)->get(); 
        $goods3 = Goods::inRandomOrder()->take(3)->get(); 

        //查询状态为2的广告
        $advert = DB::table('advert')->where('zhi_status',2)->get();
        // dd($advert);
        // dd($goods1);
		$links = DB::table('friendlink')->get();
		return view('home/zhi/zhi',['advert'=>$advert,'zhi'=>$zhi,'goods1'=>$goods1,'goods2'=>$goods2,'goods3'=>$goods3,'title'=>'松鼠新闻','links'=>$links]);
	}

}
