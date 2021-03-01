<?php

namespace App\Listeners;

use App\Events\Company\CompanyCreatedEvent;
use Illuminate\Support\Facades\Log;

class CompanyCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CompanyCreatedEvent  $event
     * @return void
     */
    public function handle(CompanyCreatedEvent $event)
    {
        Log::info([self::class, __METHOD__ ]);

        Log::info($event->getCompany());
    }
}
