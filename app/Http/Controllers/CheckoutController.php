<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
       
            $request->validate([
            'cart' => 'required|array',
            'cart.*.product_id' => 'required|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
            'cart.*.size' => 'required',
            
            ]);
            $order = new Order([
                'user_id' => auth()->id(),
                'total_price' => 0,
                'status' => 'pending',
            
                ]); 
                $order->save();
                 
            $totalPrice = 0;
            foreach ($request->cart as $item) {
                $product = Product::find($item['product_id']);
                $price = $product->price * $item['quantity'];
                $totalPrice += $price;
                $orderItem = new OrderItem([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $price,
                    'size' => $item['size'],
                ]);
                $orderItem->save(); 
            }
            $order->total_price = $totalPrice;
            $order->save();
             return redirect()->route('shop')->with('success', 'Order placed successfully!');
    }
}
