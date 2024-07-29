<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email_data;

    /**
     * Create a new message instance.
     *
     * @param array $email_data
     */
    public function __construct(array $email_data)
    {
        $this->email_data = $email_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->email_data['email_type']) {
            case 'forgot_password':
                return $this->view('website.mail_page')
                            ->subject('Seethas Food – Forgot Password')
                            ->with([
                                'link' => $this->email_data['link'],
                                'username' => $this->email_data['username'],
                            ]);
            case 'registration':
                return $this->view('website.register_mail_page')
                            ->subject('Seethas Food – Registration')
                            ->with([
                                'username' => $this->email_data['username'],
                                'email' => $this->email_data['email'],
                                'phone' => $this->email_data['phone'],
                                'password' => $this->email_data['password'],

                            ]);
            default:
                throw new \Exception('Invalid email type');
        }
    }
}
