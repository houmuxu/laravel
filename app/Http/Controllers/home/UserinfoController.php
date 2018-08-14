<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserinfoController extends Controller
{
	public function index()
	{
   	 return view('home.self.userinfo');
   	}
}
