<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuth extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();

            return redirect()->route('admin.items.index');
        }

        $notification = array(
            'message' => 'نام کاربری یا رمز عبور نادرست است.',
            'alert-type' => 'error'
        );

        return back()->with($notification);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function index(Request $request)
    {
        if ($request->user() && $request->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
