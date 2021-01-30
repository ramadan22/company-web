<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Opportunity extends Model
{
    use SoftDeletes;

    protected $table = 'opportunity';
    protected $primaryKey = 'opportunity_id';
    protected $fillable = [
        'title',
        'description',
        'image',
        'point_required',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'other' => 'json'
    ];

    // json model
    // - total opportunity
    // - location
    //      - province
    //      - city
    //      - address
}
