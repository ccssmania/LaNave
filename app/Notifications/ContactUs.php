<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactUs extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->greeting('Hola! :')
                    ->subject("Alguien nos quiere contactar")
                    ->line("Nombre: <strong>".$this->data->name."</strong>")->line("Mensaje: <strong>".$this->data->message."</strong>")->line("Email: ".$this->data->email)->line("Numero Telefonico: <strong>".$this->data->number . "</strong>")
                    ->action('Ir a notificaciones', url('/notifications'));
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
            'type' => 'contactus',
            'name' => 'Alguien nos contacta',
            'data' => [

                'email'  => $this->data->email,
                'number' => $this->data->number,
                'name'  => $this->data->name,
                'message' => $this->data->message,
            ],
        ];
    }
}
