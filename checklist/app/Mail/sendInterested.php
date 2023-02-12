<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendInterested extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected  $nomeDestintario;
    protected $nomeBolo;
    public function __construct(string $nomeDestintario, string $nomeBolo)
    {
        $this->nomeBolo = $nomeBolo;
        $this->nomeDestintario = $nomeDestintario;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('teste@testechecklist.com', 'Riardo Bene'),
            replyTo: [
                new Address('teste@testechecklist.com', 'Riardo Bene'),
            ],
            subject: 'Temos seu bolo te esperando!!',
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
            markdown: 'view.emails.interestedEmail',
            with: [
                'nomeBolo' => $this->nomeBolo,
                'nomeDestinatario' => $this->nomeDestintario,
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
