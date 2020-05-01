<?php

namespace App\Traits\Filters;

trait UserFilter
{
    protected $filterable = [
        'name', 'email',
    ];
}
