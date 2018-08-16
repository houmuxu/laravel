<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdvertajaxController extends Controller
{
    //广告单个删除
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        // echo $id;
        // 删除服务器上照片
        $res = DB::table('advert')->where('adid',$id)->first();
        
        
        $rs = unlink('.'.$res->adpic);
        
        //删除数据库信息
        if($rs){
           $data = DB::table('advert')->where('adid',$id)->delete();
        }


       echo $data;
           
    }

    //广告批量删除
    public function destroyall(Request $request)
    {
        $arr = $request->input('ids');

        foreach ($arr as $k=>$v) {
            
            $res = DB::table('advert')->where('adid',$v)->first();
            //删除文件
            $rs = unlink('.'.$res->adpic);
            if($rs){
            	//删除数据库信息
                $ls = DB::table('advert')->where('adid',$v)->delete();
            }

        }
            echo $ls;

    }


    //松鼠知单个删除
    public function zhi_del(Request $request)
    {
        $id = $request->input('id');
        // echo $id;
       
        //删除数据库信息
       $data = DB::table('zhi')->where('id',$id)->delete();
       echo $data;
        
           
    }


    //广告批量删除
    public function zhi_delall(Request $request)
    {
        $arr = $request->input('ids');
        // var_dump($arr);
        foreach ($arr as $k=>$v) {
            
                $ls = DB::table('zhi')->where('id',$v)->delete();

        }
        
        echo $ls;

    }


    //松鼠知启用状态
    public function zhi_status(Request $request, $id)
    {
        

        $all = DB::table('zhi')->get();

        

        //遍历所有数据，把状态全都改成1
        foreach ($all as $k=>$v){

            $v->status = 1;
            if($v->id == $id){$v->status = 2;}

            $aa=['author'=>$v->author,'status'=>$v->status,'addtime'=>$v->addtime,'zhi1'=>$v->zhi1,'zhi2'=>$v->zhi2,'zhi3'=>$v->zhi3,'zhi4'=>$v->zhi4];

            DB::table('zhi')->where('id',$v->id)->update($aa);
        }
        // dd($all);

        // $data = DB::table('zhi')->update($all);

        // if($data){
                return redirect('/admin/zhi')->with('success','启用成功');
        //     } else {
        //         return back()->with('error','添加失败');
        //     }


    }





}
