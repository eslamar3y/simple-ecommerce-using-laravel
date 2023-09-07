<?php

namespace App\Http\Controllers;

use App\Models\Products;

use App\Models\Carts;
use Illuminate\Http\Request;

class CartController extends Controller
{


    /**
     * Add to cart
     */
    public function addToCart(Request $request)
    {
        $user = auth()->user();
        $product = Products::find($request->id);
        // dd($request);

        // Check if the user has an existing cart item for this product
        $cartItem = Carts::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Update the existing cart item
            $cartItem->quantity += $request->quantity;
            $cartItem->total += $product->price * $request->quantity;
            $cartItem->save();
        } else {
            // Create a new cart item
            Carts::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'total' => $product->price * $request->quantity,
            ]);
        }

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Cart
     */
    public function cart()
    {
        $user = auth()->user();
        $cartItems = Carts::where('user_id', $user->id)->get();
        // get product details
        foreach ($cartItems as $cartItem) {
            $cartItem->product = Products::find($cartItem->product_id);
        }
        return view('cart', compact('cartItems'));
    }

    /**
     * Cart item delete
     */
    public function destroy($id)
    {
        $cartItem = Carts::find($id);
        $cartItem->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}
