<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentCancelledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;
    public $cancelReason;

    public function __construct($shipment, $cancelReason)
    {
        $this->shipment = $shipment;
        $this->cancelReason = $cancelReason;
    }

    public function build()
    {
        return $this->subject('Your Shipment Has Been Cancelled')
                    ->view('email.shipment_cancelled');  
    }
}
