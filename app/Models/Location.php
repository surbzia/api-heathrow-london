<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'post_code',
        'is_active',
        'full_address',
        'category_id',
        'sort_order',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
