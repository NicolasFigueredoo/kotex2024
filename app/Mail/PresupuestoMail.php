<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PresupuestoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $apellido;
    public $email;
    public $celular;
    public $mensaje;
    public $productos;
    public $archivo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $apellido, $email,$celular,$mensaje, $productos, $archivo )
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->celular = $celular;
        $this->mensaje = $mensaje;
        $this->productos = $productos;
        $this->archivo = $archivo;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->archivo){
            return 
            $this->view('emails.presupuesto')
            ->subject('Nuevo mensaje de presupuesto')
            ->attach($this->archivo->getRealPath(), [
                'as' => $this->archivo->getClientOriginalName(),
                'mime' => $this->archivo->getClientMimeType(),
            ]);
        }else{
            return 
            $this->view('emails.presupuesto')
            ->subject('Nuevo mensaje de presupuesto');
        }
   
        
    }
}
