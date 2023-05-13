<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //Finaliza la sesión y redirecciona al usuario al login
    public function store()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
