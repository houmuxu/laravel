<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\home\Coll;
use DB;
use Cookie;
use App\Model\Admin\User;
use App\Model\Admin\Goods;
use App\Model\Admin\Sales;
use App\Model\Admin\Salespic;

use Mrgoon\AliSms\AliSms;


class CollController extends Controller
{
    public function store(Request $request)
    {   
        $uid = session('uid');
        $arr = $request->input('arr');
        $arr[2] = $uid;
        $status = $arr[1];

        // 如果没值就存入
        if($status == 1){
             $data = array('gid'=>$arr[0],'uid'=>$uid,'status'=>$arr[1]);
            $res = Coll::create($data);
        }
        // 有值就删除
        if($status == 0){
           $coll = Coll::where(function($query) use($arr){
            $query->where('uid',$arr[2]);
            $query->where('gid',$arr[0]);
        })->first();
           $res = Coll::destroy($coll->id);
           echo $res;
        }
    }

    public function index()
    {
        $uid = session('uid');
        $user = User::where('uid',$uid)->first();
        $coll = $user->colls;
        // 商品
        $goods = [];
        foreach ($coll as $k => $v) {
            $goods[] = Goods::where('gid',$v->gid)->first();
        }
        // 商品结束
        // 好评率
        $haopinglv = [];
        foreach($goods as $k=>$v){
             $evals = $v->evals;
                $all = 0; $hao = 0;
                foreach ($evals as $k => $v) {
                    $all += 1;
                    if($v->rank == 1){
                        $hao += 1;
                    }

                }
                if($all != 0){
                    $haopinglv[] = $hao/$all*100;
                } else {
                    $haopinglv[] = 0;
                    
                }
        }
        // 好评率结束

        $links = DB::table('friendlink')->get();
        return view('home/coll/index',['title'=>'我的收藏','links'=>$links,'goods'=>$goods,'haopinglv'=>$haopinglv]);
    }

    public function telindex() //我的小窝手机号页面
    {
        $links = DB::table('friendlink')->get();

        return view('home/coll/tel',['title'=>'换绑手机号','links'=>$links]);
    }



    //  我的足迹
    public function zuji()
    {
        //  通过Cookie得到uid和商品gid
        $arr = [];
        $uid = Cookie::get('uid');
        $gid = Cookie::get('gid');
        $uptime = Cookie::get('uptime');
        $arr['uid'] = $uid;
        $arr['gid'] = $gid;
        $arr['uptime'] = $uptime;

        DB::table('footprint')->insert($arr);

        $links = DB::table('friendlink')->get();

        //根据gid获取商品信息
        $res = DB::table('footprint')->pluck('gid');
        
        $arr = [];
        $brr = [];
        foreach($res as $k=>$v){
            if($v >=30){
                $arr[] += $v; 
            }else{
                $brr[] += $v;
            }
        } 
     
        $goods = Goods::find($arr);
 
        $sales = Sales::find($brr);
        
        return view('home.coll.zuji',['goods'=>$goods,'title'=>'我的足迹','links'=>$links,'sales'=>$sales]);
    }

    public function oldcode(Request $request)
    {
        $tel =$request->input('tel');
        $code = rand(1111,9999);
        session(['telcode'=>$code]);
        session(['newtel'=>$tel]);
        var_dump(session('telcode'));
        
        $aliSms = new AliSms();
        $response = $aliSms->sendSms($tel, 'SMS_142070526', ['code'=>$code]);
        var_dump($response); 
    }

    public function newcode(Request $request)
    {
       $code = $request->input('code');
       $oldcode = session('telcode');
       $newtel = session('newtel');
       $uid = session('uid');
       if($code == $oldcode){
            $res = User::where('uid',$uid)->update(['utel'=>$newtel]);
            if($res){
                echo 1;
            }
       }
    }

}
