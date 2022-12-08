<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ContactFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const SUBJECT = 'subject';
    public const MESSAGE = 'message';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::EMAIL => [$this, 'email'],
            self::SUBJECT => [$this, 'subject'],
            self::MESSAGE => [$this, 'message'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }

    public function subject(Builder $builder, $value)
    {
        $builder->where('subject', 'like', "%{$value}%");
    }

    public function message(Builder $builder, $value)
    {
        $builder->where('message', 'like', "%{$value}%");
    }
}