<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    protected $fillable = [
        'question',
        'usertype',
        'answer_type',
    ];

    // Relasi dengan model Answer
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
}
