<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class VerifyEmail extends BaseVerifyEmail
{
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject('Zweryfikuj adres email')
            ->line('Wciśnij poniższy przycisk w celu weryfikacji maila.')
            ->action('Zweryfikuj adres email', $url)
            ->line('Jeśli to nie Ty założyłeś konto, nie podejmuj dalszych działań.');
    }
}
