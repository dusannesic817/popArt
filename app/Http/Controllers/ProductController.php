<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::whereNull('parent_id')->get();

       
        return view('products.create',[
            'parents'=>$parents
        ]);
    }


   public function store(Request $request)
{
        $formFields = $request->validate([
            'category_id' => 'required',
            'title' => ['required', 'string', 'max:100'],
            'description' => 'required',
            'price' => ['required', 'numeric'],
            'condition' => 'required',
        ]);

        if ($request->hasFile('image')) {
            
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Product::create($formFields);

        return redirect('/')->with('status', "Post successfully created");
}


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //$produc = Product::with(['user', 'category'])->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();


        return view('products.show',[
            'product'=>$product,
            'categories'=>$categories
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
