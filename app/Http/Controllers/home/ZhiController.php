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

		//查询松鼠知状态为2的数据
		$zhi = DB::table('zhi')->where('status',2)->first();

		// $zhi = $zhi->toArray();
		//如果没有查询到数据,设定一个默认值
		if($zhi == null){
			$zhi = (object)['author' => '','addtime' => 0,'zhi1' => '','zhi2' => '','zhi3' => '','zhi4' => ''];
		}
		// dd($zhi);

		 //随机获取三个商品
        $goods1 = Goods::inRandomOrder()->take(3)->get(); 
        $goods2 = Goods::inRandomOrder()->take(3)->get(); 
        $goods3 = Goods::inRandomOrder()->take(3)->get(); 

        //查询状态为2的广告
        $advert = DB::table('advert')->where('zhi_status',2)->get();
        
        //随机获取一条广告,右下角
        $youxiajiao = DB::table('advert')->inRandomOrder()->take(1)->get(); 

        $youxiajiao = $youxiajiao->toArray();
        // dd($youxiajiao);
        if($youxiajiao == []){
        	$youxiajiao = (object)['adurl' => '','adpic' => ''];
        	$youxiajiao = ['0'=>$youxiajiao];
        }
        // dd($youxiajiao);

		$links = DB::table('friendlink')->get();
		return view('home/zhi/zhi',['youxiajiao'=>$youxiajiao,'advert'=>$advert,'zhi'=>$zhi,'goods1'=>$goods1,'goods2'=>$goods2,'goods3'=>$goods3,'title'=>'松鼠新闻','links'=>$links]);
	}

}
