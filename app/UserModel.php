<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table="user";

    protected $fillable=[
        'username',
        'password',
        'status_id',
        'api_token',
    ];
}
