<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ModelHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        // dd($categories);
        return view('backend.categories.list-categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories = Category::get();
        $products = Product::all();
        return view('backend.categories.create-update-categories',compact('parent_categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request);






        $category_created = new Category();
        $category_created['title'] = $request->title;
        $category_created['subtitle'] = $request->subtitle;
        $category_created['display']  = isset($request->display) ? $request->display : 0;
         $category_created->save();

        if ($category_created) {

            return redirect()->route('categories.index')->with('status','New Category has been Added Successfully!');

        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find(base64_decode($id));
        // $category_products = $category->category_products()->pluck('product_id')->all();
        // dd(in_array(1, $category_products));
        $parent_categories = Category::where('id', '!=', $category->id)->get();
        $products = Product::all();
        return view('backend.categories.create-update-categories',compact('category','parent_categories','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $updateArray = array(
                                "title" => $request->title,
                                "subtitle" => $request->subtitle,

                                "display" => isset($request->display) ? $request->display : 0,

                                "updated_at" => date('Y-m-d h:i:s')
                            );




        $category['display'] = $updateArray['display'];

        $category['title'] = $updateArray['title'];
        $category['subtitle'] = $updateArray['subtitle'];

        $category['updated_at'] = $updateArray['updated_at'];
        $category->save();

        if ($category) {


            // dd('test');
            return redirect()->route('categories.index')->with('status','Category Details has been Updated Successfully!');

        }else{
            return redirect()->back()->with('error','Something Went Wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = base64_decode($id);
        $category = Category::where('id' , $id)->firstOrFail();



        if ($category) {

            if ($category->child == 1) {
                return redirect()->back()->with('parent_status' , array('type' => 'danger', 'primary' => 'Sorry, Category has Child!', 'secondary' => 'Currently, It cannot be deleted.'));
            }

            $parentId = $category->parent_id;
            $oldImage = $category->image;

            // dd(count($category->products));
            // if (count($category->products) > 0) {

            //     return redirect()->back()->with('parent_status' , array('type' => 'danger', 'primary' => 'Sorry, Category has Products!', 'secondary' => 'Currently, It cannot be deleted.'));
            //     exit();
            // }

            // exit();
            if ($category->delete()) {

                $folderPath = "public/categories";

                $childCheck = Category::where('parent_id' , $parentId)->doesntExist();

                if ($childCheck) {
                    Category::where('id', $parentId)->update(["child" => 0]);
                }
            }

            return redirect()->back()->with('status', 'Category Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Something Went Wrong!');
    }

    public static function set_order(Request $request)
    {
        $has_child = $request['has_child'];
        $model = $request['model'];
        $list_order = $request['list_order'];

        $data = ModelHelper::set_order($list_order, $model, $has_child);

        echo json_encode($data);
        exit;
    }
}
