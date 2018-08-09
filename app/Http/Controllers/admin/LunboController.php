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
        $data = Lunbo::all();
        
        return view('admin/lunbo/index',['data'=>$data]);
    }

    public function create()
    {
        return view('admin/lunbo/add');
    }

 	public function store(Request $request)
    {
        $res = $request->except('file','_token');

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



 







}
