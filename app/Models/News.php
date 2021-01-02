<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';
    protected $primaryKey = 'news_id';
    protected $fillable = [
        'news_title',
        'news_content',
        'news_image',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
