<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //       
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return back()->with('mensaje_error', 'Revise los datos ingresados');
        };

        return redirect()->route('dashboard');
    }
}
