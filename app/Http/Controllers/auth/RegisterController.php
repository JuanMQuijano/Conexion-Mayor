<?php

namespace App\Http\Controllers\auth;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //Convierte el username a una URl
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => ['required', 'min:5'],
            'username' => ['required', 'unique:users,username', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('mensaje', 'Cuenta Creada');
    }
}
