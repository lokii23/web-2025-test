<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Answer;
use App\Models\ExamAttempt;

class SecretPageController extends Controller
{
    public function showForm($subject)
    {
        $actionRoute = route('exam.check', ['subject' => $subject]);
        return view('exam.form', compact('actionRoute', 'subject'));
    }

    public function checkPassword(Request $request, $subject)
    {
        $request->validate([
            'password' => 'required',
        ]);

        // You can store subject-password pairs like this:
        $subjectPasswords = [
            'elective2' => 'jayann',
            'elective4' => 'oplok',
            'net101' => 'net101',
            'net102' => 'net102',
            'ipt101' => 'lebron',
            'sia101' => 'laravel',
            'ias101' => 'frame', // Add more here
        ];

        if (isset($subjectPasswords[$subject]) && $request->password === $subjectPasswords[$subject]) {
            session(["has_access_$subject" => true]);
            return redirect()->route('subject.view', ['subject' => $subject]);
        }

        return back()->withErrors(['password' => 'Wrong password!']);
    }
    
    public function showSubject($subject)
    {
        if (!session("has_access_$subject")) {
            return redirect()->route('exam.form', ['subject' => $subject])->withErrors(['password' => 'Access denied.']);
        }
        $questions = Question::with('choices')->where('subject', $subject)->get();

        return view('exam.subject.elective2', compact('questions', 'subject'));

    }

    public function submitExam(Request $request, $subject)
    {
        $score = 0;

        foreach ($request->answers as $question_id => $choice_id) {
            $choice = Choice::find($choice_id);

            // Save the answer
            Answer::create([
                'user_id' => auth()->id(),
                'question_id' => $question_id,
                'choice_id' => $choice_id,
            ]);



            if ($choice && $choice->is_correct) {
                $score++;
            }

            
            ExamAttempt::create([
                'user_id' => auth()->id(),
                'subject' => $subject,
                'score' => $score,
            ]);
        }

        return redirect()->route('exam.result', ['subject' => $subject])->with('score', $score);
    }  

}
