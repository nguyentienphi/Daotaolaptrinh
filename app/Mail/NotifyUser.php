<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;

        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('admin.mail.notify_user')
                    ->subject('Thông báo người dùng')
                    ->with([
                        'name' => $this->user['name'],
                        'to' => $this->user['email'],
                        'password' => $this->password,
                    ]);
    }
}
