<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipment;
    public $dispatchDate;

    public function __construct($shipment, $dispatchDate)
    {
        $this->shipment = $shipment;
        $this->dispatchDate = $dispatchDate;
    }

    public function build()
    {
        return $this->subject('Your Shipment Request Has Been Approved!')
                    ->view('email.shipment_approved');
    }
}
