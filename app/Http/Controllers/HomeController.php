<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SiteSetting;
class HomeController extends Controller
{
    public function index(){
        $products = Product::latest()->limit(8)->where('display',1)->get();
        $settings = SiteSetting::first();
        return view('frontend.index', compact('products'));
    }
}
