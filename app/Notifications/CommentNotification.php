<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $comment;
    protected $post;
    protected $user;

    public function __construct(Comment $comment, Post $post, User $user)
    {
        $this->comment = $comment;
        $this->post = $post;
        $this->user = $user;

        return $this->id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toDatabase($notifiable)
    {
        return [
            'comment' => $this->comment,
            'post' => $this->post,
            'user' => $this->user
        ];
    }
}
