<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    function __construct()
    {
        // Mặc định khi đi vào admin dashboard được kích hoạt active đầu tiên .
        $this->middleware(function ($request, $next){
            session(['module_active' => 'dashboard']);

            return $next($request);
        });
    }
    //
    function show(){
        return view('admin.dashboard');
    }
}
