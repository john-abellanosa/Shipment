<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentRescheduledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;
    public $formattedDate;

    public function __construct($shipment, $formattedDate)
    {
        $this->shipment = $shipment;
        $this->formattedDate = $formattedDate;
    }

    public function build()
    {
        return $this->subject('Your Shipment Dispatch Date Has Been Rescheduled')
                    ->view('email.shipment_rescheduled');
    }
}
