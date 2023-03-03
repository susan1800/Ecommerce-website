<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\Category;
use App\Models\CategoryProduct;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->where('display',1)->get();
        $categories = Category::where('display',1)->get();
        $settings = SiteSetting::first();
        $show = "";
        return view('frontend.products', compact('products','categories','show'));
    }



    public function shopDetails($id){
        $product = Product::find($id);
        $products = Product::latest()->limit(4)->where('display' , 1)->get();

        return view('frontend.productdetails' , compact('product' , 'products'));
    }


    public function shopByCategory($id){
        $products = CategoryProduct::where('category_id' , $id)->with('product')->get();
        $show = "bycategory";
        $categories = Category::where('display',1)->get();
        return view('frontend.products' , compact('products' , 'categories','show'));
    }
}
