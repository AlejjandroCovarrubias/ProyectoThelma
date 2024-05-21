<?php

namespace App\Mail;

use App\Models\Receta;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class NuevaReceta extends Mailable
{
    use Queueable, SerializesModels;
    public $receta;
    public $owner;
    /**
     * Create a new message instance.
     */
    public function __construct(Receta $receta)
    {
        $this->receta=$receta;
        $this->owner=Auth::user();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('info@c-cocino.com', 'C-Cocino'),
            subject: 'Creaste una nueva receta: '.$this->owner->nickname,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown:'emails.NuevaReceta',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
