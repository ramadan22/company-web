<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_name',
        'admin_email',
        'admin_password',
        'admin_address',
        'admin_photo',
        'admin_description',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
