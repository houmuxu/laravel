<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Model\Admin\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //共有多有条数据
        $set=DB::table('users')->pluck('uid');
        $numm=count($set);
        // 条件查询
        $res = DB::table('users')->orderBy('uid','asc')
            ->where(function($query) use($request){
            //检测关键字
            $uname = $request->input('uname');
            //如果用户名不为空
            if(isset($uname)) {
                $query->where('uname','like','%'.$uname.'%');
            }
         })
        ->paginate($request->input('num', 5));

        return view('admin.admin.user-list',[
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
         return view('admin.admin.user-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $res = $request->except('_token','_method','reupwd');
        $res['utime']= time();

        $uname=$res['uname'];
        $rname=DB::select('select uname from users where uname = ?',[$uname]);
        if($rname){
            $data = [
                'info' => 'error',
                'message' => '用户名已存在',
                'url' => '/admin/user/create',

            ];
            return view('errors.message',["data"=>$data]);
        }

             $data =  DB::table("users")->insert($res);
             if($data){
                $data = [
                'info' => 'success',
                'message' => '添加成功',
                'url' => '/admin/user',

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
        $res = User::find($id);

        return view('admin.admin.user-edit',['res'=>$res]);

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
        $res = $request->except('_token','_method','profile','reupwd');

        $uname=$res['uname'];
        $rname=DB::select('select uname from users where uname = ?',[$uname]);
        if($rname){
            $data = [
                'info' => 'error',
                'message' => '用户名已存在',
                'url' => '/admin/user',
            ];
            return view('errors.message',["data"=>$data]);
        }
        $data = DB::table("users")->where('uid', $id)->update($res);
        if($res){
            $data = [
            'info' => 'success',
            'message' => '修改成功',
            'url' => '/admin/user',
            ];
            return view('errors.dell',["data"=>$data]);

        }else{
            $data = [
            'info' => 'error',
            'message' => '修改失败',
            'url' => '/admin/user',
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
        $res = User::destroy($id);

        if($res){
            $data = [
            'info' => 'success',
            'message' => '删除成功',
            'url' => '/admin/user',
            ];
            return view('errors.dell',["data"=>$data]);


        }else{
            $data = [
            'info' => 'error',
            'message' => '删除失败',
            'url' => '/admin/user',
            ];
            return view('errors.dell',["data"=>$data]);
    }
}
}