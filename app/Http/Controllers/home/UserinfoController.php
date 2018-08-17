<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use Hash;
use Ucpaas;
use DB;
class UserinfoController extends Controller
{
	//用户详情
	public function infoindex()
	{
      $links = DB::table('friendlink')->get();
   		return view('home.self.userinfo',['title'=>'个人信息','links'=>$links]);
   	}


   	//详情修改
   	public function infoupdate(Request $request)
   	{
   		$res = $request->except('_token','_method');
   		$user=session('uname');
   		$uid=session('uid');
   		$res['uname']=$user;
         //上传图片
         if($request->hasFile('upic')){

          //  名字
          $name = date('Ymd',time()).str_random(6);

          //  后缀
          $suffix = $request->file('upic')->getClientOriginalExtension();

          //  移动
          $move = $request->file('upic')->move('./uploads/userpic/',$name.'.'.$suffix);

          $res['upic'] = '/uploads/userpic/'.$name.'.'.$suffix;

                   
            }



   		$data =User::where('uid',$uid)->update($res);
   		return redirect('/home/self/userinfo');

   	}



   	//用户安全
   	public function safetyindex()
   	{
      $links = DB::table('friendlink')->get(); 
   		return view('home.self.usersafety',['title'=>'安全设置','links'=>$links]);
   	}
   	//密码
   	public function userupwd()
   	{
      $links = DB::table('friendlink')->get();
   		return view('home.self.userupwd',['title'=>'修改密码','links'=>$links]);
   	}
   	//修改密码
   	public function upwdupdate(Request $request)
   	{
         $uid = session('uid');
         $us = User::find($uid);
         $upass = $us->upwd;
         $pass = $request->input('oldupwd');
         $pa =  Hash::make($request->input('upwd'));
         $pb = $request->input('reupwd');

         if(!Hash::check($pass, $upass)){
            return back()->with('error','原始密码错误');
         }
         if(!Hash::check($pb, $pa)){
            return back()->with('error','两次密码不一致');
         }

         $passa=[];
         $passa['upwd'] = $pa;
         $data=User::where('uid',$uid)->update($passa);
         return redirect('/home/self/userinfo');
   	}
   	//手机
   	public function userutel()
   	{
      $links = DB::table('friendlink')->get();
   		return view('home.self.userutel',['title'=>'换绑手机','links'=>$links]);
   	}
      //换绑手机验证码
       public function rsendcode(Request $request)
    {
        

        $options['accountsid']='fd24829d8bfcbd80834aca0aef04a05e';
        $options['token']='316b7e37616ca8dff338b0d262d0ad00';
        $ucpass = new Ucpaas($options);

        //开发者账号信息查询默认为json或xml
        $ucpass->getDevinfo('xml');
        $code = rand(1111,9999);
        $toNumber = $request->post('number');

         session(['code'=>$code]);
         //此处测试多加了一个a
        $appId = "a9776d6202bb14ce49d26885fb13a84ac";
        $templateId = "349335";
        $param=$code;
        $ucpass->templateSMS($appId,$toNumber,$templateId,$param);
        echo $code;
    }


    public function rcheckcode(Request $request)
    {
        $code = $request->get('code');

        if(session('code') == $code){

            echo 1;
        } else {

            echo 0;
        }
        // echo $code;
    }
   	//修改手机
   	public function utelupdate(Request $request)
   	{
   		 $res = $request->except('_token','_method','code');
         $user=session('uname');
         $uid=session('uid');
         $res['uname']=$user;
         $data =User::where('uid',$uid)->update($res);
         return redirect('/home/self/userinfo');
           

           
   	}


}
