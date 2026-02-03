<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::with(['school', 'campus'])->paginate(25);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'school_id' => ['required', 'exists:schools,id'],
            'campus_id' => ['required', 'exists:campuses,id'],
            'admission_number' => ['required', 'string', 'max:50', 'unique:students,admission_number'],
            'first_name' => ['required', 'string', 'max:120'],
            'last_name' => ['required', 'string', 'max:120'],
            'other_names' => ['nullable', 'string', 'max:120'],
            'gender' => ['required', 'in:male,female'],
            'date_of_birth' => ['nullable', 'date'],
            'state_of_origin' => ['nullable', 'string', 'max:120'],
            'lga_of_origin' => ['nullable', 'string', 'max:120'],
            'address' => ['nullable', 'string'],
        ]);

        return Student::create($data);
    }

    public function show(Student $student)
    {
        return $student->load(['school', 'campus', 'enrollments']);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'campus_id' => ['sometimes', 'exists:campuses,id'],
            'admission_number' => ['sometimes', 'string', 'max:50', 'unique:students,admission_number,' . $student->id],
            'first_name' => ['sometimes', 'string', 'max:120'],
            'last_name' => ['sometimes', 'string', 'max:120'],
            'other_names' => ['nullable', 'string', 'max:120'],
            'gender' => ['sometimes', 'in:male,female'],
            'date_of_birth' => ['nullable', 'date'],
            'state_of_origin' => ['nullable', 'string', 'max:120'],
            'lga_of_origin' => ['nullable', 'string', 'max:120'],
            'address' => ['nullable', 'string'],
        ]);

        $student->update($data);

        return $student->refresh();
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->noContent();
    }
}
