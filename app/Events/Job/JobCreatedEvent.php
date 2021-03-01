<?php

namespace App\Events\Job;

use App\Models\Job;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class JobCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $job;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function getJob(): Job
    {
        return $this->job;
    }

}
