<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        $user = Auth::user();
        $cartItem = $user->cart()->where('product_id', $product->id)->first();

        if (!$cartItem) {
            $user->cart()->create(['product_id' => $product->id, 'quantity' => 1]);
        } else {
            $cartItem->update(['quantity' => $cartItem->quantity + 1]);
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function updateQuantity(Request $request)
    {
        $cartItem = Cart::findOrFail($request->input('cartId'));
        $cartItem->update(['quantity' => $request->input('quantity')]);

        return response()->json(['message' => 'Quantity updated successfully']);
    }

    public function deleteCartItem(Request $request)
    {
        $cartItem = Cart::findOrFail($request->input('cartId'));
        $cartItem->delete();

        return response()->json(['message' => 'Item deleted successfully']);
    }
}
