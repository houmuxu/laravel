<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Orders;
use App\Model\Admin\Details;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodspic;

class DetailsController extends Controller
{
    public function show(Request $req,$oid)
    {

    	$res = Details::orderBy('did','asc')->where('oid',$oid)->get();
        
        $status = \DB::table('orders')->where('oid',$oid)->value('status');

    	return view('admin/orders/details',['res'=>$res,'status'=>$status]);

    }

    public function edit($id)
    {
        $res = Details::where('did',$id)->first();

        return view('admin/orders/det_edit',['res'=>$res]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $res = $request->except('gname','sum','_token','_method');

        $data = Details::where('did', $id)->update($res);
        
        //获取路由参数oid
        $abc = Details::find($id)->oid;

                        //更改orders表中的总价钱
                        $all = Details::where('oid',$abc)->get();
                        // dd($all);
                        $sum = 0;
                        foreach($all as $k=>$v){
                           $sum += $v['price']*$v['cnt'];
                        }
                        
                        Orders::where('oid',$abc)->update(['sum'=>$sum]);

        if($data){
            return redirect('/admin/details/index/'.$abc);
        }else{
            return back();
        }

    }

}
