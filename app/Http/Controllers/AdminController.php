<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Logic for the admin dashboard
            // Fetch all users
    $users = User::all();
    
    // Fetch all products
    $products = Product::all();
    
    // Fetch all orders
    $orders = Order::all();

    return view('dashboard', ['users' => $users, 'products' => $products, 'orders' => $orders]);
    }

    public function users()
    {
        // Fetch all user
        $user = User::all();

        return view('user', ['user' => $user]);
    }

    public function products()
    {
        // Fetch all products
        $products = Product::all();

        return view('product', ['products' => $products]);
    }

    public function orders()
    {
        // Fetch all orders
        $orders = Order::with('user')->get();

        return view('dashboard', ['orders' => $orders]);
    }

    public function makeAdmin($id)
    {
        // Find the user by id
        $user = User::find($id);

        // Update the user's role to admin
        $user->role = 'admin';
        $user->save();

        // Redirect back to the user page
        return redirect()->route('admin.user');
    }

    public function deleteProduct($id)
    {
        // Find the product by id
        $product = Product::find($id);

        // Delete the product
        $product->delete();

        // Redirect back to the products page
        return redirect()->route('views.product');
    }

    public function updateOrderStatus($id, Request $request)
    {
        // Find the order by id
        $order = Order::find($id);

        // Update the order status
        $order->status = $request->input('status');
        $order->save();

        // Redirect back to the orders page
        return redirect()->route('admin.orders');
    }
}
