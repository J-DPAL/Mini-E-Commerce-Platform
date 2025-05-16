<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class OrderController extends Controller
{
    public function checkoutForm()
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
        return view('cart.checkout', [
            'cart' => $cart,
            'user' => Auth::user()
        ]);
    }

    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'payment_type' => 'required|string|max:50',
        ]);

        DB::beginTransaction();
        try {
            foreach ($cart as $productId => $item) {
                $product = Product::find($productId);
                if (!$product || $product->stock_quantity < $item['quantity']) {
                    DB::rollBack();
                    return redirect()->route('cart.index')
                        ->with('error', 'Not enough stock for product: ' . ($product->name ?? 'Unknown'));
                }
            }
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            $order = Order::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'payment_type' => $request->payment_type,
                'total' => $total,
            ]);

            foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId, // use key from cart array
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            $product = Product::find($productId);
            $product->stock_quantity -= $item['quantity'];
            $product->save();
        }


            session()->forget('cart');
            DB::commit();

            return redirect()->route('orders.success')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to place order.');
        }
    }

    public function orderSuccess()
    {
        return view('cart.success');
    }

    // Admin: List all orders
    public function adminOrders()
    {
        $orders = Order::with('items.product')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // Admin: Show single order
    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
}
