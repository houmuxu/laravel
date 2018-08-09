<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;
use Cache;

class FirstController extends Controller
{
	public function index()
	{
		$data = Cate::getTreeCates();
		

		$arr = [];
		foreach ($data as $value) {
			$arr[] = $value->sub[0]->sub;
		}
	
    	return view('home/first',['data'=>$data,'arr'=>$arr,'title'=>'首页-三只松鼠旗舰店']);

	}











	public function indexs()
	{
		$data = Cate::getTreeCates();
		// Cache::put('data',$data,100);
		
		
    	return view('home/first',['data'=>$data,'title'=>'首页-三只松鼠旗舰店']);
	}
}
