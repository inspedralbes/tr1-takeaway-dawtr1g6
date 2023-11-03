<?php

namespace App\Mail;

use App\Models\LiniaPedido;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class autoplanetMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     */
    protected $user;
    protected $lp;

    public function __construct(User $user, LiniaPedido $liniapedido)
    {
        
        $this->user = $user;
        $this->lp = $liniapedido;
     
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Autoplanet Mail',
        );
    }
   public function build()
    {
        return $this->view('mail.email') // Assuming you have an email template named autoplanet.blade.php in the "resources/views/emails" directory.
                    ->subject('Comanda Autoplanet') // Specify the subject of the email
                    ->with([
                        'user' => $this->user,
                        'lp' => $this->lp,
                    ]);
    }




    public function content(): Content
    {
      
    }

  

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
