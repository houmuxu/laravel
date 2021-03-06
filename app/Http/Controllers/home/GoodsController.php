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
use Cookie;
use App\Model\home\Cartsinfo;
use App\Model\home\Coll;
use App\Model\Admin\Sales;
use App\Model\Admin\Eva;

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
            $allgoods = Goods::where('gid','>',0)->inRandomOrder()->paginate(12);
            // 评价
            // $evals = $data->evals;
            $evals = Eva::where('gid',$id)->paginate(10);
            $all = 0; $hao = 0; $zhong = 0; $cha = 0;
            foreach ($evals as $k => $v) {
                $all += 1;
                if($v->rank == 1){
                    $hao += 1;
                }
                if($v->rank == 2){
                    $zhong += 1;
                }
                if($v->rank == 3){
                    $cha += 1;
                }
            }
            if($all != 0){
                $haopinglv = $hao/$all*100;
            }else{
                $haopinglv = 0;$hao = 0;$all = 0;$zhong = 0;$cha = 0;
                
            }
            // 评价结束
            // 收藏
            $uid = session('uid');
            $coll = Coll::where(function($query) use($uid,$id){
                $query->where('uid',$uid);
                $query->where('gid',$id);
            })->first();
           

            if($coll != NULL){
                 $collstatus = $coll->status;
            } else {
                $collstatus = 0;
            }
            // 收藏结束


            // 我的足迹
           
            Cookie::queue('uid',1,7*24*60);
            Cookie::queue('gid',$id,7*24*60);
            Cookie::queue('uptime',time(),7*24*60);

            //  我的足迹结束
            
            $sales = Sales::inRandomOrder()->limit(4)->get();

            return view('home/goods/show',['data'=>$data,'title'=>$data->gname,'links'=>$links,'goods'=>$goods,'cate'=>$cate,'allgoods'=>$allgoods,'evals'=>$evals,'hao'=>$hao,'zhong'=>$zhong,'cha'=>$cha,'all'=>$all,'haopinglv'=>$haopinglv,'collstatus'=>$collstatus,'sales'=>$sales]);
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
            
            return view('home/goods/shoulist',['title'=>'商品列表','goods'=>$goods,'gname'=>$gname,'links'=>$links,'shu'=>$shu,'jingdian'=>$jingdian,'request'=>$request]);
        }

        public function email()
        {
            $links = DB::table('friendlink')->get();
            return view('home/goods/email',['title'=>'换绑邮箱','links'=>$links]);
        }

        public function useremail(Request $request)
        {
            $uid = session('uid');
             $res = Mail::send('home/goods/emailcode', ['uid' => $uid,'email'=>$request->input('emails')], function ($m) use ($request) {
                $m->from(env('MAIL_USERNAME'), '三只松鼠旗舰店');

                $m->to($request->input('emails'), '侯牧序')->subject('更换邮箱验证');
            });
             echo 1;
        }

        public function emailjihuo(Request $request)
        {
            $uid = $request->input('id');
            $email = $request->input('email');
            $res = User::where('uid',$uid)->update(['uemail'=>$email]);
           

                $links = DB::table('friendlink')->get();
                return view('home/goods/emailyes',['title'=>'邮箱更换成功','links'=>$links]);
            

        }

        public function jingdian(Request $request)
        {

        }

        //立即购买
        public function cartinfo(Request $request)
        {   
            $uid = session('uid');
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

        public function xiaoliang($id)
        {
            $panduan = Cate::where('path','like',"%,$id,%")->pluck('cid');
            // dd($panduan);
            if($panduan == []){
                $arr_cid = $id;
                $goods = Goods::where('cid',$arr_cid)->orderBy('num', 'desc')->paginate(12);
                $good = Goods::where('cid',$arr_cid)->get();
                $jingdian = Goods::where('cid',$arr_cid)->inRandomOrder()->limit(3)->get();

            } else {
                $arr_cid = Cate::where('path','like',"%,$id,%")->pluck('cid');
                  // 为了避免没有子分类 把自己加里面
                $arr_cid[] = $id;
                $goods = Goods::whereIn('cid',$arr_cid)->orderBy('num', 'desc')->paginate(12);
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

        public function zhonghe($id)
        {
            $panduan = Cate::where('path','like',"%,$id,%")->pluck('cid');
            // dd($panduan);
            if($panduan == []){
                $arr_cid = $id;
                $goods = Goods::where('cid',$arr_cid)->inRandomOrder()->paginate(12);
                $good = Goods::where('cid',$arr_cid)->get();
                $jingdian = Goods::where('cid',$arr_cid)->inRandomOrder()->limit(3)->get();

            } else {
                $arr_cid = Cate::where('path','like',"%,$id,%")->pluck('cid');
                  // 为了避免没有子分类 把自己加里面
                $arr_cid[] = $id;
                $goods = Goods::whereIn('cid',$arr_cid)->inRandomOrder()->paginate(12);
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

        public function jiage($id)
        {
            $panduan = Cate::where('path','like',"%,$id,%")->pluck('cid');
            // dd($panduan);
            if($panduan == []){
                $arr_cid = $id;
                $goods = Goods::where('cid',$arr_cid)->orderBy('price')->paginate(12);
                $good = Goods::where('cid',$arr_cid)->get();
                $jingdian = Goods::where('cid',$arr_cid)->inRandomOrder()->limit(3)->get();

            } else {
                $arr_cid = Cate::where('path','like',"%,$id,%")->pluck('cid');
                  // 为了避免没有子分类 把自己加里面
                $arr_cid[] = $id;
                $goods = Goods::whereIn('cid',$arr_cid)->orderBy('price')->paginate(12);
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

        public function pingjia($id)
        {
            $panduan = Cate::where('path','like',"%,$id,%")->pluck('cid');
            if($panduan == []){
                $arr_cid = $id;
                $goods = Goods::where('cid',$arr_cid)->orderBy('eval', 'desc')->paginate(12);
                $good = Goods::where('cid',$arr_cid)->get();
                $jingdian = Goods::where('cid',$arr_cid)->inRandomOrder()->limit(3)->get();

            } else {
                $arr_cid = Cate::where('path','like',"%,$id,%")->pluck('cid');
                  // 为了避免没有子分类 把自己加里面
                $arr_cid[] = $id;
                $goods = Goods::whereIn('cid',$arr_cid)->orderBy('eval', 'desc')->paginate(12);
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

}
