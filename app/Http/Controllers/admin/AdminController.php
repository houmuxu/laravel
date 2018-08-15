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
        // $aname=$res['aname'];
        // $obj =DB::table('admin')->pluck('aname')->toArray();
        // if(in_array($aname,$obj)){

        // }else{

        // }

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

    public function del(Request $request)
    {



        $res = $request->except('_token','_method')->toArray();


        $id = $res['id'];
        for ($i=0; $i < count($id); $i++) { 
           Admin::destroy($id[$i]);
        }
        echo "true";
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
    public function dologin(Request $request)
    {
        return view('admin.admin.login');
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
    \Session::flash('code', $phrase);
    // 生成图片
    header("Cache-Control: no-cache, must-revalidate");
    header("Content-Type:image/jpeg");
    $builder->output();
}




}
