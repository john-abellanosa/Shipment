<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $shipmentId;
    public $name;

    public function __construct($shipmentId, $name)
    {
        $this->shipmentId = $shipmentId;
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject('Thank You for Your Shipping Request')
                    ->view('email.request_submitted');
    }
}
