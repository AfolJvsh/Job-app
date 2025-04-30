<?php

namespace App\Notifications;

use App\Models\Applications;
use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationReceivedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $application;
    public $job;
    /**
     * Create a new notification instance.
     */
    public function __construct(Job $job, Applications $application)
    {
        $this->application =$application;
        $this->job= $job;
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
        ->subject("New Job Application for {$this->job->title}")
        ->line("A new application has been submitted for the job: {$this->job->title}.")
        ->line("Applicant Name: {$this->application->user->name}")
        ->action('View Application', url('/applications/' . $this->application->id));
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
