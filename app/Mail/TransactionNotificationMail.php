<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionNotificationMail extends Notification
{
    use Queueable;

    protected $transaction;
    protected $transactionCount;
    protected $transactionType;
    protected $currentBalance;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction, $transactionCount, $transactionType, $currentBalance)
    {
        $this->transaction = $transaction;
        $this->transactionCount = $transactionCount;
        $this->transactionType = $transactionType;
        $this->currentBalance = $currentBalance;
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
                    ->subject('Transaction Notification')
                    ->line('You have made a ' . $this->transactionType . ' transaction of $' . $this->transaction->amount . '.')
                    ->line('This is transaction ' . $this->transactionCount . '.')
                    ->line('Your current balance is $' . $this->currentBalance . '.')
                    ->line('Thank you for using our service.');
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
