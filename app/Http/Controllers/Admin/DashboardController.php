<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /** 
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

}
