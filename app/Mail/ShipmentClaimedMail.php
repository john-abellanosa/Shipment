<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentClaimedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;

    public function __construct($shipment)
    {
        $this->shipment = $shipment;
    }

    public function build()
    {
        return $this->subject('Your Shipment Has Been Claimed')
                    ->view('email.shipment_claimed');
    }
}
