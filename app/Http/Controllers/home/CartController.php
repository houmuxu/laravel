<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\home\Cart;
use App\Model\Admin\Goodspic;
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
        $data = DB::table('cart')->where('uid',1)->get();
       
         //  求总数量,总金额
        $cnt = 0;
        $sum = 0;
        $gpic = [];
        foreach($data as $k=>$v){
            $cnt += $v->num;
            $sum += $v->price * $v->num;

            $id = $v->gid;
            $gid = Goodspic::where('gid',$id)->first();
            $gpic = $gid->gpic;

        }

        //  通过gid找到商品的图片

        return view('home.cart.index',['data'=>$data,'cnt'=>$cnt,'sum'=>$sum,'gpic'=>$gpic]);
    }

    //  购物车删除商品
    public function del(Request $request)
    {
        
        //  获取id
        $id = $request->input('res');

        $data = DB::table('cart')->where('id',$id)->delete();

        echo $data;
    }


   

}
