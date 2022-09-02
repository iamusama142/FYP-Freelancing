<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\notifiable;

class bidNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        // dd($name);
        $this->name = $name;
        // dd($this);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'heading'=>'Developer Request For Project',
            'nameone'=>$this->name[0]->f_name,
            'nametwo'=>$this->name[0]->l_name,
            'email'=>$this->name[0]->email,
            // 'id'=>$this->name[0]->reg_id,



            // 'email'=>$this->email[0]->email,
            // 'id'=>$this->regid[0]->reg_id,

        ];
    }
}
