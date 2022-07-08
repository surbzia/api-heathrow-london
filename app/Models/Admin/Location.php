<?php

namespace App\Models\Admin;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $with = ['category'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
