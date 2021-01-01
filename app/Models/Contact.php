<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'contact_message',
        'contact_email',
        'contact_subject',
        'contact_answer',
        'contact_is_replied',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
