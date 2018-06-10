<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;


class Contact extends Mailable {

    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function build() {
        $data = $this->data;
        return $this->from($data['email'], $data['name'])
            ->subject("New Contact from ".$data['name'])
            ->markdown('emails.contact')
            ->with($data);
    }

}