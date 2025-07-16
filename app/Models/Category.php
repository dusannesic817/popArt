<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }

    public function parent()    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive(){
        return $this->children()->with('childrenRecursive');
    }

    public function ancestors()    {
    $ancestors = collect();
    $parent = $this->parent;

    while ($parent) {
        $ancestors->prepend($parent);  
        $parent = $parent->parent;
    }

    return $ancestors;
}
}
