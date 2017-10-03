<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActiveAccount extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($name, $email, $username, $pass, $link_active)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->pass = $pass;
        $this->link_active = $link_active;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.activeaccount')->with([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'pass' => $this->pass,
                'link_active' => $this->link_active,
            ]);
    }
}
