<?php

namespace App\Listeners;

use App\Events\Job\JobCreatedEvent;
use App\Events\Job\JobDeletedEvent;
use App\Events\Job\JobUpdatedEvent;
use Illuminate\Support\Facades\Log;

class JobListener
{

    public function __construct()
    {

    }

    public function handleCreated(JobCreatedEvent $event)
    {
        Log::info(__METHOD__);
        Log::info($event->getJob());
    }

    public function handleUpdated(JobUpdatedEvent $event)
    {
        Log::info(__METHOD__);
        Log::info($event->getJob());
    }

    public function handleDeleted(JobDeletedEvent $event)
    {
        Log::info(__METHOD__);
        Log::info($event->getJob());
    }
}
