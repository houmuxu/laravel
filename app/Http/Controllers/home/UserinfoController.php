<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use Hash;

class UserinfoController extends Controller
{
	//用户详情
	public function infoindex()
	{
   		return view('home.self.userinfo');
   	}


   	//详情修改
   	public function infoupdate(Request $request)
   	{
   		$res = $request->except('_token','_method');
   		$user=session('uname');
   		$uid=session('uid');
   		$res['uname']=$user;
   		$data =User::where('uid',$uid)->update($res);
   		return redirect('/home/self/userinfo');
   	}


   	//用户安全
   	public function safetyindex()
   	{
   		return view('home.self.usersafety');
   	}
   	//密码
   	public function userupwd()
   	{
   		return view('home.self.userupwd');
   	}
   	//修改密码
   	public function upwdupdate(Request $request)
   	{
         $aid=session('uid');
         $res =User::where('uid',$aid)->first();
   		$pass = $request->input('oldupwd');
         dd($pass);
        if (!Hash::check($pass, $res->upwd)) {
            return back()->with('error','原始密码错误');
        }
   	}
   	//手机
   	public function userutel()
   	{
   		return view('home.self.userutel');
   	}
   	//修改手机
   	public function utelupdate()
   	{
   		echo '1';
   	}


}
