<?php

namespace App\Mail\user;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Bill;

class mailInfor extends Mailable
{
    use Queueable, SerializesModels;

    public $bill;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bookyourtravel.vn@gmail.com')
                    ->view('user.sendEmail.custom1')
                    ->with([
                        'bill' => $this->bill,
                    ]);
    }
}
