<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\home\Cart;

class CartController extends Controller
{
    public function store(Request $request)
    {
    	$uid = 1;
    	$arr = $_GET['res'];
    	$gid = $arr[0];
    	$num = $arr[1];
    	$goods = Goods::where('gid',$gid)->get();
    	$gname = $goods[0]->gname;
    	$price = $goods[0]->price;
    	$data = array('uid'=>$uid,'gid'=>$gid,'gname'=>$gname,'num'=>$num,'price'=>$price);
    	$res = Cart::create($data);
    	echo $res;
    }
}
