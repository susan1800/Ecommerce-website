<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){

        $validated = $request->validate([
            'search' => 'required',

        ]);


        return redirect()->route('search.result' , $request->search);
    }

    public function search($search){

        $products = Product::where('display',1)->where('title', 'like', '%'.$search.'%')->orwhere('price', 'like', '%'.$search.'%')->paginate(9);
        return view('frontend.search' , compact('products','search'));


    }
}
