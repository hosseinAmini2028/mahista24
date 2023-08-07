<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        return view('theme.home',[
            'items'=>Item::orderBy('created_at','DESC')->limit(3)->get()
        ]);
    }
}
