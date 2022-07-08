<?php

namespace App\Models;

use App\Models\Admin\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'params',
        'sort_order',
        'factor_type',
        'factor_value',
        'is_default',
        'is_active',
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
