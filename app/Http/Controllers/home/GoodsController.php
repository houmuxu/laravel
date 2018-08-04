<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;
use App\Model\Admin\Goods;

class GoodsController extends Controller
{
    public function index($id)
    {
        $goods = [];
        if($id){
            $arr_cid = Cate::where('path','like',"%,$id,%")->pluck('cid');

        }	
        	// 为了避免没有子分类 把自己加里面
        	$arr_cid[] = $id;

        	foreach($arr_cid as $k => $v) {
        		$goods[] = Goods::where('cid',$v)->get();
        	}

        // if($gname=$request->only('gname')){
        //     $condition[] = ['gname','like',"%$gname%"];
        // }
        	// var_dump($goods);
      

       return view('home/goods/list',['goods'=>$goods]);
    }

    public function show($id)
    {
       $data = Goods::where('gid',$id)->first();
       return view('home/goods/show',['data'=>$data]);
    }
}
