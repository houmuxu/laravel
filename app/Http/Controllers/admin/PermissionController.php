<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;

class PermissionController extends Controller
{
     public function index()
    {
    	$res = Permission::paginate(10);
    	return view('admin/permission/index',['res'=>$res]);
    }

    public function create()
    {
    	return view('admin/permission/add');
    }

    public function store(Request $request)
    {
    	$res = $request->except('_token');
    	$qq = Permission::create($res);
    	
    	if($qq){
                return redirect('/admin/per/index')->with('success','角色添加成功!');
                
            } else {
            	 return back()->with('error','角色添加失败! 返回首页请点击');
        }
    }

    public function edit($id)
    {
        $res = Permission::find($id);
        return view('admin/permission/edit',['res'=>$res]);
    }

    public function update(Request $request, $id) 
    {
        $arr = $request->input('per');
        $res = array();
        $res['per_name'] = $arr[0];
        $res['url'] = $arr[1];
        $ju = Permission::where('id',$id)->update($res);
        echo $ju;
    }

    public function del($id)
    {
        $res = Permission::destroy($id);
        echo $res;
    }
}
