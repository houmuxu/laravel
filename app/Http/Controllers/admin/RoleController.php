<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
use DB;
use App\Model\Admin\Admin;

class RoleController extends Controller
{
    
    public function index()
    {
    	$res = Role::paginate(10);

    	return view('admin/role/index',['res'=>$res]);
    }

    public function create()
    {
    	return view('admin/role/add');
    }

    public function store(Request $request)
    {
    	$req = $request->except('_token');
    	
    	$res = Role::create($req);
    	if($res){
                return redirect('/admin/role/index')->with('success','角色添加成功!');
                
            } else {
            	 return back()->with('error','角色添加失败! 返回首页请点击');
            }
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $yixuan = $role->permissions->pluck('id');
        $xuan = $yixuan->toArray();
        $per = Permission::all();
        return view('admin/role/edit',['role'=>$role,'per'=>$per,'xuan'=>$xuan]);
    }

    public function update(Request $request, $id)
    {
        DB::table('role_per')->where('role_id',$id)->delete();
        $per = $request->input('per');
        $arr = [];
        foreach ($per as $k => $v) {
            $a = [];
            $a['role_id'] = $id;
            $a['per_id'] = $v;
            $arr[] = $a;
        }
        $res = DB::table('role_per')->insert($arr);
        echo $res;
    }

    public function del($id)
    {
        $res = Role::destroy($id);
        echo $res;
    }

    public function houedit(Request $request,$id)
    {

        $role = Role::all();
        $admin = Admin::find($id);
        $xuan = $admin->roles->pluck('id')->toArray();
        
        return view('admin/role/houedit',['admin'=>$admin,'role'=>$role,'xuan'=>$xuan]);
    }

    public function houupdate(Request $request, $id)
    {
        
        DB::table('role_user')->where('user_id',$id)->delete();
        $role = $request->input('role');
        $arr = [];
        foreach ($role as $k => $v) {
            $a = [];
            $a['user_id'] = $id;
            $a['role_id'] = $v;
            $arr[] = $a;
        }
        $res = DB::table('role_user')->insert($arr);
        echo $res;

    }
}
