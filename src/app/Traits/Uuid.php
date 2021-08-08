<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            //$id = hexdec(uniqid());
            $id = Str::uuid();
            $model->{$model->getKeyName()} = $id;
        });
    }
}
