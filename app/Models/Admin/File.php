<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $appends = ['full_url', 'created_at_formatted'];
    protected $fillable = [
        'url', 'fileable_id', 'fileable_type', 'table_name', 'extension',
    ];
    public function fileable()
    {
        return $this->morphTo();
    }
    public function getFullUrlAttribute()
    {
        return image_url($this->url);
    }
    public function getCreatedAtFormattedAttribute()
    {
        return date('Y-m-d h:i a', strtotime($this->created_at));
    }
}
