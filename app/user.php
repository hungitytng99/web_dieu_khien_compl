<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserT extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password',
    ];
}
