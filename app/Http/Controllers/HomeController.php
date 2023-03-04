<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Category;
use App\Models\SiteSetting;
class HomeController extends Controller
{
    public function index(){

        $product_categories = CategoryProduct::groupBy('category_id')->distinct('product_id')->with('product')->latest()->get();

        $products = CategoryProduct::distinct('product_id')->with('product')->latest()->get();


        return view('frontend.index', compact('products','product_categories'));




    }
}
