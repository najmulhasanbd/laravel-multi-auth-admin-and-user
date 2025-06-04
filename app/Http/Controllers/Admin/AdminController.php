<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\District;
use \App\Models\Thana;
use \App\Models\Land;

class AdminController extends Controller
{
    public function dashboard(){
        $districts=District::count();
        $thanas=Thana::count();
        $lands=Land::count();
         return view('admin.dashboard',compact('districts','thanas','lands'));
    }
}
