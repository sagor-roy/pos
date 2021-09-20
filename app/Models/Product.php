<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cate_id',
        'name',
        'code',
        'price',
        'img',
    ];

    public function cate() {
        return $this->belongsTo(Category::class,'cate_id');
    }
}
