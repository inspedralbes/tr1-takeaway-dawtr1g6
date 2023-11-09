<?php

namespace App\Http\Controllers;

use App\Models\LiniaPedido;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use Mail;

class QrController extends Controller
{
    //

    public function generarQrEnviarEmail(Request $request)
    {

        // Pillar la informacion del usuario a enviar sobre su pedido (info checkout)
        $user = User::where('plain_text_token', $request->token)->first();
       
        if ($user) {
            // buscar el ultimo pedido con el id del usuario
            $pedidoUser = Pedido::latest('user_id', $user->id)->first();
            $username=$user->name;
            $userCheckoutData = LiniaPedido::latest('pedido_id', $pedidoUser->id)->get();
            dd($userCheckoutData);
            // generar el Qr con la info de las variables anteriores
            $qr = QrCode::size(300)->generate(json_encode(compact('user', 'userCheckoutData')));

            // convertir qr a pdf
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.autoplanetCompra', compact('qr'));

            // enviar email con archivo pdf como attachment
            Mail::send('mail.autoplanet-ticket', [], function ($message) use ($pdf, $username) {
                $message->to($username . '@gmail.com')
                    ->subject('AUTOPLANET COMANDA')
                    ->attachData($pdf->output(), 'autoplanetCompra.pdf');
            });
            return "Qr enviat de forma exitosa!";
        }




       
    }

    public function generarQrEnviarEmailwithId(Request $request)
    {

        $user = User::where('id', $request->id)->get();
        
        if ($user) {
            // buscar el ultimo pedido con el id del usuario
            $pedidoUser = Pedido::latest('user_id', $user->id)->first();
            $username=$user->name;
            $userCheckoutData = LiniaPedido::latest('pedido_id', $pedidoUser->id)->get();

            // generar el Qr con la info de las variables anteriores
            $qr = QrCode::size(300)->generate(json_encode(compact('user', 'userCheckoutData')));

            // convertir qr a pdf
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.autoplanetCompra', compact('qr'));

            // enviar email con archivo pdf como attachment
            Mail::send('mail.autoplanet-ticket', [], function ($message) use ($pdf, $username) {
                $message->to($username . '@gmail.com')
                    ->subject('AUTOPLANET COMANDA')
                    ->attachData($pdf->output(), 'autoplanetCompra.pdf');
            });
            return "Qr enviat de forma exitosa!";
        }




        
    }




}
