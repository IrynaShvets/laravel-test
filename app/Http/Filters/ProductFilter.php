<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const IMAGE = 'image';
    public const PRICE = 'price';
    public const DESCRIPTION = 'description';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::IMAGE => [$this, 'image'],
            self::PRICE => [$this, 'price'],
            self::DESCRIPTION => [$this, 'description'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function image(Builder $builder, $value)
    {
        $builder->where('image', 'like', "%{$value}%");
    }

    public function price(Builder $builder, $value)
    {
        $builder->where('price', 'like', "%{$value}%");
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }
}