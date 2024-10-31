<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $count = $request->get('count', 10);
        $search = $request->get('search', '');
        $status = $request->get('status', '');
        $count = min(50, max(5, $count));

        $students = Student::when($search, fn($query) => $query->where(
            'name',
            'like',
            '%' . $search . '%'
        ))
            ->when($status, fn($query) => $query->where('status', $status))
            ->paginate($count)
            ->withQueryString();

        return view('lecturer.students.index', [
            'students' => $students,
            'count' => $count,
            'search' => $search,
            'status' => $status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $courses = $student->load('courses');

        return view('lecturer.students.show', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Confirm the specified resource in storage.
     */
    public function confirm(Request $request, Student $student)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,accepted,rejected'],
        ]);
        if ($validated === false) return redirect()->back()->withErrors($request->errors());

        $student->update([
            'status' => $request->get('status')
        ]);
        return redirect()->route('students.show', $student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
