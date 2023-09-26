<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function config()
    {
        return view('user.settings');
    }
    public function update(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = Auth::user();
        $id = $user->id;

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');

        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;

        $user->update();

        return redirect()->route('settings')->with(['message' => 'Datos actualizados con exito']);
    }
}
