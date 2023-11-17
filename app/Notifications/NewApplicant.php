<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use PhpParser\Node\Expr\FuncCall;

class NewApplicant extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public int $vacantId,
        public string $vacantName,
        public int $userId
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notificaciones');
        return (new MailMessage)
                    ->line('Un candidato ha aplicado a una de tus vacantes')
                    ->line("Tu vacante: {$this->vacantName} recibio otra solicitud")
                    ->action('Notification Action', $url)
                    ->line('Gracias por usar devJobs');
    }

    /**
     * Store the notifications in the Database
     */
    public function toDatabase(object $notifiable)
    {
        return [
            'vacantId' => $this->vacantId,
            'vacantName' => $this->vacantName,
            'userId' => $this->userId
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    // public function toArray(object $notifiable): array
    // {
    //     return [
    //         //
    //     ];
    // }
}
