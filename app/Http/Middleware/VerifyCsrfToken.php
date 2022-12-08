<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    //щоб даний url був без захисту CSRF і в постмені відобразився json-формат
    protected $except = [
        /* '/post/*', */
     /*   '/login' */
    ];
}
