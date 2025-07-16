<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

    $products = Product::select('id','title','price','image')->latest()->get();
    $categories = Category::with('children')->whereNull('parent_id')->get();


       

        return view('home', [

            'products'=>$products,
            'categories'=>$categories

        ]);
    }
}
