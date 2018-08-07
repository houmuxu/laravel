<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\home\Cart;
use DB;

class CartController extends Controller
{
    public function store(Request $request)
    {
    	$uid = 1;
    	$arr = $_GET['res'];
    	$gid = $arr[0];
    	$num = $arr[1];
        $goodsattr = $arr[2];
    	$goods = Goods::where('gid',$gid)->get();
    	$gname = $goods[0]->gname;
    	$price = $goods[0]->price;
    	$data = array('uid'=>$uid,'gid'=>$gid,'gname'=>$gname,'num'=>$num,'price'=>$price,'goodsattr'=>$goodsattr);
    	$res = Cart::create($data);
    	echo $res;
    }

    //  购物车页面
    public function index()
    {
        //  获取数据
        $data = DB::table('cart')->get();
        // echo"<pre>";
        // var_dump($data->['gname']);
         //  求总数量,总金额
        $cnt = 0;
        $sum = 0;
        foreach($data as $k=>$v){
            $cnt += $v->num;
            $sum += $v->price * $v->num;


        }

        //  


        return view('home.cart.index',['data'=>$data,'cnt'=>$cnt,'sum'=>$sum]);
    }

    //  购物车删除商品
    public function del()
    {
        echo 123;
    }
}
