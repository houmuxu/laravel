<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Orders;

class OrdersajaxController extends Controller
{
     public function send(Request $request)
    {
        $id = $request->input('id');
        $data =Orders::where('oid', $id)->update(['status'=>2]);
        return $data;      
    }
}
