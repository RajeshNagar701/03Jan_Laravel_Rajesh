<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class otp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        $subject='Please';
        $name="Doccure";

        return $this->view('patient.otp')
        ->subject($subject)
        ->with(['name'=>$this->data['name'],'ptbookotp'=>$this->data['ptbookotp'],'body'=>$this->data['body']]);
    
    }
}
