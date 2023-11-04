<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory()->create([
            'name' => 'student',
            'nim' => '00000000000',
            'email' => 'student@host.local',
            'password' => 'student',
        ]);
    }
}
