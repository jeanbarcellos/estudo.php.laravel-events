<?php

namespace App\Providers;

use App\Events\Company\CompanyCreatedEvent;
use App\Events\Company\CompanyDeletedEvent;
use App\Events\Company\CompanyUpdatedEvent;
use App\Events\Job\JobCreatedEvent;
use App\Events\Job\JobDeletedEvent;
use App\Events\Job\JobUpdatedEvent;
use App\Listeners\CompanyEventSubscriber;
use App\Listeners\CompanyListener;
use App\Listeners\JobListener;
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

        // # FORMA 2 - Criação de um único manipulador para cada evento
        CompanyCreatedEvent::class => [
            CompanyCreatedListener::class,
        ],

        // # FORMA 3 - Criação de uma clases com diversos manipuladores (métodos)
        // CompanyCreatedEvent::class => [[CompanyListener::class, 'handleCreated']],
        // CompanyUpdatedEvent::class => [[CompanyListener::class, 'handleUpdated']],
        // CompanyDeletedEvent::class => [[CompanyListener::class, 'handleDeleted']],
        JobCreatedEvent::class => [[JobListener::class, 'handleCreated']],
        JobUpdatedEvent::class => [[JobListener::class, 'handleUpdated']],
        JobDeletedEvent::class => [[JobListener::class, 'handleDeleted']],

    ];

    /**
     * As classes de assinantes a serem registradas.
     *
     * @var array
     */
    protected $subscribe = [
        # FORMA 1 - Docuemntação do Laravel
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
