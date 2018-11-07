<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCanceledFromUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $data;
    private $product;
    public function __construct($in, $p)
    {
        $this->data = $in;
        $this->product = $p;
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
                ->error()
                ->subject('Cita Cancelada')
                ->greeting('Apreciado '. $this->data->name)
                ->line('Lamentamos informarle que su cita para: '.$this->product->name .' ha sido cancelada')
                ->action('Contactenos', url('/contact'))
                ->line('Gracias usar nuestra pagina, esperamos verlo pronto!');
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
            "in_order" => $data->id,
        ];
    }
}
