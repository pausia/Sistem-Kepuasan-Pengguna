<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerSaran extends Model
{
    use HasFactory;
    protected $table = 'answer_sarans'; // Nama tabel yang sesuai

    protected $fillable = [
        'saran',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
