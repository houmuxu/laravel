<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;
use DB;

class FirstController extends Controller
{
	public function index()
	{
		$data = Cate::getTreeCates();
		$links = DB::table('friendlink')->get();

    	return view('home/first',['data'=>$data,'links'=>$links]);
	}
}
