<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetCustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(GetCustomerRequest $request)
    {
        $customers = Customer::all();

        // if the first_name request get parameter exists, filter the customer collection by the first_name
        if ($request->has('first_name') ) {
            $customers = $customers->where('first_name', $request->first_name);
        }

        // if the last_name request get parameter exists, filter the customer collection by the last_name
        if ($request->has('last_name') ) {
            $customers = $customers->where('last_name', $request->last_name);
        }
        
        // if the date_last_order request get parameter exists, filter the customer collection by the date_last_order
        if ($request->has('date_last_order') ) {
            $customers = $customers->where('date_last_order', $request->date_last_order);
        }

        return CustomerResource::collection($customers);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCustomerRequest $request)
    {
        $customer = new Customer;

        if ($request->has('first_name')) {
            $customer->first_name = $request->first_name;
        }

        if ($request->has('last_name')) {
            $customer->last_name = $request->last_name;
        }

        if ($request->has('email')) {
            $customer->email = $request->email;
        }

        if ($request->has('phone_number')) {
            $customer->phone_number = $request->phone_number;
        }
        
        if ($customer->save())
        {
            return new CustomerResource($customer);     // return response with the data about the newly created customer
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */

     public function update(UpdateCustomerRequest $request, Customer $customer)
     {
        if (empty($customer) ) {
            return "Customer with id: $customer->id has not been found, no change has been made.";
        }
      
        if ($request->has('customer_id')) {
            $customer->customer_id = $request->customer_id;
            $customer->save();
        }
 
         return new CustomerResource($customer);     // return response with the data about the newly created customer
     }


    /**
     * Remove a customer item with a specific id
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */

    public function destroy(Customer $customer)
    {
        if (!empty($customer) ) {
            $customer->delete();
            return "Customer with id: $customer->id has been deleted.";
        } else {
            return "Customer with id: $customer->id has not been found, no change has been made.";
        }
    }

}