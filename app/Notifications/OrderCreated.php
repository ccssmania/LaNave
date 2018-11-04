<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Product;
class OrderCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $data;
    private $product;
    public function __construct($in)
    {
        $this->data = $in;
        $this->product = Product::find($in->product_id);
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
                    ->subject("Alguien Ordenó una cita")
                    ->line('Hola soy: '.$this->data->name)
                    ->line('Quiero hacer: '.$this->product->name)
                    ->line('A mi coche: '.$this->data->car_model)
                    ->line('Mi número: '.$this->data->number)
                    ->line('Mi correo: '. $this->data->email)
                    ->action('Notificaciones', url('/notifications'))
                    ->line('Gracias!');
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
            'type' => 'order_request',
            'name' => 'Nueva petición de cita',
            'in_order' => $this->data,
        ];
    }
}
