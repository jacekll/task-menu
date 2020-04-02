<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'field',
    ];

    protected $visible = [
        'id',
        'field',
    ];
}
