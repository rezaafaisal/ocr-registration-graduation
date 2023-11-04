<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppNotifierUpdateClient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $app_name, public $app_new_ver, public $app_last_ver, public $changes)
    {
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('bladerlaiga.97@gmail.com', 'Anas Mubarak Yasin'),
            subject: "$this->app_name Update $this->app_last_ver to $this->app_new_ver",
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.app.notifier-update-client',
            with: [
                'name' => $this->app_name,
                'num' => $this->app_new_ver,
                'num_last' => $this->app_last_ver,
                'changes' => $this->changes,
                'url' => env('APP_URL'),
                'vendor' => 'Bladerlaiga',
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
