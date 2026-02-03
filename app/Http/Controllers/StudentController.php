<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:students,email'],
            'course' => ['required','string','max:255'],
            'year_level' => ['required','integer','min:1','max:10'],
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('status', 'Student created successfully.');
    }
}
