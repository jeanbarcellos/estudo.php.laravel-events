<?php

namespace App\Events\Job;

use App\Models\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class JobDeletedEvent
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
