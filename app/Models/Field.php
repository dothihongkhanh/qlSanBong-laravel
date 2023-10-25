<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'field';
    protected $fillable = [
        'name_field',
        'description',
        'address',
        'locate',
        'time_open',
        'time_close',
        'price',
        'avt',
    ];
}
