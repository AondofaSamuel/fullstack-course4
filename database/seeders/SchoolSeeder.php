<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\ClassLevel;
use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        $school = School::create([
            'name' => 'Sunrise Scholars Academy',
            'registration_number' => 'LAG-PRI-2024-001',
            'school_type' => 'combined',
            'ownership_type' => 'private',
            'email' => 'info@sunrisescholars.ng',
            'phone' => '+234-802-000-0000',
            'address' => '12 Unity Road, Ikeja',
            'state' => 'Lagos',
            'lga' => 'Ikeja',
        ]);

        $campus = Campus::create([
            'school_id' => $school->id,
            'name' => 'Ikeja Campus',
            'address' => '12 Unity Road, Ikeja',
            'state' => 'Lagos',
            'lga' => 'Ikeja',
            'phone' => '+234-802-000-0000',
            'email' => 'ikeja@sunrisescholars.ng',
        ]);

        $levels = [
            ['Primary 1', 'primary', 1],
            ['Primary 2', 'primary', 2],
            ['JSS 1', 'secondary', 7],
            ['JSS 2', 'secondary', 8],
        ];

        foreach ($levels as [$name, $section, $order]) {
            ClassLevel::create([
                'campus_id' => $campus->id,
                'name' => $name,
                'section' => $section,
                'order' => $order,
            ]);
        }
    }
}
