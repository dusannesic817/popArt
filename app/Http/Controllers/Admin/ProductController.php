<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {

       $products = Product::with('user','category')->latest()->paginate(20);

        return view('admin.products.index',[
            'products'=>$products
        ]);
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

        return redirect('admin.products.index')->with('status', "Post successfully created");
    }

 
    public function show(string $id)
    {
       
    }

 
    public function edit(string $id)
    {

        $product = Product::find($id);
        $parents = Category::whereNull('parent_id')->get();

        return view('admin.products.edit', [
            'product' => $product,
            'parents' => $parents
        ]);
       
    }


    public function update(Request $request, string $id)

    {
        $product=Product::find($id);

        if (!auth()->user()->is_admin) {
            abort(403, 'No ristrict');
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

        return redirect()->route('admin.products.index')->with('status', "Post successfully edited");

    }


    public function destroy(string $id)
    {
        $product=Product::find($id);

         if (!auth()->user()->is_admin) {
            abort(403, 'No ristrict');
        }
        $product->delete(); 

        return redirect()->route('admin.products.index')->with('status', "Post successfully deleted");
    }
}
