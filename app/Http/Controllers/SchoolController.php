<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        return School::with('campuses')->paginate(20);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'registration_number' => ['nullable', 'string', 'max:255'],
            'school_type' => ['required', 'in:primary,secondary,combined'],
            'ownership_type' => ['required', 'in:private,public'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'state' => ['nullable', 'string', 'max:100'],
            'lga' => ['nullable', 'string', 'max:120'],
        ]);

        return School::create($data);
    }

    public function show(School $school)
    {
        return $school->load('campuses');
    }

    public function update(Request $request, School $school)
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'registration_number' => ['nullable', 'string', 'max:255'],
            'school_type' => ['sometimes', 'in:primary,secondary,combined'],
            'ownership_type' => ['sometimes', 'in:private,public'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'state' => ['nullable', 'string', 'max:100'],
            'lga' => ['nullable', 'string', 'max:120'],
        ]);

        $school->update($data);

        return $school->refresh();
    }

    public function destroy(School $school)
    {
        $school->delete();

        return response()->noContent();
    }
}
