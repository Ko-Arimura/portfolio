<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Cloudinary;
use App\Models\Product;
use App\Models\Category;
class SaleController extends Controller
{
    public function index(Sale $sale)
    {
        return view('sales.index')->with(['sales' => $sale->getPaginateByLimit(1)]);  
    }
    public function create(Category $category , Product $product )
    {
    return view('sales.create')->with(['categories' => $category->get() ,'products' =>$product->get()]);
    }
    
    public function store(Request $request, Sale $sale)
{
    $input = $request['sale'];
    $product->name =$input["name"];
    $product->flavor =$input["flavor"];
    $product->category_id =$input["category_id"];
    $product->save();
    
    $sale->title = $input["title"];
    $sale->price =$input["price"];
    $sale->url =$input["url"];
    $sale->product_id =$product->id;
    $sale->user_id = Auth::id();
    if(!empty($sale->image_url)){
    $post->image_url =Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
    }
    
    
    // $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
    // $input += ['image_url' => $image_url]; 
    // $input += ['user_id' => $request->user()->id];  
    // $sale->fill($input)->save();
    return redirect('/sales/' . $sale->id);
}

public function show(Sale $sale)
{
    return view('sales.show')->with(['sale' => $sale]);
}
}
