<?php

namespace Tests\Feature\Http\Controllers;

use App\Customer;
use App\Events\NewCustomer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CustomerController
 */
class CustomerControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $customers = factory(Customer::class, 3)->create();

        $response = $this->get(route('customer.index'));

        $response->assertOk();
        $response->assertViewIs('customer.index');
        $response->assertViewHas('customers');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CustomerController::class,
            'store',
            \App\Http\Requests\CustomerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $first_name = $this->faker->firstName;
        $last_name = $this->faker->lastName;
        $identity = $this->faker->word;
        $phone_number = $this->faker->phoneNumber;
        $birth_place = $this->faker->word;

        Event::fake();

        $response = $this->post(route('customer.store'), [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'identity' => $identity,
            'phone_number' => $phone_number,
            'birth_place' => $birth_place,
        ]);

        $customers = Customer::query()
            ->where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('identity', $identity)
            ->where('phone_number', $phone_number)
            ->where('birth_place', $birth_place)
            ->get();
        $this->assertCount(1, $customers);
        $customer = $customers->first();

        $response->assertRedirect(route('customer.index'));
        $response->assertSessionHas('customer.first_name', $customer->first_name);

        Event::assertDispatched(NewCustomer::class, function ($event) use ($customer) {
            return $event->customer->is($customer);
        });
    }
}
