<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load('childrenRecursive');
        $cateogries_id = $this->getAllCategoryIds($category);
        $products = Product::whereIn('category_id', $cateogries_id)->get();


        $children = Category::where('parent_id', $category->id)->get();
        $breadcrumbs = $category->ancestors()->push($category); // Dodaj i samu kategoriju na kraj
        
        return view('categories.show',[
            'products'=>$products,
            'children' =>$children,
            'breadcrumbs'=> $breadcrumbs
        ]);
    }



    public function edit(Category $category)
    {
        //
    }


    public function update(Request $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        
    }


    private function getAllCategoryIds(Category $category){

        $array = [$category->id];
        foreach ($category->children as $child) {
            $array = array_merge($array, $this->getAllCategoryIds($child));
        }
        return $array;
    }
}
