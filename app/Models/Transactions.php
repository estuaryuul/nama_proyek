<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'user_id', 'product_id', 'quantity', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
