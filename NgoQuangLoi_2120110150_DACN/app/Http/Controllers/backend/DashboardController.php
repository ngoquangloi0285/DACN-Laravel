<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Ho_Chi_Minh");

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('backend.dashboard.index');
    }
}
