<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\User;
use App\Model\Admin\Goods;

class SelfController extends Controller
{
    public function index()
    {
    	$remen = Goods::inRandomOrder()->limit(3)->get();
    	$uid = session('uid');
        $user = User::where('uid',$uid)->first();
        $coll = $user->colls;
        // 商品
        $goods = [];
        foreach ($coll as $k => $v) {
            $goods[] = Goods::where('gid',$v->gid)->first();
        }
        // 商品结束
    	$links = DB::table('friendlink')->get();
    	return view('home.self.index',['title'=>'个人中心首页','links'=>$links,'goods'=>$goods,'remen'=>$remen]);

    }
}
