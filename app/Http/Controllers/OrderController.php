<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Customer $customer){
        return $customer->orders;

    
    }


    public function show(Customer $customer, Order $order){
       return $customer->orders()->where('order_id', $order->order_id)->first();
    }
}
