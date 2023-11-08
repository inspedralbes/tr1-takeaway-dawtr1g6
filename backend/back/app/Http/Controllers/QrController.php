<?php

namespace App\Http\Controllers;

use App\Models\LiniaPedido;
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
	$user = User::find($request->plain_text_token);
    $userCheckoutData = LiniaPedido::where('user_id', $user->id)->get(); //objeto de LiniaPedido con ($userCheckoutData->unit_price...)
	$username = $user->name;

        // generar el Qr con la info de las variables anteriores
        $qr = QrCode::size(300)->generate(json_encode(compact('user','userCheckoutData')));

        // convertir qr a pdf
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.autoplanetCompra', compact('qr'));

        // enviar email con archivo pdf como attachment
        Mail::send('mail.autoplanet-ticket', [], function($message) use ($pdf,$username) {
            $message->to($username.'@gmail.com')
                    ->subject('AUTOPLANET COMANDA')
                    ->attachData($pdf->output(), 'autoplanetCompra.pdf');
        });

        return "Qr enviat de forma exitosa!";
    }

}
