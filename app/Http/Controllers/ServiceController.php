<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use App\Http\Controllers\BaseController;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ServiceController extends BaseController
{
    public function index(){
        return view('frontend.service');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|digits:10',
            'design'=>'required',
        ], [
            'name.required' => 'Please fill your name.',
            'email.required'=>'Please fill your email address',
            'email.email'=>'Please fill the valid email address !',
            'phone.required' => 'Please fill the your mobile number !',
            'phone.digits' => 'Phone number must contain 10 digits !',
            'design.required'=>'Please select your design !',

        ]);

         try{

            $create = new Service();
            $create['name'] = $request->name;
            $create['email'] = $request->email;
            $create['mobile'] = $request->phone;


            $filename = null;
            $uploadedFile = $request->file('design');
            $filename = time().'_'. $uploadedFile->getClientOriginalName();


            Storage::disk('public')->putFileAs(
                'design',
                $uploadedFile,
                $filename
            );


            // dd($filename);


            $create['design'] = 'design/'.$filename;

            $create->save();
            return back()->with('success', 'Design submitted successfully !');
        } catch (QueryException $exception) {

            return back()->with('error', 'Error occurred while submitting, please try again')->withInput();
            // return $this->responseRedirectBack('Error occurred while creating Blog.', 'error', true, true);
        }
    }
}
