<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'category_id',
    'title',
    'description',
    'price',
    'image',
    'condition'
    
    
];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $filters){
        
       if ($filters['search'] ?? false) {
            $search = $filters['search'];

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('price', 'like', "%$search%")
                ->orWhereHas('category', function ($join) use ($search) {
                  $join->where('name', 'like', "%$search%");
                })
                ->orWhereHas('user', function ($join) use ($search) {
                  $join->where('location', 'like', "%$search%");
                });
            });
        }
    }
}
