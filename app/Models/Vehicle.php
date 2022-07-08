<?php

namespace App\Models;

use App\Models\Admin\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $with = ['file'];
    protected $fillable = [
        'name',
        'description',
        'disable_info',
        'max_vehicle_amount',
        'passengers',
        'luggage',
        'hand_luggage',
        'child_seats',
        'baby_seats',
        'wheel_chairs',
        'is_default',
        'is_active',
        'sort_order',
    ];

    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function getImageUrlAttribute()
    {
        if ($this->file) {
            return $this->file->full_url;
        } else {
            return 'https://www.beelights.gr/assets/images/empty-image.png';
        }
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
