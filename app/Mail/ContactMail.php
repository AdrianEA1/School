<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname;
    public $email;
    public $subject;
    public $date;
    public $student;
    public $reason;
    public $teacher;
    public $type;

    /**
     * Create a new message instance.
     */
    public function __construct($fullname, $email, $subject, $date,
                                                             $student,
                                                             $reason,
                                                             $teacher,
                                                             $type){
        $this->fullname = $fullname;
        $this->email = $email;
        $this->subject = $subject;
        $this->date = $date;
        $this->student = $student;
        $this->reason = $reason;
        $this->teacher = $teacher;
        $this->type = $type;
    }

    public function build()
    {
        return $this->view('emails.mail');
    }

}
