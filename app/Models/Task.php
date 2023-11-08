<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function userAssign()
    {
        return $this->belongsTo(User::class, 'user_assign_task', 'id');
    }

    public function userCreate()
    {
        return $this->belongsTo(User::class, 'user_create_task', 'id');
    }
}
