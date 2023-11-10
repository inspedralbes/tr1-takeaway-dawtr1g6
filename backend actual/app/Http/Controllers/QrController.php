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

    public function triggerEmail()
{
    $request = new Request(['token' => '3d1bc9c6c9fd6d2ec01e888bfd3aa9d96d356356ef7cff0f1fa6914df8871b87']); // Provide a valid user token
    $this->generarQrEnviarEmail($request);
    
    return "Email triggered!";
}

    public function generarQrEnviarEmail(Request $request)
    {

        // Pillar la informacion del usuario a enviar sobre su pedido (info checkout)
        $user = User::where('plain_text_token', $request->token)->first();
       
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

    public function generarQrEnviarEmailwithId(Request $request)
    {

        $user = User::where('plain_text_token', $request->token)->first();
        
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
