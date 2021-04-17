<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpportunityApply extends Model
{
    use SoftDeletes;

    protected $table = 'opportunity_apply';
    protected $primaryKey = 'opportunity_apply_id';
    protected $fillable = [
        'opportunity_id',
        'email',
        'point_result',
        'is_passed',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
