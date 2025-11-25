<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentInTransitMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;
    public $expectedDeliveryDate;

    public function __construct($shipment, $expectedDeliveryDate)
    {
        $this->shipment = $shipment;
        $this->expectedDeliveryDate = $expectedDeliveryDate;
    }

    public function build()
    {
        return $this->subject('Your Shipment is Now In Transit')
                    ->view('email.shipment_in_transit');  
    }
}
