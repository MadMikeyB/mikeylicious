<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Twitter\TwitterChannel;
use NotificationChannels\Twitter\TwitterStatusUpdate;

class PostPublished extends Notification
{
    use Queueable;

    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TwitterChannel::class];
    }

    /**
     * Send post to Twitter
     *
     * @param mixed $notifiable
     * @return \NotificationChannels\Twitter\TwitterStatusUpdate
     */
    public function toTwitter($notifiable)
    {
        return new TwitterStatusUpdate($notifiable->title .' #'.studly_case($notifiable->category->title) .' '. route('posts.show', $notifiable));
    }
}
