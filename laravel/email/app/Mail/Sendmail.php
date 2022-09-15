<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	 public $data;
	
    public function __construct($data)
    {
		$this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		//$address = 'janeexampexample@example.com';
        $subject = 'This is a demo!';
        $name = 'Tops Technologies';

        return $this->view('emails.welcomeTemp')
                    /*->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)*/
                    ->subject($subject)
                    ->with([ 'test_otp' => $this->data['otp'],'body'=>$this->data['body'] ]);
    }
}
