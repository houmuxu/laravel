<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;

class FirstController extends Controller
{
	public function index()
	{
		$data = Cate::getTreeCates();
		
		
    	return view('home/first',['data'=>$data]);
	}
}
