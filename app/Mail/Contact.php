<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    //Asunto del correo
    public $subject="Informacion de contacto";

    public $contacto;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contacto)
    {
        $this->contacto= $contacto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    //Este metodo siguiente trae una vista
    public function build()
    {
        return $this->view('emails.contact');
    }
}
