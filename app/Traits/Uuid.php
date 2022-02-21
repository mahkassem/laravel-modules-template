<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    protected static function bootUuid()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = app()->environment('production') ? Str::orderedUuid() : str_replace('-', '', (string) Str::orderedUuid());
            }
        });
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
