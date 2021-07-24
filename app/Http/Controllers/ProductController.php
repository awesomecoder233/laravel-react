<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //Display a listing of the resource
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
    
    //store a newly created resource in storage
    public function store(Request $request)
    {
        $product = new Product([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $product->save();
        return response()->json('product Added Successfully');
    }

    //show the form for editing the specified resource
    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
    
    //update the specified resource in storage
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->get('title');
        $prodyuct->body = $request->get('body');
        $product->save();

        return response()->json('Product Update Successfully');
    }

    //Remove the specified resource from storage
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Product deleted successfully');
    }
}
