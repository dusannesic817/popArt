<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller{

    public function index()
    {
        $product = Product::latest()->get();
    }


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



    public function show(Product $product)
    {
        
        $categories = Category::with('children')->whereNull('parent_id')->get();


        return view('products.show',[
            'product'=>$product,
            'categories'=>$categories
        ]);
    }




    public function edit(Product $product)
    {
        $parents = Category::whereNull('parent_id')->get();

        return view ('products.edit',[
            'product'=>$product,
            'parents'=>$parents
        ]);
    }


    public function update(Request $request, Product $product)
    {
        //dd($request->all());
        if($product->user_id != auth()->id()){
            abort(403, "Unauthorized Action");
        }
       

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

        $product->update($formFields);

       return redirect()->route('profile.index')->with('status', "Post successfully edited");

    }


    public function destroy(Product $product)
    {
        if($product->user_id != auth()->id()){
            abort(403, "Unauthorized Action");
        }
       

        $product->delete(); 

        return redirect()->route('profile.index')->with('status', "Post successfully delted");

    }
}
