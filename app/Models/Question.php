<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['subject', 'question_text'];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function correctChoice()
    {
        return $this->hasOne(Choice::class)->where('is_correct', true);
    }
}
