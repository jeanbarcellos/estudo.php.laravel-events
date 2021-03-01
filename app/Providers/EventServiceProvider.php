<?php

namespace App\Providers;

use App\Listeners\CompanyEventSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Os mapeamentos de ouvinte de evento para o aplicativo.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * As classes de assinantes a serem registradas.
     *
     * @var array
     */
    protected $subscribe = [
        // # FORMA 1 - Docuemntação do Laravel
        CompanyEventSubscriber::class,
    ];

    /**
     * Registre quaisquer eventos para o seu aplicativo.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
