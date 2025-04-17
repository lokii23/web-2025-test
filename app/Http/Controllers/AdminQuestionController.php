<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
{
    public function create()
    {
        return view('admin.create-question');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'question_text' => 'required|string',
            'choices' => 'required|array|min:4',
            'correct_choice' => 'required|in:0,1,2,3',
        ]);

        $question = Question::create([
            'subject' => $request->subject,
            'question_text' => $request->question_text,
        ]);

        foreach ($request->choices as $index => $text) {
            $question->choices()->create([
                'choice_text' => $text,
                'is_correct' => $index == $request->correct_choice,
            ]);
        }

        return redirect()->back()->with('success', 'Question created successfully!');
    }
}
