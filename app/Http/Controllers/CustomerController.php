<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $results = DB::table('customers as c')
        ->join('orders as o', 'c.customer_id', '=', 'o.customer_id')
        ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
        ->select(
            'c.customer_id',
            'c.first_name',
            'c.last_name',
            'c.address',
            'c.city',
            'c.state',
            'c.points',
            'o.order_date',
            'os.name as order_status_name'
        )
        ->get();

        return $results;

    
    }
    public function store(Request $request)
    {
        $fields = $request->validate([ 'customer_id', 'first_name', 'last_name', 'address', 'city', 'state' ]);
         // $request->validate([ // 'customer_id' => 'required', // 'first_name', // 'last_name', // 'gold_member', // 'address', // 'city', // 'state', // 'points' // ]); $customer = Customer::create($fields); return [ 'customer' => $customer];
    }

    public function show(Customer $customer){

        $results = DB::table('customers as c')
        ->join('orders as o', 'c.customer_id', '=', 'o.customer_id')
        ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
        ->select(
            'c.customer_id',
            'c.first_name',
            'c.last_name',
            'c.address',
            'c.city', 
            'c.points',
            'o.order_date',
            'os.name as order_status_name'
        )
        ->where('c.customer_id', $customer->customer_id)
        ->get();

    return $results;
    }


    public function update(Request $request, Customer $customer )
    {

    }
    public function destroy(Customer $customer)
    {

    }

  
}
