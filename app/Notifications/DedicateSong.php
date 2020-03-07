<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DedicateSong extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($currentUser, $song)
    {
        $this->currentUser = $currentUser;
        $this->song = $song;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view('mail.dedicate', ['song' => $this->song, 'senderUser' => $this->currentUser]);
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
    }

    public function toDatabase() {
        return [
            'user' => [
                'name' => $this->currentUser->profile->name,
                'id' => $this->currentUser->id
            ],
            'song' => [
                'title' => $this->song->title,
                'album_image' => $this->song->album->img_url,
                'artist_id' => $this->song->album->user->id,
                'artist_name' => $this->song->album->user->profile->name,
                'id' => $this->song->id
            ]
        ];
        // return [
        //     'dedicater' => $this->currentUser,
        //     'song' => $this->song,
        // ];
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
