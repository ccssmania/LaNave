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
                    ->greeting('Hola! alguien esta pidiendo una cita')
                    ->line('Hola soy: <strong>'.$this->data->name. "</strong>")
                    ->line('Quiero hacer: <strong>'.$this->product->name. "</strong>")
                    ->line('A mi coche: <strong>'.$this->data->car_model. "</strong>")
                    ->line('Mi número: <strong>'.$this->data->number. "</strong>")
                    ->line('Mi correo: <a href="mailto:'. $this->data->email.'">'.$this->data->email.'</a>')
                    ->action('Notificaciones', url('/notifications'));
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
