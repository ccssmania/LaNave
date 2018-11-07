<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCanceledFromClient extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $in_order;
    public function __construct($in)
    {
        $this->in_order = $in;
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
                    ->subject('Cita Cancelada')
                    ->greeting('Cancelaron una cita! :')
                    ->line("Producto: ". $this->in_order->product->name)
                    ->line("Nombre: ". $this->in_order->name)
                    ->line("Correo: ".$this->in_order->email)
                    ->line("Número: ".$this->in_order->number)
                    ->line("La cita ya fué eliminada de las tareas y no aparecera en la agenda, éste mensaje es automático")
                    ->action('Notificationes', url('/notifications'));
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
            "type" => "order_canceled",
            "name" => "Orden Cancelada",
            "in_order_id" => $this->in_order->id
        ];
    }
}
