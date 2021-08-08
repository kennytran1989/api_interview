<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Store extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;

    protected $fillable = [
        'store_name',
        'user_id'
    ];

    // public function department()
    // {
    //     return $this->belongsTo('App\Models\Department', 'dep_id')->select(['id', 'dep_name']);
    // }

    // public function TeamMember()
    // {
    //     return $this->hasMany('App\Models\TeamMember', 'team_id');
    // }
}
