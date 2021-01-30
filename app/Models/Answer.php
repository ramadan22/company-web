<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $table = 'answer';
    protected $primaryKey = 'answer_id';
    protected $fillable = [
        'question_id',
        'answer',
        'point',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
