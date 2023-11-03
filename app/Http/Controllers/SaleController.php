<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Cloudinary;  
class SaleController extends Controller
{
    public function index(Sale $sale)
    {
        return view('sales.index')->with(['sales' => $sale->getPaginateByLimit(1)]);  
    }
    public function create()
    {
    return view('sales.create');
    }
    
    public function store(Request $request, Sale $sale)
{
    $input = $request['sale'];
    $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
    $input += ['image_url' => $image_url]; 
    $input += ['user_id' => $request->user()->id];  
    $sale->fill($input)->save();
    return redirect('/sales/' . $sale->id);
}
public function show(Sale $sale)
{
    return view('sales.show')->with(['sale' => $sale]);
}
}
