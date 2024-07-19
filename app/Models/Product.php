<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'BN',
        'exp_date',
        'Stock_Balance',
        'Rate',
        'MOU',
    ];
}
