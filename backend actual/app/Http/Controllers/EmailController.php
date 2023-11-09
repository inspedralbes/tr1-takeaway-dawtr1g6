<?php

namespace App\Http\Controllers;

use App\Mail\autoplanetMail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LiniaPedido;

use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //

    public function email_after_buying(Request $request, $user_id)
{
    $user = User::find($user_id);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    $userEmail = $user->email;

    $latestLiniapedido = LiniaPedido::where('user_id', $user_id)->latest()->first();

    if (!$latestLiniapedido) {
        return redirect()->back()->with('error', 'LiniaPedido not found');
    }

    $latestLiniapedido->fill($request->all());
   
    // dd($user->email); // "carlos.sanchez@example.com"
    // dd($user); 
    // dd($latestLiniapedido);
    $latestLiniapedido->save();

    
    Mail::to($user->email)->send(new autoplanetMail($user, $latestLiniapedido));

    return redirect()->back()->with('success', 'Email sent successfully');
}


   

}
