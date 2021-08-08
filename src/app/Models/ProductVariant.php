<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class ProductVariant extends Model
{
    use HasFactory, Uuid;

    protected $table = 'product_variants';

    public $incrementing = false;

    protected $fillable = [
        'name',
        'price',
        'prod_id',
        'quantity'
    ];

    // public function team()
    // {
    //     return $this->belongsTo('App\Models\Team', 'team_id')->select(['id', 'team_name', 'dep_id']);
    // }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'prod_id');
    }
}
