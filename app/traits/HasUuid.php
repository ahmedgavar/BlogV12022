<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Boot function from Laravel.
     */
    public static function bootHasUuid()
    {
        static::creating(
            fn(Model $model) => $model->key = Str::uuid(substr(class_basename(strtolower($model)), offset:0, length:3) . '_'),
        );
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
