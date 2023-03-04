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

        $product_categories = CategoryProduct::groupBy('category_id')->distinct('product_id')->with('product')->latest()->get();

        $products = CategoryProduct::distinct('product_id')->with('product')->latest()->get();

        $show = "allproduct";
        return view('frontend.products', compact('products','product_categories','show'));
    }



    public function shopDetails($id){
        $product = Product::find($id);
        $products = Product::latest()->limit(4)->where('display' , 1)->get();

        return view('frontend.productdetails' , compact('product' , 'products'));
    }


    public function shopByCategory($id){
        $products = CategoryProduct::where('category_id' , $id)->with('product')->get();
        $category = Category::find($id);
        $category = $category->title;
        $show = "bycategory";

        return view('frontend.products' , compact('products' , 'category','show'));
    }
}
