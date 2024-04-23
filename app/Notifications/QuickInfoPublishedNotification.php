<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuickInfoPublishedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $quickInfo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($quickInfo)
    {
        $this->quickInfo = $quickInfo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->subject('Информация о погоде на ' . $this->quickInfo->updated_at->format('d.m.Y'))
            ->from('info@hydromet.uz', 'Гидрометеорология хизмати маркази')
            ->view('quick-info.mail', ['quickInfo' => $this->quickInfo]);
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
            //
        ];
    }
}
