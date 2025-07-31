<?php

namespace App\Notifications;

use App\Mail\RegisterMail;
use App\Models\EmailTemplate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyEmailNotification extends VerifyEmail
{

    public function toMail($notifiable): MailMessage
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        $html = EmailTemplate::query()->where("name","after_register")->first()->content;
        $html = str_replace('[url]',$verificationUrl,$html);
        $html = str_replace('[name]',$notifiable->info[0]->first_name." ".$notifiable->info[0]->last_name,$html);
        return (new MailMessage)->subject("Welcome to Vision Capital")->view("mail.register",["html" => $html]);
    }

}
