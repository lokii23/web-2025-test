<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'sia' => 'laravel',
            'ias' => 'frame', // Add more here
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

        return view("exam.subject.$subject");
    }

}
