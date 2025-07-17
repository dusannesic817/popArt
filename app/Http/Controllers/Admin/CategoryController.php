<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('admin.categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    public function subcategory(){

       $parents = Category::whereNull('parent_id')->get();
        return view('admin.categories.subcategory',['parents'=>$parents]);
    }

    public function storeSubcategory(Request $request){

        if (!auth()->user()->is_admin) {
            abort(403, 'No ristrict');
        }
        
        $fields = $request->validate([
            'name' => ['required', 'string', 'unique:categories,name'],
            'parent_id'=>'required'
        ]);

        Category::create($fields);
        return redirect()->route('admin.categories.index')->with('status', "Category successfully created");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         if (!auth()->user()->is_admin) {
            abort(403, 'No ristrict');
        }
        
        $fields = $request->validate([
            'name' => ['required', 'string', 'unique:categories,name'],
        ]);

        Category::create($fields);
        return redirect()->route('admin.categories.index')->with('status', "Category successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
