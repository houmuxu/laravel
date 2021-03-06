<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Eva;
use App\Model\Admin\Goods;
use App\Model\Admin\User;
use App\Model\Admin\Order;
use App\Model\Admin\Details;
use DB;

class EvalController extends Controller
{
    public function make()
    {
    	$uid = session('uid');
    	$user = User::find($uid);
    	$orders = $user->orders;
    	$usergoods = [];
    	foreach ($orders as $k => $v) {
            if($v->status == 1 || $v->status == 2){
                continue;
            }
    		foreach ($v->detailss as $kk => $vv) {
    			$usergoods[] = $vv;
    		}
    	}
                $links = DB::table('friendlink')->get();
    	return view('home/eval/make',['usergoods'=>$usergoods,'title'=>'我的未评价商品','links'=>$links]);
    }

    public function store(Request $request)
    {
    	$uid = session('uid');
    	$data = $request->input('arr');
    	$data[] = time();
    	$eval = array('uid'=>$uid,'gid'=>$data[0],'msg'=>$data[2],'rank'=>$data[1],'uptime'=>$data[3]);
    	$res = Eva::create($eval);
    	$did = $request->input('did');
    	Details::where('did',$did)->update(['status'=>1]);
        $goods = Goods::where('gid',$data[0])->first();
        $eval = $goods->eval;
        $noweval = $eval + 1;
        Goods::where('gid',$data[0])->update(['eval'=>$noweval]);
    	var_dump($res);
    }

    public function index()
    {
        $uid = session('uid');
        $evals = Eva::where('uid',$uid)->get();
        $links = DB::table('friendlink')->get();
        return view('home/eval/index',['title'=>'我的已评价商品','links'=>$links,'evals'=>$evals]);
    }


}
