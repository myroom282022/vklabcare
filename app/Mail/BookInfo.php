<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookInfo extends Mailable
{
    use Queueable, SerializesModels;
    public $bookData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookData)
    {
        $this->bookData = $bookData;
    }

    public function build(){
        return $this->subject('send mail from booking package information from vka3healthcare')->view('emails.bookInfo');
    }
}
