<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Http\Requests\ContactFormRequest;

class ContactFormMessage extends Notification
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ContactFormRequest $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(config('recipient.name') . ", you have a new message to view.")
                    ->greeting($this->message->subject)
                    ->salutation(" ")
                    ->from($this->message->emailAddress, "Admin")
                    ->replyTo($this->message->emailAddress, $this->message->name)
                    ->line("Sender:" . $this->message->name)
                    ->line($this->message->message)
                    ->line("Phone Number:")
                    ->line($this->message->phone)
                    ->line("Mobile Number:")
                    ->line($this->message->mobile)
                    ->line("Order/Reciept Number:")
                    ->line($this->message->orderReceiptNumber);
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
