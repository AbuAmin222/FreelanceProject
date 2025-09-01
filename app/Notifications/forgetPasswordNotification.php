<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class forgetPasswordNotification extends Notification
{
        protected $guard, $token;

    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($guard, $token)
    {
        $this->guard = $guard;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url("/reset-password/{$this->guard}?token={$this->token}&id={$notifiable->id}");
        return (new MailMessage)
            ->line('HI, Please click on button to reset password.')
            ->action('Reset Password', $url)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
