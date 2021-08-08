<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Product extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $fillable = [
        'prod_name',
        'sale_price',
        'user_id',
        'store_id'
    ];

    public function product_variants()
    {
        return $this->hasMany('\App\Models\ProductVariant', 'prod_id');
    }
}
