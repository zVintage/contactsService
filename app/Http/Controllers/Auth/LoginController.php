<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:25'
        ]);

        if(!auth()->attempt($request->only('email', 'password')))
        {
            return back()->with('status', 'Invalid Login details');
        }

        return redirect()->route('dashboard.index');
    }
}
