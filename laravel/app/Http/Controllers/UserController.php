<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    // REGISTRAR NOU USUARI
    public function register(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            //'phonefield' => 'phone:ES|phone:mobile',
        ]);

        $rol = $request->input('rol', 'user');

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => $rol,
        ]);

        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->json(['token' => $token], 201);


    }



    // LOGIN USUARI
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credenciales = $request->only('email', 'password', 'name');

        if (Auth::attempt($credenciales)) {
            return response()->json(['message' => 'Login correcte'], 200);
        } else {
            return response()->json(['message' => 'Login incorrecte, aquest usuari no existeix'], 200);
        }
    }


    // LOGOUT USUARI
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout exitòs'], 200);
    }



    public function getUsers(Request $request)
    {

        $jsonData = $request->json()->all();

        foreach ($jsonData['users'] as $item) {
            $users = new User();
            $users->name = $item['name'];
            $users->email = $item['email'];
            $users->password = $item['password'];
            $users->rol = $item['rol'];
            $users->save();
        }

        $response = [
            'success' => true,
            'message' => 'Usuarios guardados correctamente.'
        ];

        return ($response);
    }

    public function giveJsonUsers()
    {
        $user = User::all();
        return json_encode($user, JSON_PRETTY_PRINT);
    }


}
