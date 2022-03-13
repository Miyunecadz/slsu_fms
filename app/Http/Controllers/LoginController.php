<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authorizeTeacher(Request $request)
    {
        $request->validate([
            'password' => 'required'
        ]);

        if($request->password !== env('MASTER_KEY'))
        {
            return back()->withErrors(['password' => 'Invalid credential']);
        }

        session(['isTeacher' => true]);

        return redirect(route('dashboard'));
    }

    public function logoutTeacher()
    {
        session()->forget('isTeacher');
        return redirect(route('dashboard'));
    }
}
