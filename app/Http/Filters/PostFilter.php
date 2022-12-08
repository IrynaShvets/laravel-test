<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const POST = 'post';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::POST => [$this, 'post'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function post(Builder $builder, $value)
    {
        $builder->where('post', 'like', "%{$value}%");
    }
}