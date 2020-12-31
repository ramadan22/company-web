<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes;

    protected $table = 'about_us';
    protected $primaryKey = 'about_id';
    protected $fillable = [
        'about_content',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $casts = [
        'about_content' => 'array'
    ];

}
