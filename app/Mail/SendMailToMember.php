<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToMember extends Mailable
{
    use Queueable, SerializesModels;
    public $subscribe;

    public function __construct($subscribe)
    {
        $this->subscribe = $subscribe;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Admin')->from('admin@gmail.com')->replyTo('nhattan13699@gmail.com', 'Bất động sản')->view('mails.member_subscribe',
        [
            'subscribe' => $this->subscribe
        ]);
    }
}
