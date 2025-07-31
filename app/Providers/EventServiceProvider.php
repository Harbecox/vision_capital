<?php

namespace App\Providers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\UserBalance;
use App\Models\UserBalanceChange;
use App\Models\Withdrawal;
use App\Observers\BalanceObserver;
use App\Observers\DepositObserver;
use App\Observers\UserObserver;
use App\Observers\WithdrawalObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        Withdrawal::observe(WithdrawalObserver::class);
        Deposit::observe(DepositObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
