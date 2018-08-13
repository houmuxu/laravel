<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\home\Coll;

class CollController extends Controller
{
    public function store(Request $request)
    {   
        $uid = 1;
        $arr = $request->input('arr');
        $arr[2] = $uid;
        $status = $arr[1];

        // 如果没值就存入
        if($status == 1){
             $data = array('gid'=>$arr[0],'uid'=>$uid,'status'=>$arr[1]);
            $res = Coll::create($data);
        }
        // 有值就删除
        if($status == 0){
           $coll = Coll::where(function($query) use($arr){
            $query->where('uid',$arr[2]);
            $query->where('gid',$arr[0]);
        })->first();
           $res = Coll::destroy($coll->id);
           echo $res;
        }
    }
}
