<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function posts()   
    {
        return $this->hasMany(Post::class);  
    }
    
    public function sales()   
    {
    return $this->hasMany(Sale::class);  
    }
    
}
