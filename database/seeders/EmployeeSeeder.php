<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            [
                'name' => 'Andi Saputra',
                'position' => 'Staff HRD',
                'salary' => 4500000,
                'joined_at' => '2024-01-15',
                'department' => 'HRD',
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Staff Keuangan',
                'salary' => 5000000,
                'joined_at' => '2023-06-10',
                'department' => 'Keuangan',
            ],
            [
                'name' => 'Citra Lestari',
                'position' => 'Programmer',
                'salary' => 6000000,
                'joined_at' => '2024-03-01',
                'department' => 'IT',
            ],
            [
                'name' => 'Dedi Kurniawan',
                'position' => 'Admin HRD',
                'salary' => 4000000,
                'joined_at' => '2024-05-20',
                'department' => 'HRD',
            ],
            [
                'name' => 'Eka Putri',
                'position' => 'Staff IT',
                'salary' => 5500000,
                'joined_at' => '2023-09-12',
                'department' => 'IT',
            ],
        ];

        foreach ($employees as $data) {
            $department = Department::where(
                'name',
                $data['department']
            )->firstOrFail();

            Employee::firstOrCreate(
                [
                    'name' => $data['name'],
                    'position' => $data['position'],
                ],
                [
                    'department_id' => $department->id,
                    'salary' => $data['salary'],
                    'joined_at' => $data['joined_at'],
                ]
            );
        }
    }
}
