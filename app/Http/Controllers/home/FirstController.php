<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirstController extends Controller
{
	public function index()
	{
    	return view('home/first');
	}
}
