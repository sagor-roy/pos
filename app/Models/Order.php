<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'payment_method',
        'qty',
        'total',
        'pay',
        'due',
        'status',
    ];

    public function cus() {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
