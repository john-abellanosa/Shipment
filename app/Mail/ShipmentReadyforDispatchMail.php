<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentReadyforDispatchMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;

    public function __construct($shipment)
    {
        $this->shipment = $shipment;
    }

    public function build()
    {
        return $this->subject('Your Shipment is Ready for Dispatch')
                    ->view('email.shipment_readyfordispatch');
    }
}
