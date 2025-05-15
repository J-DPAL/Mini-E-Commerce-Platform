<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'payment_type' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }

        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // Save order (simplified)
        $order = new \App\Models\Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->payment_type = $request->payment_type;
        $order->total = $total;
        $order->save();

        // Optional: save each item if you have an OrderItem model
        // ...

        session()->forget('cart');

        return redirect('/')->with('success', 'Order placed successfully!');
    }

}
