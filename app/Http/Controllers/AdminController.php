<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamAttempt;
use App\Models\User;



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

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('usertype', 'admin')->count();
        $totalStudents = User::where('usertype', 'user')->count();

        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalAdmins', 
            'totalStudents', 
        ));
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function admins()
    {
        $users = User::where('usertype', 'admin')->get();
        return view('admin.users.index', compact('users'));
    }

    public function students()
    {
        $users = User::where('usertype', 'user')->get();
        return view('admin.users.index', compact('users'));
    }

    public function edits(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function destroys(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
    public function updates(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:admin,student',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

}
