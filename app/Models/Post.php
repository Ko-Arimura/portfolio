<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function likes()
    {
      return $this->hasMany(Like::class, 'post_id');
    }
    
    protected $fillable = [
        'price',
        'text',
        'review',
        'image_url',
        'user_id',
        'product_id',
        ];
        
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // いいね機能
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        $likers = array();
        
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
            
        }
        
        if (in_array($id, $likers)) {
            return true;
            
        } else {
            return false;
            
        }
        
    }
}

