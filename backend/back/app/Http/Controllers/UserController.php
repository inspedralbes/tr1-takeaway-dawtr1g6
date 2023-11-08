<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function generarUserToken(User $user)
    {
        $secret = config('app.plain_text_token_secret'); // ir a .env y PLAIN_TEXT_TOKEN_SECRET=brd3 bbrrdd33 33ddrrbb
        $data = $user->id . '|' . $user->email . '|' . $user->username . '|' . $user->rol;
        $token = hash_hmac('sha256', $data, $secret);

        return $token;
    }

    public function authUserToken(Request $request)
    {
        $token = $request->header('Authorization'); // tiene que ser Authorization por como va HTTP
        $user = User::where('plain_text_token', $token)->first();

        if ($user) {
            return response("Autentificado correctamente");
        }

        return response("Autentificado incorrectamente");
    }


    // REGISTRAR NOU USUARI
    public function register(Request $request)
    {

        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
          
        ]);

        $rol = $request->input('rol', 'user');

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => $rol,
        ]);

        // se guarda en la bbdd en la columna plain_text_token el token del usuario
        $user->plain_text_token = $this->generarUserToken($user);
        $user->save();


        $token = $user->plain_text_token;


        return response()->json(['token' => $token], 201);


    }



    // LOGIN USUARI
    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // $credenciales = $request->only('email', 'password', 'name');

        // $user = User::find($request->email);



        // if (Auth::attempt($credenciales)) {
        //     $token = User::find($request)->createToken('auth_token')->plainTextToken;
        //     return response()->json(['token' => $token], 201);
        // } else {
        //     return response()->json(['message' => 'Login incorrecte, aquest usuari no existeix'], 200);
        // }

        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // metodo auth de laravel a los campos que se envian
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // el auth simplemente checkea las cookies y otras cosas que se guardan para ver si te has registrado
            $user = Auth::user();
            // se te genera un nuevo token, hay que updatear la bbdd...
            $user->plain_text_token = $this->generatePlainTextToken($user);
            $user->save(); // guardar en la bbdd el cambio de token

            // pasar al front el nuevo token
            return response()->json(['token' => $user->plain_text_token]);
        }

        // msg de error
        return response()->json(['error' => 'Autorizacion incorrecta'], 401);
    }


    // LOGOUT USUARI
    public function logout(Request $request)
    {
        // $request->user()->tokens()->delete();
        // return response()->json(['message' => 'Logout exitòs'], 200);

        $user = Auth::user();

        $user->plain_text_token = null;

        $user->save();

        Auth::logout();

        return response()->json(['message' => 'Logout exitos']);
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

    public function giveJsonUsersData()
    {
        $user = User::all();
        return json_encode($user, JSON_PRETTY_PRINT);
    }


}
