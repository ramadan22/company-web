<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogActivity extends Model
{
    use SoftDeletes;

    protected $table = 'log_activity';
    protected $primaryKey = 'log_activity_id';
    protected $fillable = [
        'description',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public static function log($user, $description = '')
    {
        LogActivity::insert([
            'user_id' => $user->user_id,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
