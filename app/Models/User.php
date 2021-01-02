<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
        'user_address',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $hidden = [
        'user_password'
    ];
}
