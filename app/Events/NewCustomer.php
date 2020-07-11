<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class NewCustomer
{
    use SerializesModels;

    public $customer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
    }
}
