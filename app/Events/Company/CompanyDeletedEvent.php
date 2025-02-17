<?php

namespace App\Events\Company;

use App\Models\Company;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CompanyDeletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $company;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

}
