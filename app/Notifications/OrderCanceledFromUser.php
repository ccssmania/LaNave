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
                ->greeting('Apreciado (a) '. $this->data->name)
                ->line('Lamentamos informarle que su cita para: '.$this->product->name .' ha sido cancelada')
                ->action('Contactenos', url('/contactus'))
                ->line('Gracias por usar nuestra aplicación, esperamos verlo pronto!');
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
            "description" => "Esta notificación es generada automaticamente cuando se cancela la cita de un cliente por parte nuestra",
            "in_order" => $data->id,
            'data' => [
                'email'  => $this->data->email,
                'numero' => $this->data->number,
                'name'  => $this->data->name,
                'coche' => $this->data->car_model,
                'producto' => $this->product->name,
            ],
        ];
    }
}
