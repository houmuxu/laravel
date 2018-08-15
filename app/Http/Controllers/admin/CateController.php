<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Cate;


class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsek
     */
    public function index(Request $request)
    {
        //  获取数据
        // $cates = DB::table('cate')->paginate(10);
        $cates = Cate::select(DB::raw('*,concat(path,cid) as npath'))
            ->orderBy('npath','asc')->where(function($query) use($request){
            $cname = $request->input('cname');
            if(!empty($cname)){
                $query->where('cname','like','%'.$cname.'%');
            }
        })->paginate(10);


        //  遍历判断path路径中逗号出现的次数
        foreach($cates as $k=>$v){
             //  获取path路径中逗号出现的次数
            $len = substr_count($v->npath,',')-1;

            // 根据逗号出现的次数，给分类名称添加相应的路径信息
            $v->cname = str_repeat('&nbsp;',$len*8).$v->cname;

        }
        //  显示数据
        return view('admin/cate/index',['cates'=>$cates,'request'=>$request,'title'=>'浏览类别']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cates = Cate::orderBy('concate(path,cid)')->get();

        $cates = DB::select('select cid,cname,concat(path,cid) cpath from cate order by cpath');
        // var_dump($cates);
        // $cates = self::getCate();

        return view('admin/cate/add',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  接收数据
        $res = $request->except('_token');

        $id = $res['pid'];

        if($id == 0){
            $res['path'] = '0,';
        } else {
             // 查询父类信息
            $parent = DB::table('cate')->where('cid','=',$res['pid'])->first();

            // dump($parent);
            // 子类的path信息等于父类的path拼上父类的pid
            $res['path'] = $parent->path.$res['pid'].',';

            // var_dump($res); 
        }
        // var_dump($res);

        try{
           
            $data = DB::table('cate')->insert($res);

            if($data){

                return redirect('/admin/cate')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return redirect('/admin/cate/create')->with('error','添加失败');

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
        $res = Cate::find($id);

        // $cates = Cate::select(DB::raw('*,concat(path,pid) as npath'))
        //     ->orderBy('npath')
        //     ->get();
        $cates = DB::select('select cid,cname,concat(path,cid) npath from cate order by npath');


       /* foreach($cates as $k=>$v){
             //  获取path路径中逗号出现的次数
            $len = substr_count($v->npath,',')-1;

            // 根据逗号出现的次数，给分类名称添加相应的路径信息
            $v->cname = str_repeat('&nbsp;',$len*8).$v->cname;

        }*/
        
        return view('admin/cate/edit',['res'=>$res,'cates'=>$cates]);
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
        $data = $request->except('_token','_method');

        // var_dump($data);

        $res = DB::table('cate')->where('cid','=',$id)->update($data);

        if($res){
            return redirect('/admin/cate')->with('success','修改成功');
        } else {
            return back()->with('error','修改失败');
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
        //  根据id 查找下面有没有其他的类别
        $res = Cate::where('cid',$id)->first();
         // dd($res->cid);

        $path = $res->path.$res->cid.',';  //  0,1,3,
        // dd($path);

        //  如果找到有其他的类别  删除
        $data = Cate::where('path','like','%'.$path.'%')->delete();

        try{
            //  还要根据id删除自己
            $rs = Cate::where('cid',$id)->delete();
            // dd($rs);
            if($rs){
                return redirect('/admin/cate')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }
    }

     // 查询所有的分类信息
    public static function getCate()
    {
        //  查询所有的分类信息
        $res = DB::table('cate')
            ->select(DB::raw('*,concat(path,",",cid) as npath'))
            ->orderBy('npath','asc')
            ->get();

        // echo '<pre>';
        // var_dump($res);

        //  遍历判断path路径中逗号出现的次数
        foreach($res as $k=>$v){
             //  获取path路径中逗号出现的次数
            $len = substr_count($v->npath,',');

            // 根据逗号出现的次数，给分类名称添加相应的路径信息
            $v->cname = str_repeat('&nbsp;',$len).$v->cname;
        }
        return $res;

    }
}
