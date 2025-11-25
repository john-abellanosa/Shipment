<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentUnclaimedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;

    public function __construct($shipment)
    {
        $this->shipment = $shipment;
    }

    public function build()
    {
        return $this->subject('Your Shipment Was Not Claimed')
                    ->view('email.shipment_unclaimed');
    }
}
