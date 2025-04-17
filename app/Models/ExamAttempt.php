<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    protected $fillable = ['user_id', 'subject', 'score'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
