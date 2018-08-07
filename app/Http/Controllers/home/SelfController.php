<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelfController extends Controller
{
    public function index()
    {
    	return view('home.self.index');
    }
}
