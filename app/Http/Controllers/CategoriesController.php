<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function show($id){
        $category = Category::find($id);

        if (!is_null($category)) {
            return view('frontend.category.show', compact('category'));
        }else {
            session()->flash('errors', 'Sorry !! There is no category by this ID');
            return redirect('/');
        }

    }
}
