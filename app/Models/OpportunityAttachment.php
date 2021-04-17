<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpportunityAttachment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'opportunity_attachment';
    protected $primaryKey = 'opportunity_attachment_id';
    protected $fillable = [
        'opportunity_id',
        'user_id',
        'file',
        'original_name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
