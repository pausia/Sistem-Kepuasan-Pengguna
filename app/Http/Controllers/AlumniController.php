<?php

namespace App\Http\Controllers;
use App\Models\AnswerSaran;
use App\Models\AnswerRating;
use App\Models\Question;

use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function Index()
    {
        $usertype = auth()->user()->usertype;
        $questions = Question::where('usertype', $usertype)->get();
        return view('user.dosen', compact('questions', 'usertype'));
    }
    public function submitAnswer(Request $request)
    {
        $request->validate([
            'question_id' => 'required|array',
            'question_id.*' => 'exists:questions,id',
        ]);

        $questionIds = $request->input('question_id');

        foreach ($questionIds as $questionId) {
            $question = Question::find($questionId);

            if ($question) {
                if ($question->answer_type === 'saran') {
                    $answerSaran = new AnswerSaran();
                    $answerSaran->saran = $request->input('answer_saran.' . $questionId);
                    $answerSaran->question_id = $questionId;
                    $answerSaran->save();
                } elseif ($question->answer_type === 'rating') {
                    $answerRating = new AnswerRating();
                    $answerRating->rating = $request->input('answer_rating.' . $questionId);
                    $answerRating->question_id = $questionId;
                    $answerRating->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Jawaban berhasil disimpan.');
    }
}
