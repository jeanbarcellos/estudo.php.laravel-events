<?php

namespace App\Listeners;

use App\Events\Company\CompanyCreatedEvent;
use App\Events\Company\CompanyDeletedEvent;
use App\Events\Company\CompanyUpdatedEvent;
use Illuminate\Support\Facades\Log;

class CompanyListener
{

    public function __construct()
    {

    }

    public function handleCreated(CompanyCreatedEvent $event)
    {
        Log::info(__METHOD__);
        Log::info($event->getCompany());
    }

    public function handleUpdated(CompanyUpdatedEvent $event)
    {
        Log::info(__METHOD__);
        Log::info($event->getCompany());
    }

    public function handleDeleted(CompanyDeletedEvent $event)
    {
        Log::info(__METHOD__);
        Log::info($event->getCompany());
    }
}
