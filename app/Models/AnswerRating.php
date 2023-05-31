<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerRating extends Model
{
    use HasFactory;
    protected $table = 'answer_ratings'; // Nama tabel yang sesuai

    protected $fillable = [
        'rating',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
