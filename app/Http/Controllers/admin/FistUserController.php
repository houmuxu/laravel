<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FistUserController extends Controller
{
    //首页
    public function first()  
    {
        return view('admin/first');
    }

    
}
