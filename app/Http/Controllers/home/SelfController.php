<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SelfController extends Controller
{
    public function index()
    {
        $links = DB::table('friendlink')->get();
    	return view('home.self.index',['links'=>$links,'title'=>'个人中心首页']);

    }
}
