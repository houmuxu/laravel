<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\home\Coll;
use DB;
use App\Model\Admin\User;
use App\Model\Admin\Goods;

class CollController extends Controller
{
    public function store(Request $request)
    {   
        $uid = 1;
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
        $uid = 1;
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
        echo "ssss";
    }
}
