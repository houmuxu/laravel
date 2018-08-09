<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
<<<<<<< HEAD

class BalanceController extends Controller
{
    public function index()
    {
    	$data = DB::table('address')->orderBy('id','asc')->get();
    	// dd($data);
    	return view('home/balance/balance',['data'=>$data]);
=======
use Session;

class BalanceController extends Controller
{
    public function index(Request $request)
    {
        $links = DB::table('friendlink')->get();
        $data = DB::table('address')->orderBy('id','asc')->get();
    	// dd($data);
    	return view('home/balance/balance',['data'=>$data,'links'=>$links]);
>>>>>>> origin/zhang
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
<<<<<<< HEAD
=======

>>>>>>> origin/zhang
}
