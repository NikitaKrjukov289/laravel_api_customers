<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    
    }
    public function store(Request $request)
    {

    }
    public function show(Customer $customer)
    {
        return [
            'customer_id' => $customer->customer_id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,

            'isGoldMember'=> $customer->isGoldMember()
        ];
    }
    public function update(Request $request, Customer $customer )
    {

    }
    public function destroy(Customer $customer)
    {

    }

  
}
