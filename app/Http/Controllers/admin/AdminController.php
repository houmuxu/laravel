<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use Hash;
use DB;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //首页
    public function index(Request $request)
    {
        //共有多有条数据
        $set=DB::table('admin')->pluck('aid');
        $numm=count($set);
     // 条件查询
        $res = DB::table('admin')->orderBy('aid','asc')
            ->where(function($query) use($request){
            //检测关键字
            $aname = $request->input('aname');
            //如果用户名不为空
            if(isset($aname)) {
                $query->where('aname','like','%'.$aname.'%');
            }
         })
        ->paginate($request->input('num', 5));



        return view('admin/admin/admin-list',[
            'res'=>$res,
            'request'=>$request,
            'numm'=>$numm

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.admin-add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $res = $request->except('_token','_method','repass');
         $res['atime']= time();
         $res['astatus']= '2';
         $res['apwd'] = Hash::make($request->input('apwd'));

        $aname=$res['aname'];
        $rname=DB::select('select aname from admin where aname = ?',[$aname]);
        if($rname){
            $data = [
                'info' => 'error',
                'message' => '用户名已存在',
                'url' => '/admin/admin/create',

            ];
            return view('errors.message',["data"=>$data]);
        }



             $data = Admin::insert($res);
             if($data){
                $data = [
                'info' => 'success',
                'message' => '添加成功',
                'url' => '/admin/admin',

                ];
                return view('errors.message',["data"=>$data]);
             }else{
                $data = [
                'info' => 'error',
                'message' => '添加失败',

                ];
                return view('errors.message',["data"=>$data]);
           
        }

    }

    public function add(Request $request)
    {

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

        $res = Admin::find($id);

        return view('admin.admin.admin-edit',['res'=>$res]);
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
        
        $res = $request->except('_token','_method','profile','repass');
        $res['apwd'] = Hash::make($request->input('apwd'));
 
        $data = DB::table("admin")->where('aid', $id)->update($res);
        if($res){

            $data = [
            'info' => 'success',
            'message' => '修改成功',
            'url' => '/admin/admin',
            ];
            return view('errors.dell',["data"=>$data]);

        }else{
            $data = [
            'info' => 'error',
            'message' => '修改失败',
            'url' => '/admin/admin',
            ];
            return view('errors.dell',["data"=>$data]);
        }

    }
    public function infoedit(Request $request, $id)
    {
        
       $res = Admin::find($id);

        return view('admin.admin.admininfo',['res'=>$res]);

    }

    public function infoupdate(Request $request, $id)
    {
        
        $res = $request->except('_token','_method','profile','repass');
        $res['apwd'] = Hash::make($request->input('apwd'));
 
        $data = DB::table("admin")->where('aid', $id)->update($res);
        if($res){

            $data = [
            'info' => 'success',
            'message' => '修改成功',
            'url' => '/admin/admin',
            ];
            return view('errors.infodell',["data"=>$data]);

        }else{
            $data = [
            'info' => 'error',
            'message' => '修改失败',
            'url' => '/admin/admin',
            ];
            return view('errors.infodell',["data"=>$data]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $res = Admin::destroy($id);

        if($res){

            $data = [
            'info' => 'success',
            'message' => '成功',
            'url' => '/admin/admin',
            ];
            return view('errors.dell',["data"=>$data]);

        }else{
            $data = [
            'info' => 'error',
            'message' => '失败',
            'url' => '/admin/admin',
            ];
            return view('errors.dell',["data"=>$data]);
        }

    }

   public function destroyall(Request $request)
    {
        $arr = $request->input('ids');

        foreach ($arr as $k=>$v) {
            
            $res = DB::table('admin')->where('aid',$v)->first();
 

                //删除数据库信息
                 DB::table('admin')->where('aid',$v)->delete();


        }
           var_dump($arr);

    }



    //管理员开启状态
    public function start($id,$status=1)
    {
        $res['astatus'] = $status;            
        $data = DB::table('admin')->where('aid',$id)->update($res);
        return redirect('/admin/admin');
    }

    public function close($id,$status=2)
    {
        $res['astatus'] = $status;            
        $data = DB::table('admin')->where('aid',$id)->update($res);
        return redirect('/admin/admin');
    }


    //登录
    public function login()
    {
        return view('admin.admin.login');
    }
    //验证
    public function dologin(Request $request)
    {
        $aname = $request->input('aname');


        $res =Admin::where('aname',$aname)->first();


        if(!$res){

            return back()->with('error','用户名或密码错误');
        }

        //判断密码
        $pass = $request->input('apwd');


        if (!Hash::check($pass, $res->apwd)) {
            
            return back()->with('error','密码错误');

        }

        //判断验证码
        $code = $request->input('code');

       /* dump($code);
        dump(session('code'));*/

        if($code != session('code')){

            return back()->with('error','验证码错误');
        }
        //判定状态
        $astatus = Admin::where('aname',$aname)->get();




        foreach($astatus as $values) {
             $status=$values->astatus;
             $auth=$values->astatus;
        };
        
        if($status=='2'){
            return back()->with('error','账号未启用');
        }

        //存储session信息  给中间件使用
        session(['aname'=>$res->aname]);

        session(['aid'=>$res->aid]);

        return redirect('/admin/first');
    }  
    

    //验证码
    public function captcha()
{
    $phrase = new PhraseBuilder;
    // 设置验证码位数
    $code = $phrase->build(3);
    // 生成验证码图片的Builder对象，配置相应属性
    $builder = new CaptchaBuilder($code, $phrase);
    // 设置背景颜色
    $builder->setBackgroundColor(123, 203, 255);
    $builder->setMaxAngle(25);
    $builder->setMaxBehindLines(0);
    $builder->setMaxFrontLines(0);
    // 可以设置图片宽高及字体
    $builder->build($width = 90, $height = 35, $font = null);
    // 获取验证码的内容
    $phrase = $builder->getPhrase();
    // 把内容存入session
    //Session::flash('code', $phrase);
    session(['code'=>$phrase]);
    // 生成图片
    header("Cache-Control: no-cache, must-revalidate");
    header("Content-Type:image/jpeg");
    $builder->output();
}
public function logout()
{
    //清空session
    session(['aname'=>null]);
    session(['aid'=>null]);
    return redirect('/admin/login');
}






}
