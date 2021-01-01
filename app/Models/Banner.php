<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $table = 'banner';
    protected $primaryKey = 'banner_id';
    protected $fillable = [
        'banner_title',
        'banner_description',
        'banner_image',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
