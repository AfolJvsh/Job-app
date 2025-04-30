<?php

namespace App\Notifications;

use App\Models\Applications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationSubmitteNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $application;
    /**
     * Create a new notification instance.
     */
    public function __construct(Applications $application)
    {
        $this->application = $application;
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
        return (new MailMessage)
        ->subject('Application Received')
        ->greeting('Hello ' . $notifiable->name . ',')
        ->line('Your application for ' . $this->application->job->title . ' has been sent to ' . $this->application->job->user->company_name . '.')
        ->action('View Application', url('/applications/' . $this->application->id))
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
