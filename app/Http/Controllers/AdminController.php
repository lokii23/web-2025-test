<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamAttempt;



class AdminController extends Controller
{
    public function examAttempts()
    {
        $attempts = ExamAttempt::with('user')->latest()->get();
        return view('admin.exam-attempts', compact('attempts'));
    }

    public function viewAttempts(Request $request)
    {
        $subjectFilter = $request->query('subject');

        $query = ExamAttempt::with('user')->latest();

        if ($subjectFilter) {
            $query->where('subject', $subjectFilter);
        }

        $attempts = $query->get();

        $subjects = ExamAttempt::select('subject')->distinct()->pluck('subject');

        return view('admin.exam-attempts', compact('attempts', 'subjects'));
    }

    public function edit($id)
    {
        $attempt = ExamAttempt::findOrFail($id);
        return view('admin.edit', compact('attempt'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'score' => 'required|integer|min:0',
        ]);

        $attempt = ExamAttempt::findOrFail($id);
        $attempt->score = $request->score;
        $attempt->save();

        return redirect()->route('admin.exam-attempts')->with('success', 'Score updated!');
    }

    public function destroy($id)
    {
        $attempt = ExamAttempt::findOrFail($id);
        $attempt->delete();

        return redirect()->route('admin.exam-attempts')->with('success', 'Attempt deleted.');
    }
}
