<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('user_id', auth()->id())->with('items.product')->latest()->get();
        return Inertia::render('Orders', ['orders' => $order]);
    }
}
