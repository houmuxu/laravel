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

        $res = $request->except('gname','sum','_token','_method');

        $data = Details::where('did', $id)->update($res);
        
        //获取路由参数oid
        $abc = Details::find($id)->oid;

        if($data){
            return redirect('/admin/details/index/'.$abc);
        }else{
            return back();
        }

    }

}
