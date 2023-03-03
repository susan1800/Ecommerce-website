<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Service;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Color;
use App\Models\Size;
use App\Models\DiscountCoupon;
use App\Models\AppliedCoupon;
use App\Services\ModelHelper;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();

        // dd($orders);
        return view('backend.services.list-services', compact('services'));
    }

    public function viewService($id){
        $service = Service::find($id);
        return Storage::download('public/'.$service->design);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);



        return view('backend.orders.view-order-details', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Service::find($id);
        $order['status'] = 0;
        $order->save();
        if($order){
            return redirect()->route('services.index')->with('status','Service updated Successfully!');
        }
    }
    public function view($id)
    {
      $service = Service::find($id);
      $file = asset('storage/'.$service->design);


      return response()->download(public_path(). '/'.$service->design);
    //   return response()->file($file);

    }


}
