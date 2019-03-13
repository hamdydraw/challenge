<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ClientProduct;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products']=Product::get();
        return view('home',$data);
    }
    /**
     * 
     * Add client product select to cart
     */
    public function addtocart($product_id)
    {
        $ifexist=ClientProduct::where('product_id',$product_id)
        ->where('client_id',Auth::user()->id)->first();
        if( $ifexist)
        return redirect()->back()->with('error', 'Product added before'); 
        $created=ClientProduct::create([
            'product_id'=>$product_id,
            'client_id'=>Auth::user()->id
        ]);
        
        if(!empty($created->id))
        return redirect()->back()->with('message', 'saved successfully');
        else
        return redirect()->back()->with('error', 'error!!!'); 
    }
    public function mycart()
    {
        $data['products']=ClientProduct::with('Product')->where('client_id',Auth::user()->id)->get();
        return view('mycart',$data);
    }
    
}
