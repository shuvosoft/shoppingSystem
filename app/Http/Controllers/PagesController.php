<?php

namespace App\Http\Controllers;


use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function products()
    {

        $products = Product::latest()->paginate(12);
        return view('layouts.frontend.product.index',compact('products'));
    }


    public function show($slug){

        $product = Product::where('slug',$slug)->first();

        if (!is_null($product)){
            return view('layouts.frontend.product.show',compact('product'));
        }else{
            session()->flash('errors','Sorry !!There is no product by this URL...');
            return redirect()->route('products');
        }

    }


    public function search(Request $request)
    {
        $search= $request->search;
        $products=Product::orWhere('title','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')
//            ->orWhere('author','like','%'.$search.'%')
//            ->orWhere('publisher','like','%'.$search.'%')
//            ->orWhere('category','like','%'.$search.'%')
            ->orWhere('price','like','%'.$search.'%')
            ->orderBy('id','desc')
            ->paginate(9);
        return view('layouts.frontend.product.search', compact('search' , 'products'));
    }



}
