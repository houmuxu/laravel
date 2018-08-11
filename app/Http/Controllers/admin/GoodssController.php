<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodspic;

class GoodssController extends Controller
{
    public function status(Request $request)
    {
        $id = $request->input('id');
        $status = Goods::where('gid',$id)->pluck('state');
        $statuss = $status[0];
        if($statuss == 1){
            $statuss = 2;
        } else {
            $statuss = 1;
        }
        $res = Goods::where('gid',$id)->update(['state'=>$statuss]);
        echo $statuss;
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        // 删除服务器上照片
        $res = Goodspic::where('gid',$id)->get();
        foreach ($res as $k => $v) {
            $rs = unlink('.'.$v->gpic);
        }

        if($rs){
            //删除图片关联表
            $gs = Goods::find($id);

            $data = $gs->goodspics()->delete();

        }

        if($data){
            //删除主表
            $re = Goods::destroy($id);

        }

       echo $re;
           
    }
}
