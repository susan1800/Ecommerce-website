<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $carts = session()->get('kaichocart');

        return view('frontend.cart' , compact('carts'));
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required',
            'quantity' => 'required',
        ]);



        $id = $request->id;
        $product = Product::findOrFail($id);

        $cart = session()->get('kaichocart', []);

        if(isset($cart[$id])) {
            if($request->quantity){
                $cart[$id]['quantity']+=$request->quantity;
                $cart[$id]['total_price']+=$request->quantity * ($product->price - $product->discounted_price);
            }
            else{
                $cart[$id]['quantity']++;
                $cart[$id]['total_price']+=($product->price - $product->discounted_price);

            }
        } else {
            if($request->quantity){
                $quantity =$request->quantity;
            }
            else{
                $quantity = 1;
            }
            $totalprice = ($product->price - $product->discounted_price) * $quantity;
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->title,
                "quantity" => $quantity,
                "price" => ($product->price - $product->discounted_price),
                "total_price" => $totalprice,
                "image" => $product->image,
            ];
        }

        session()->put('kaichocart', $cart);

       return redirect()->back()->with('success','Item successfully added to cart!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('kaichocart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('kaichocart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeCart($id)
    {
        if($id) {
            $cart = session()->get('kaichocart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('kaichocart', $cart);
            }
            return redirect()->back();
        }
    }

}
