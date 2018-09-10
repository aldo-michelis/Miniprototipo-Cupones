<?php

namespace App\Mail;

use App\CouponDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CodeSendingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CouponDetail $detail)
    {
        $this->code = $detail->code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sendcode');
    }
}
