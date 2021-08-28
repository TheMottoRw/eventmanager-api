<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $name;
    protected $sujet;
    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$subject,$message)
    {
        //
        $this->sujet = $subject;
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->sujet)->view('mail')->with(['name'=>$this->name,'msg'=>$this->message]);
    }
}
