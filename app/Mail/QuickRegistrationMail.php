<?php

namespace App\Mail;

use App\Models\QuickRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuickRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $model;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(QuickRegistration $model)
    {
        $this->model = $model;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): QuickRegistrationMail
    {
        return $this->from('info@just2canada.ca')->view('mail.quick-registration-mail',[
            'data' => $this->model
        ]);
    }
}
