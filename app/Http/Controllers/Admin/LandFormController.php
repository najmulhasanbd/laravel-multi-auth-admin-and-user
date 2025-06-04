<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandFormController extends Controller
{
    public function landform(){
        return view('admin.land.index');
    }

    public function landCreate(){
        return view('admin.land.add');
    }
}
