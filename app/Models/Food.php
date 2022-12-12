<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name', 'description', 'ingredients', 'price', 'rate', 'types',
        'picturePath'
    ];
    
    public function getCreateAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
    
    public function getUpdateAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
    
    public function toArray()
    {
        $toArray = parnet::toArray();
        $toArray['picturePath'] = $this->picturePath;
        return $toArray;
    }
    
    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['picturePath']);
    }
}
