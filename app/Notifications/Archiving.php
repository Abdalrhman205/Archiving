<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class Archiving extends Notification
{
    use Queueable;
    private $user;
    private $contentName;
    private $contentType;

    public function __construct($user, $contentName, $contentType)
    {
        $this-> user = $user;
        $this-> contentName = $contentName;
        $this-> contentType = $contentType;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        return [
            'user' => $this->user,
            'contentName' => $this->contentName,
            'contentType' => $this->contentType,
        ];
    }
}
