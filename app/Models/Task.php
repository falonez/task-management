<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Task extends Model
{
    use LogsActivity;

    protected $fillable = ['title', 'description', 'urgency', 'duration', 'deadline', 'user_assign_task', 'user_create_task'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logFillable()->useLogName('task_log');
        // Chain fluent methods for configuration options
    }

    public function userAssign()
    {
        return $this->belongsTo(User::class, 'user_assign_task', 'id');
    }

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'user_create_task', 'id');
    }
}
