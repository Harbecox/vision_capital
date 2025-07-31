<?php

namespace App\Jobs;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MailRegisterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    private $url;

    /**
     * Create a new job instance.
     */
    public function __construct($user,$url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user)->send(new RegisterMail($this->user,$this->url));
    }
}
