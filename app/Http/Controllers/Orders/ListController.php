<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = Order::paginate(10);
        
        return response([
            'success' => true,
            'data'    => $orders
        ]);
    }
}