<?php

namespace App\Mail;

use App\Models\FormSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobSeekerCopyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formSubmission;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(FormSubmission $formSubmission)
    {
        $this->formSubmission = $formSubmission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from([
            'info@just2canada.ca',
        ])->view('mails.js-copy',[
            'data' => $this->formSubmission
        ]);
    }
}
