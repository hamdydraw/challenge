<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Product;
use App\ClientProduct;
use Auth;
class ProductController extends Controller
{
    /**
     * add new product
     */
    public function create()
    {
        return view('products.add');
    }
    /**
     * 
     * save new product
     */
    public function store(Request $request)
    {
      $this->validate($request, [ 
       'title'=>  'required|max:255',
       'model'=>  'required|max:255',
       'description'=>  'required|max:255',
       'price'=>  'required|max:255',
        ]);  
        $created=Product::create([
            'title'=>$request->title,
            'model'=>$request->model,
            'description'=>$request->description,
            'price'=>$request->price
        ]);
        if(!empty($created->id))
        return redirect()->back()->with('message', 'saved successfully');
        else
        return redirect()->back()->with('error', 'error!!!'); 
    }
   


}
