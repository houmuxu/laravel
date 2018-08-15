<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FriendlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('friendlink')->where(function($query) use($request){
            $fname = $request->input('fname');
            if(!empty($fname)){
                $query->where('fname','like','%'.$fname.'%');
            }
        })->paginate(10);
        
        return view('admin.friendlink.index',['data'=>$data,'request'=>$request,'title'=>'链接列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.friendlink.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  接受数据
        $res = $request->except('_token');

        try{
            $data = DB::table('friendlink')->insert($res);
            if($data){
                echo "<script>alert('添加成功');window.location.href='/admin/friendlink'</script>";
            }
        }catch(\Exception $e){
            echo "<script>alert('添加失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
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
        $res = DB::table('friendlink')->where('fid',$id)->get();
        // dd($res);
        return view('admin.friendlink.edit',['res'=>$res]);
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
        $res = $request->except('_token','_method');
        $res_fname = $res['fname'];
        $res_furl = $res['furl'];

        $rs = DB::table('friendlink')->where('fid',$id)->get();
        
        $rs_fname = $rs[0]->fname;
        $rs_furl = $rs[0]->furl;

        if(($res_fname == $rs_fname) && ($res_furl == $rs_furl)){
            return back();
        }
        
        try{
            $data = DB::table('friendlink')->where('fid',$id)->update($res);
            if($data){
                echo "<script>alert('修改成功');window.location.href='/admin/friendlink'</script>";
            }
        }catch(\Exception $e){
            echo "<script>alert('修改失败');return back();'</script>";
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
        try{
            $res = DB::table('friendlink')->where('fid',$id)->delete();

            if($res){
                echo "<script>alert('删除成功');window.location.href='/admin/friendlink'</script>";
            }
        }catch(\Exception $e){
            echo "<script>alert('删除失败');window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        }
    }

}
