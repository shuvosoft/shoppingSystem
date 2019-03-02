<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::latest()->get();
        return view('admin.pages.brand.create',compact('brands'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'description'=> 'required',

        ]);


        // get form image
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('brand'))
            {
                Storage::disk('public')->makeDirectory('brand');
            }
            $brand = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('brand/'.$imagename,$brand);


        } else {
            $imagename = "default.png";
        }
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;

        $brand->image = $imagename;



        $brand->save();
        return redirect()->back();
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

       $brand = Brand::find($id);

        return view('admin.pages.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:jpeg,bmp,png,jpg'
        ]);
        // get form image
        $image = $request->file('image');
        $slug = str_slug($request->name);
       $brand = Brand::find($id);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('brand'))
            {
                Storage::disk('public')->makeDirectory('brand');
            }
//            delete old image
            if (Storage::disk('public')->exists('brand/'.$brand->image))
            {
                Storage::disk('public')->delete('brand/'.$brand->image);
            }
//            resize image for category and upload
            $brandimage = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('brand/'.$imagename,$brandimage);



        } else {
            $imagename = $brand->image;
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $imagename;



        $brand->save();
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (Storage::disk('public')->exists('brand/'.$brand->image))
        {
            Storage::disk('public')->delete('brand/'.$brand->image);
        }


        $brand->delete();

        return redirect()->back();
    }
}
