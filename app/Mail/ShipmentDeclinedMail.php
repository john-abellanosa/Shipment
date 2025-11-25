<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentDeclinedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;
    public $declineReason;

    public function __construct($shipment, $declineReason)
    {
        $this->shipment = $shipment;
        $this->declineReason = $declineReason;
    }

    public function build()
    {
        return $this->subject('Your Shipment Request Has Been Declined')
                    ->view('email.shipment_declined');
    }
}
