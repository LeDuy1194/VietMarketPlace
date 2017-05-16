<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Matching extends Notification
{
    use Queueable;

    public $data;
    public $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data, $type) {
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', 'https://laravel.com')
        //             ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable) {
        if ($this->type == 'stock') {
            $result = 'Tin rao bán của bạn đã có kết quả matching.';
        }
        else {
            $result = 'Tin tìm mua của bạn đã có kết quả matching.';
        }
        return [
            'message' => $result,
            'action' => route('getMatch',[$this->type, $this->data->id])
        ];
    }
    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable) {
        return new BroadcastMessage([
            'message' => $result,
            'action' => route('getMatch',[$this->type, $this->data->id]),
        ]);
    }
}
