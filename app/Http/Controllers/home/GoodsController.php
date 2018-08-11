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
use App\Model\home\Cartsinfo;

    class GoodsController extends Controller
    {
        public function index($id)
        {
            // $id = 100;
            $panduan = Cate::where('path','like',"%,$id,%")->pluck('cid');
            // dd($panduan);
            if($panduan == []){
                $arr_cid = $id;
                $goods = Goods::where('cid',$arr_cid)->paginate(12);
                $good = Goods::where('cid',$arr_cid)->get();
                $jingdian = Goods::where('cid',$arr_cid)->inRandomOrder()->limit(3)->get();

            } else {
                $arr_cid = Cate::where('path','like',"%,$id,%")->pluck('cid');
                  // 为了避免没有子分类 把自己加里面
                $arr_cid[] = $id;
                $goods = Goods::whereIn('cid',$arr_cid)->paginate(12);
                $good = Goods::whereIn('cid',$arr_cid)->get();
                $jingdian = Goods::whereIn('cid',$arr_cid)->inRandomOrder()->limit(3)->get();

            }

                $cate = Cate::where('cid',$id)->first();
                $links = DB::table('friendlink')->get();
                $shu = 0;
               foreach ($good as $key => $value) {
                   $shu += 1;
               }
               $sub = Cate::getTreeCates([],$cate->cid);          

           return view('home/goods/list',['title'=>$cate->cname.'-三只松鼠旗舰店','goods'=>$goods,'links'=>$links,'shu'=>$shu,'cate'=>$cate,'sub'=>$sub,'jingdian'=>$jingdian]);
        }


        public function show($id)
        {
            $links = DB::table('friendlink')->get();
            $data = Goods::where('gid',$id)->first();
            $goods = Goods::where('cid',$data->cid)->get();
            $cate = Cate::where('cid',$data->cid)->first();
            return view('home/goods/show',['data'=>$data,'title'=>$data->gname,'links'=>$links,'goods'=>$goods,'cate'=>$cate]);
        }


        public function where(Request $request)
        {
            $gname = $request->input('gname');
            $goods = Goods::where('gname','like','%'.$gname.'%')->paginate(12);
                $links = DB::table('friendlink')->get();
                $shu = 0;
            foreach ($goods as $key => $value) {
                $shu += 1;
            }
            $jingdian = Goods::where('gname','like','%'.$gname.'%')->inRandomOrder()->limit(3)->get();
            
            return view('home/goods/shoulist',['title'=>'商品列表','goods'=>$goods,'request'=>$request,'links'=>$links,'shu'=>$shu,'jingdian'=>$jingdian]);
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

        public function jingdian(Request $request)
        {

        }

        //立即购买
        public function cartinfo(Request $request)
        {   
            $uid = '1';
            $arr = $_GET['res'];
            $gid = $arr[0];
            $num = $arr[1];
            $goodsattr = $arr[2];
            $goods = Goods::where('gid',$gid)->get();
            $gname = $goods[0]->gname;
            $price = $goods[0]->price;
            $prs = (string)($price*$num);
            $data = array('uid'=>$uid,'gid'=>$gid,'gname'=>$gname,'prs'=>$prs,'num'=>$num,'price'=>$price,'goodsattr'=>$goodsattr);
            $res = DB::table('cartinfoone')->insert($data);
            var_dump($res);
        }

    }
