<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('theme.home', [
            'items' => Item::where('status', '1')->orderBy('created_at', 'DESC')->limit(15)->get()
        ]);
    }
}
