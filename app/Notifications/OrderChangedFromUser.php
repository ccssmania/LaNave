<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderChangedFromUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $order;
    private $task;
    private $in_order;
    public function __construct($or,$tas,$in)
    {
        $this->order = $or;
        $this->task = $tas;
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
                    ->error()
                    ->subject('Cita De '. $this->in_order->product->name.' Cambiada')
                    ->greeting('Apreciado (a) '. $this->in_order->name)
                    ->line('Le informamos que su cita para: '.$this->in_order->product->name .' ha sido cambiada para el dia : ')
                    ->line('Fecha : ' . $this->task->date)
                    ->action('Cancelar Orden', url('/order/userCancel/'.$this->order->id.'/'.$this->order->order_cancel))
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
            //
        ];
    }
}
