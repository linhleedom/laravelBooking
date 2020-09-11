<?php

namespace App\Mail\user;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,$result)
    {
        $this->token = $token;
        $this->result = $result;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('reset-password')."/".$this->token;
        return $this->from('bookyourtravel.vn@gmail.com')
                    ->view('user.sendEmail.resetPassword')
                    ->with([
                        'url' => $url,
                        'user'=> $this->result
                    ]);
    }
}
