<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class post extends Model
{
    use HasFactory;
        
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'price',
        'text',
        'review',
        'image_url',
        'user_id'
        ];
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}

