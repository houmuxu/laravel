<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Cate;

use Cache;

use DB;


class FirstController extends Controller
{
	public function index()
	{
		$data = Cate::getTreeCates();

<<<<<<< HEAD


		Cache::forever('data',$data);
		$links = DB::table('friendlink')->get();



		$arr = [];
		foreach ($data as $value) {
			$arr[] = $value->sub[0]->sub;
		}
	
    	return view('home/first',['data'=>$data,'arr'=>$arr,'title'=>'首页-三只松鼠旗舰店']);
=======
		Cache::forever('data',$data);
		$links = DB::table('friendlink')->get();

		
    	return view('home/first',['data'=>$data,'title'=>'首页-三只松鼠旗舰店','links'=>$links]);


>>>>>>> origin/zhang

	}


}
