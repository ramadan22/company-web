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
        'detail',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    static function log($user_id, $description = '', $request)
    {
        $activity = new LogActivity();
        $activity->user_id = $user_id;
        $activity->description = $description;
        $activity->detail = 'IP Address ' . $request->ip();
        $activity->created_at = date('Y-m-d H:i:s');
        $activity->updated_at = date('Y-m-d H:i:s');
        $activity->save();
    }
}
