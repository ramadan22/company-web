<?php

namespace App\Models;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $table = 'question';
    protected $primaryKey = 'question_id';
    protected $fillable = [
        'opportunity_id',
        'question',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function answer()
    {
        return $this->hasMany(Answer::class, 'question_id', 'question_id');
    }
}
