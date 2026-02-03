<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        return Enrollment::with(['student', 'classArm.classLevel', 'term'])->paginate(25);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'class_arm_id' => ['required', 'exists:class_arms,id'],
            'term_id' => ['required', 'exists:terms,id'],
            'status' => ['nullable', 'in:active,promoted,withdrawn'],
            'enrolled_on' => ['nullable', 'date'],
        ]);

        return Enrollment::create($data);
    }

    public function show(Enrollment $enrollment)
    {
        return $enrollment->load(['student', 'classArm.classLevel', 'term']);
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $data = $request->validate([
            'class_arm_id' => ['sometimes', 'exists:class_arms,id'],
            'status' => ['sometimes', 'in:active,promoted,withdrawn'],
            'enrolled_on' => ['nullable', 'date'],
        ]);

        $enrollment->update($data);

        return $enrollment->refresh();
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();

        return response()->noContent();
    }
}
