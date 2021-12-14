<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OtpNotification extends Notification
{
    use Queueable;
    private $otpData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($otpData)
    {
        $this->otpData = $otpData;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->otpData['body'])
                    ->action($this->otpData['otpText'])
                    ->line($this->otpData['Thankyou']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
    
        return [
            'body' => 'The following is your OTP code',
            'otpText' => 'otp',
            'Thankyou' => 'Thank you'
            
        ];
    }
}
