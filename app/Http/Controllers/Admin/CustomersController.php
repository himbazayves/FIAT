<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Customer;
use App\Events\NewCustomer;
use App\Http\Requests\CustomerStoreRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    /**
     * @param \App\Http\Requests\CustomerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        $customer = Customer::create($request->all());

        event(new NewCustomer($customer));

        $request->session()->flash('customer.first_name', $customer->first_name);

        return redirect()->route('customer.index');
    }
}
