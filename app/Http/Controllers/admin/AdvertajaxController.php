<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdvertajaxController extends Controller
{
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
}
