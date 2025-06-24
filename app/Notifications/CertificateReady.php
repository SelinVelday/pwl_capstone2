<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Registration; // <-- Jangan lupa import model

class CertificateReady extends Notification
{
    use Queueable;

    protected $registration;

    /**
     * Create a new notification instance.
     */
    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // Kita akan menyimpan notifikasi ini ke database
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        // Ini adalah data yang akan disimpan sebagai JSON di database
        return [
            'event_name' => $this->registration->event->name,
            'message' => 'Sertifikat Anda untuk event "' . $this->registration->event->name . '" sudah tersedia untuk diunduh!',
            'url' => route('member.my_registrations'),
        ];
    }
}