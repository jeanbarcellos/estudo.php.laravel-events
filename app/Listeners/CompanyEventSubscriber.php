<?php

namespace App\Listeners;

use App\Events\Company\CompanyCreatedEvent;
use App\Events\Company\CompanyDeletedEvent;
use App\Events\Company\CompanyUpdatedEvent;
use Illuminate\Support\Facades\Log;

class CompanyEventSubscriber
{
    public function handleCreated(CompanyCreatedEvent $event)
    {
        // TODO Logic
        Log::info(__METHOD__);
        Log::info($event->getCompany());
    }

    public function handleUpdated(CompanyUpdatedEvent $event)
    {
        // TODO Logic
        Log::info(__METHOD__);
        Log::info($event->getCompany());
    }

    public function handleDeleted(CompanyDeletedEvent $event)
    {
        // TODO Logic
        Log::info(__METHOD__);
        Log::info($event->getCompany());
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            CompanyCreatedEvent::class,
            [CompanyEventSubscriber::class, 'handleCreated']
        );

        $events->listen(
            CompanyUpdatedEvent::class,
            [CompanyEventSubscriber::class, 'handleUpdated']
        );

        $events->listen(
            CompanyDeletedEvent::class,
            [CompanyEventSubscriber::class, 'handleDeleted']
        );
    }
}
