<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['product_id', 'quantity', 'date', 'remarks'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;
}
