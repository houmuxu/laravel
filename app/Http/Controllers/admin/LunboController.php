<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Lunbo;
use Config;

class LunboController extends Controller
{
    public function index()
    {
        $data = Lunbo::paginate(10);
        $zong = count($data);
        
        return view('admin/lunbo/index',['data'=>$data,'zong'=>$zong]);
    }

    public function create()
    {
        return view('admin/lunbo/add');
    }

    public function store(Request $request)
    {
        $res = $request->except('pic','_token');

        $pic = $request->file('pic');
        //名字
        $name =  date('Ymd',time()).str_random(6);
        //后缀
        $suffix = $pic->getClientOriginalExtension();
        //移动
        $pic->move(Config::get('webconfig.uploadlunbo'),$name.'.'.$suffix);
        //存入数组
        $res['pic'] = '/uploads/lunbo/'.$name.'.'.$suffix;
        $res['uptime'] = time();

        try{
            $ju = Lunbo::create($res);
            if($ju){
                return redirect('/admin/lunbo/index')->with('success','添加轮播图成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加轮播图失败');
        }
       

    }

    public function status(Request $request)
    {
        $id = $request->input('id');
        $status = Lunbo::where('id',$id)->pluck('status');
        $statuss = $status[0];
        if($statuss == 1){
            $statuss = 2;
        } else {
            $statuss = 1;
        }
        $res = Lunbo::where('id',$id)->update(['status'=>$statuss]);
        echo $statuss;
    }

    public function edit($id)
    {
        $data = Lunbo::where('id',$id)->first();
        return view('admin/lunbo/edit',['data'=>$data]);
    }

    public function update(Request $request,$id)
    {
        $res = $request->except('pic','_token');
        $res['uptime'] = time();
        if($request->hasFile('pic')){
           $pic = $request->file('pic');
            //名字
            $name =  date('Ymd',time()).str_random(6);
            //后缀
            $suffix = $pic->getClientOriginalExtension();
            //移动
            $pic->move(Config::get('webconfig.uploadlunbo'),$name.'.'.$suffix);
            //存入数组
            $res['pic'] = '/uploads/lunbo/'.$name.'.'.$suffix;

        }
            try{
                $ju = Lunbo::where('id',$id)->update($res);
                if($ju){
                return redirect('/admin/lunbo/index')->with('success','轮播图修改成功!');

                }
            }catch(\Exception $e){
                return back()->with('error','轮播图修改失败! 返回首页请点击');
                
            }
  
    }

    public function delete(Request $request)
    {
        $id = $request->input('ids');
        $res = Lunbo::find($id);
        $rs = unlink('.'.$res->pic);
        if($rs){
            $ls = Lunbo::destroy($id);
        }
        echo $ls;
    }

    public function ajaxdel(Request $request)
    {
        $arr = $request->input('ids');
        foreach ($arr as $v) {
            $res = Lunbo::find($v);
            $rs = unlink('.'.$res->pic);
            if($rs){
                $ls = Lunbo::destroy($v);
            }
        }
            echo $ls;

    }
}
