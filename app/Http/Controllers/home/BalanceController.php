<?php

namespace App\Http\Controllers\home; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// use App\Model\Admin\Orders;

class BalanceController extends Controller 
{
    public function index()
    {
       $uid = 1;
    	$data = DB::table('address')->orderBy('id','asc')->get();
        $res = DB::table('cartinfo')->where('uid',$uid)->get();
        $links = DB::table('friendlink')->get();
              
    	return view('home/balance/balance',['data'=>$data,'res'=>$res,'links'=>$links,'title'=>'结算页面']);
    }

    public function create()
    {
    	return view('home/balance/create');
    }

    public function store(Request $request)
    {
    	// dd($_POST);
    	//自定义uid
    	session(['uid'=>'1']);

    	$data = $request->except('_token');
    	//城市三级联动拼接
    	$data['addr'] = $data['area1'].' '.$data['area2'].' '.$data['area3'].' '.$data['addr'];
    	array_splice($data,2,3);
    	$data['uid'] = session('uid');

    	$res = DB::table('address')->insert($data);

    	if($res){
    		return redirect('/home/balance');
    	} else{
    		return back();
    	}

    }

    public function edit($id)
    {
    	// echo $id;
    	$res = DB::table('address')->where('id',$id)->first();
    	// dd($res);
    	return view('home/balance/edit',['res'=>$res]);
    }

    public function update(Request $request,$id)
    {
    	$data = $request->except('_token');
    	// dd($res);
    	$res = DB::table('address')->where('id',$id)->update($data);

    	if($res){
    		return redirect('/home/balance');
    	} else {
    		return back();
    	}

    }

    public function delete(Request $request) 
    {
    	$id = $request->input('id');
    	$res = DB::table('address')->where('id','=',$id)->delete();
    	return $res;
    }


    public function order(Request $request)
    {
        //接收订单信息,保存到数据库
        $arr = $request->input('arr');

        $uid = 1;
        $oname = $arr[0][0];
        $tel = $arr[0][1];
        $addr = $arr[0][2];
        $sum = $arr[0][3];
        $msg = $arr[0][4];
        $addtime = time();
        $oid = date('YmdHis').mt_rand(1000,9999);

        $data = array('uid'=>$uid,'oid'=>$oid,'oname'=>$oname,'tel'=>$tel,'addr'=>$addr,'addtime'=>$addtime,'sum'=>$sum,'msg'=>$msg,'status'=>1);
        $res = DB::table('orders')->insert($data);
        //echo $res;

        //接收订单详情信息,保存到数据库
        $arr2 = $request->input('arr2');

        foreach ($arr2 as $k=>$v){
            $arr2[$k] = ['gid'=>$arr2[$k][0],'price'=>$arr2[$k][1],'cnt'=>$arr2[$k][2]];
            $arr2[$k]['oid']=$oid;
        }
        //var_dump($arr2);

        $res2 = DB::table('details')->insert($arr2);
        //echo $res2;
        
        //是否成功插入数据库,返回1或0到页面
        if($res&&$arr2){
            return $oid;
        } else {
            echo 0;
        }


    }

    public function payok(Request $request)
    {
        $oid = $request->get('oid');
        $data = DB::table('orders')->where('oid','=',$oid)->first();
        //dd ($data);
        
        $uid = 1;
        $res = DB::table('cartinfo')->where('uid','=',$uid)->delete();

        // $aa = session('uid');
        // echo $aa;
        $links = DB::table('friendlink')->get();

        return view('home/balance/payok',['data'=>$data,'links'=>$links,'title'=>'付款成功页面']);
    }


}
