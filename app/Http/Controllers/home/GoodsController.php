<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;
use App\Model\Admin\Goods;
use App\Model\Admin\User;
use Mail;
use Cache;
use DB;

class GoodsController extends Controller
{
    public function index($id)
    {
        
        if($id){
            $arr_cid = Cate::where('path','like',"%,$id,%")->pluck('cid');

        }	
        	// 为了避免没有子分类 把自己加里面
        	$arr_cid[] = $id;

        	
        		$goods = Goods::whereIn('cid',$arr_cid)->paginate(8);
        	   // Cache::('goods',$goods,100);
               Cache::forever('goods',$goods);

        // if($gname=$request->only('gname')){
        //     $condition[] = ['gname','like',"%$gname%"];
        // }
        	// var_dump($goods);
      $links = DB::table('friendlink')->get();

       return view('home/goods/list',['title'=>'商品列表','goods'=>$goods,'links'=>$links]);
    }

    public function show($id)
    {
        $links = DB::table('friendlink')->get();
       $data = Goods::where('gid',$id)->first();
       return view('home/goods/show',['data'=>$data,'links'=>$links]);
    }
    public function email()
    {
        return view('home/goods/email');
    }

    public function useremail(Request $request)
    {
        
         Mail::send('home/goods/emailcode', ['uid' => '1','email'=>$request->input('emails')], function ($m) use ($request) {
            $m->from(env('MAIL_USERNAME'), '三只松鼠旗舰店');

            $m->to($request->input('emails'), '侯牧序')->subject('更换邮箱验证');
        });

    }

    public function emailjihuo(Request $request)
    {
        $uid = $request->input('id');
        $email = $request->input('email');
        //等待uodate

    }

}
