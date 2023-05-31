<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AnswerSaran;
use App\Models\AnswerRating;
use App\Models\Question;

class AdminDashboardController extends Controller
{
    public function submitQuestion(Request $request)
{
    $request->validate([
        'question' => 'required|string',
        'usertype' => 'required|integer',
        'answer_type' => 'required|in:saran,rating',
    ]);

    // Simpan pertanyaan ke dalam database
    $question = new Question();
    $question->question = $request->input('question');
    $question->usertype = $request->input('usertype');
    $question->answer_type = $request->input('answer_type');
    $question->save();

    // Simpan jawaban ke dalam tabel yang sesuai
    if ($request->input('answer_type') === 'saran') {
        $answer = new AnswerSaran();
        $answer->saran = $request->input('saran');
        $answer->question_id = $question->id;
        $answer->save();
    } elseif ($request->input('answer_type') === 'rating') {
        $answer = new AnswerRating();
        $answer->rating = $request->input('rating');
        $answer->question_id = $question->id;
        $answer->save();
    }

    return redirect()->back()->with('success', 'Pertanyaan dan jawaban berhasil disimpan.');
}


    
}
