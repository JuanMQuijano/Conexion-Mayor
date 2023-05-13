<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    //Muestra el perfil del usuario, seleccionando sus publicaciones
    public function index(User $user)
    {
        return view('profile.index', [
            'user' => $user,
            'posts' => $user->posts
        ]);
    }

    //Valida su el usuaroi autenticado es igual al id del perfil, y renderiza la vista de update
    public function update(User $user)
    {
        if ($user->id !== auth()->user()->id) {
            return redirect()->route('perfil', auth()->user()->username);
        }

        return view('profile.update', [
            'user' => $user
        ]);
    }

    //Almacena en el servidor el request enviado por el usuario
    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => 'required|unique:users,username,' . auth()->user()->id . '|min:3|max:20|not_in:twitter,editar,editar-perfil',
            'name' => 'required',
        ]);

        //Guardar Cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->name = $request->name ?? auth()->user()->name;
        $usuario->username = $request->username;

        if ($request->password_actual || $request->password) {
            $this->validate($request, [
                'password' => 'required|confirmed',
            ]);

            if (Hash::check($request->password_actual, auth()->user()->password)) {
                $usuario->password = Hash::make($request->password) ?? auth()->user()->password;
            } else {
                return back()->with('mensaje_error', 'La Contraseña Actual no Coincide');
            }
        }

        $usuario->save();

        //Redireccionar al usuario        
        return redirect()->route('perfil', $usuario->username);
    }
}
