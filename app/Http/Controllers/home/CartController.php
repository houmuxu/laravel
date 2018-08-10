<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\home\Cart;
use App\Model\Admin\Goodspic;
use DB;
use App\Model\home\Cartsinfo;

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
    	var_dump($data);
    }

    //  购物车页面
    public function index()
    {
        //  获取数据
        $data = DB::table('cart')->where('uid',1)->get();
        $links = DB::table('friendlink')->get();
       
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

        return view('home.cart.index',['data'=>$data,'cnt'=>$cnt,'sum'=>$sum,'gpic'=>$gpic,'links'=>$links]);
    }

    //  购物车删除商品
    public function del(Request $request)
    {
        
        //  获取id
        $id = $request->input('res');

        $data = DB::table('cart')->where('id',$id)->delete();

        echo $data;
    }

    public function ajaxcart(Request $request)
   {
        $arr = $request->input('arr');

        //   获取id号删除cart表数据
        $id = $request->input('id');
        

        //   将所得数据存入cartinfo表
        $data = [];
        $res = [];
        foreach($arr as $k=>$v){
            $data = array('gid'=>$v[6],'num'=>$v[2],'price'=>$v[4],'gname'=>$v[3],'prs'=>$v[0],'uid'=>$v[7],'goodsattr'=>$v[5]);
            $res[] = $data;
        }

        // var_dump($res);
        try{
            $rs = DB::table('cartinfo')->insert($res);
            if($rs){
                echo 1;
            }
        } catch(\Exception $e){
            echo 0;
        }
        echo $rs;

        foreach($id as $k=>$v){
            $fin = DB::table('cart')->where('id',$v[0])->delete();
        }
        echo $fin;
    
    }

   

}
