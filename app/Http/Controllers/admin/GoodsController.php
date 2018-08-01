<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use App\Model\Admin\Goods;
use App\Model\Admin\Cate;
use DB;

class GoodsController extends Controller
{
	public function index()
	{
        $data = Goods::orderBy('gid', 'asc')->paginate(10);
		return view('admin/goods/index',['data'=>$data]);
	}

    public function create()
    {
    	$cates = DB::select('select cid,cname,concat(path,cid) cpath from cate order by cpath');
    	return view('admin/goods/add',['cates'=>$cates]);
    }

    public function store(Request $request)
    {	
    	$res = $request->except('_token','gpic');
        $res['uptime'] = time();

    	try{
    		$data = Goods::create($res);
    		$id = $data->gid;
    		$goods = Goods::find($id);
	    	if($request->hasFile('gpic')){
	    	 	foreach($request->file('gpic') as $k => $v){
	    	 		//名字
	    	 		$name =  date('Ymd',time()).str_random(6);
	    	 		//后缀
	           		$suffix = $v->getClientOriginalExtension();
	           		//移动
	           		$v->move(Config::get('webconfig.uploadgoods'),$name.'.'.$suffix);
	           		//一对多添加到商品关联图片
	           		$goods->goodspics()->createMany([
	           			['gpic' => '/uploads/goods/'.$name.'.'.$suffix]
    				]);
	    	 	}
	    	 }
    		if($data){
    			// return redirect('/admin/goods');
                return back();
    		}
    	}catch(\Exception $e){
    		return back();
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
        $cates = DB::select('select cid,cname,concat(path,cid) cpath from cate order by cpath');
        $data = Goods::find($id);
        return view('admin/goods/edit',['data'=>$data,'gid'=>$id,'cates'=>$cates]);
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
        $res = $request->except('_method','gpic','_token');
        $res['uptime'] = time();

        try{
            $data = Goods::where('gid',$id)->update($res);
            // $id = $data->gid;
            $goods = Goods::find($id);
            if($request->hasFile('gpic')){
                foreach($request->file('gpic') as $k => $v){
                    //名字
                    $name =  date('Ymd',time()).str_random(6);
                    //后缀
                    $suffix = $v->getClientOriginalExtension();
                    //移动
                    $v->move(Config::get('webconfig.uploadgoods'),$name.'.'.$suffix);
                    //一对多添加到商品关联图片
                    $goods->goodspics()->createMany([
                        ['gpic' => '/uploads/goods/'.$name.'.'.$suffix]
                    ]);
                }
             }
            if($data){
                return redirect('/admin/goods');
            }
        }catch(\Exception $e){
            return back();
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
 		$res = Goods::destroy($id);
        if($res){
            return redirect('/admin/goods');
        }
           return back(); 
    }
}
