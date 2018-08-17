<?php
namespace App\Http\Controllers\home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\User;
use Ucpaas;
use DB;
use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.user.telzhuce');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = $request->except('_token','_method','reupwd','code');
        $res['utime']= time();
        $res['upic']= '/home/images/getAvatar.do.jpg';
        $res['uname']= date('Ymd',time()).rand(11111,99999);
        $res['upwd'] = Hash::make($request->input('upwd'));
        User::insert($res);

        $uname=($res['uname']);
        $rs =User::where('uname',$uname)->first();
        $data=[];
        $arr=['uname','utel','uemail'];
        foreach ($arr as $key => $v) {
            if(User::where($v,$uname)->first()){$data['user']=User::where($v,$uname)->first();
            }else{$data[]=false;}  
        };
        //存储session信息  给中间件使用
        session(['uname'=>$data['user']->uname]);

        session(['uid'=>$data['user']->uid]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function sendcode(Request $request)
    {

        //初始化必填
        $options['accountsid']='fd24829d8bfcbd80834aca0aef04a05e';
        $options['token']='316b7e37616ca8dff338b0d262d0ad00';

        //初始化 $options必填
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


    public function checkcode(Request $request)
    {
        $code = $request->get('code');

        if(session('code') == $code){

            echo 1;
        } else {

            echo 0;
        }
        // echo $code;
    }

    public function login()
    {
        return view('home.user.login');
    }

    public function dologin(Request $request)
    {
        $uname = $request->input('uname');

        $data=[];
        $arr=['uname','utel','uemail'];
        foreach ($arr as $key => $v) {
            if(User::where($v,$uname)->first()){$data['user']=User::where($v,$uname)->first();
            }else{$data[]=false;}
            
        };
        
        
        
        

        if(empty($data['user'])){

            return back()->with('error','用户名或密码错误');
        }

        //判断密码
        $pass = $request->input('upwd');
        
        if (!Hash::check($pass, $data['user']->upwd)) {    
            return back()->with('error','密码错误');
        }

        //存储session信息  给中间件使用
        session(['uname'=>$data['user']->uname]);

        session(['uid'=>$data['user']->uid]);

        return redirect('/');
    }  
        
    

    public function logout()
{
    //清空session
    session(['uname'=>null]);
    session(['uid'=>null]);
    return redirect('/');
}

}
