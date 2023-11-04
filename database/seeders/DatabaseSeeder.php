<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Administrator;
use App\Models\Faculty;
use App\Models\Operator;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\RegistrarStatus;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Administrator::factory()->create([
            'name' => 'super',
            'role' => 'super_administrator',
            // 'email' => 'super@host.local',
            'password' => 'super',
        ]);
        Administrator::factory()->create([
            'name' => 'admin',
            'role' => 'administrator',
            // 'email' => 'admin@host.local',
            'password' => 'admin',
        ]);
        $faculties = [
            'Sains dan Teknologi' => [
                'Sistem Informasi',
                'Teknik Informatika',
                'Perencanaan Wilayah dan Kota',
                'Fisika',
                'Matematika',
                'Kimia',
                'Biologi',
                'Arsitektur',
                'Ilmu Peternakan',
            ],
            'Dakwah dan Komunikasi' => [
                'Komunikasi Dan Penyiaran Islam',
                'Bimbingan Dan Penyuluhan Islam',
                'Pengembangan Masyarakat Islam',
                'Manajemen Dakwah',
                'Jurnalistik',
                'Ilmu Komunikasi',
                'Manajemen Haji Dan Umroh',
                'Kesejahtraan Sosial',
            ],
            'Syariah dan Hukum' => [
                'Hukum Keluarga Islam',
                'Hukum Ketatanegaraan',
                'Perbandingan Mazhab Dan Hukum',
                'Ilmu Hukum',
                'Ilmu Falaq',
                'Hukum Ekonomi Syariah',
            ],
            'Tarbiyah dan Keguruan' => [
                'Pendidikan Agama Islam',
                'Pendidikan Bahasa Arab',
                'Pendidikan Bahasa Inggris',
                'Manajemen Pendidikan Islam',
                'Pendidikan Matematika',
                'Pendidikan Fisika',
                'Pendidikan Guru Madrasah Ibtidaiyah',
                'Pendidikan Islam Anak Usia Dini',
                'Pendidikan Biologi',
            ],
            'Ushuluddin dan Filsafat' => [
                "Studi Agama-Agama",
                "Akidah Dan Filsafat Islam",
                "Sosiologi Agama",
                "Ilmu Hadis",
                "Ilmu al-Qur'an dan Tafsir",
                "Ilmu Politik",
                "Hubungan Internasional",
            ],
            'Adab dan Humaiora' => [
                'Bahasa dan Sastra Arab',
                'Sejarah Peradaban Islam',
                'Bahasa dan Sastra Inggris',
                'Ilmu Perpustakaan',
            ],
            'Kedokteran dan Ilmu Kesehatan' => [
                'Kesehatan Masyarakat',
                'Keperawatan',
                'Farmasi',
                'Kebidanan (D3)',
                'Pendidikan Dokter',
            ],
            'Ekonomi dan Bisnis Islam' => [
                'Akuntansi',
                'Ekonomi Islam',
                'Manajemen',
                'Ilmu Ekonomi',
                'Perbankan Syariah',
            ],
        ];
        foreach ($faculties as $faculty => $departments) {
            Faculty::factory()->create([
                'name' => $faculty,
                'departments' => $departments,
            ]);
        }

        if (env('APP_ENV') == 'local') {
            Operator::factory()->create([
                'name' => 'faculty',
                'department' => 'faculty',
                'faculty' => "Sains dan Teknologi",
                // 'email' => 'faculty@host.local',
                'password' => 'faculty',
            ]);
            Operator::factory()->create([
                'name' => 'academic',
                'department' => 'academic',
                // 'email' => 'academic@host.local',
                'password' => 'academic',
            ]);
            Student::factory()->create([
                // 'name' => 'student',
                'nim' => '00000000000',
                // 'email' => 'student@host.local',
                'password' => 'student',
            ]);

            $quota = Quota::factory()->create([
                'quota' => 90,
                'status' => 'open',
            ]);
            Quota::factory()->create([
                'quota' => 10,
                'status' => 'close',
            ]);
            Registrar::factory()
                ->count(100)
                ->state(new Sequence(
                    ['status' => RegistrarStatus::Validate->value],
                    ['status' => RegistrarStatus::Revision->value],
                    ['status' => RegistrarStatus::Revalidate->value],
                    ['status' => RegistrarStatus::Validated->value],
                ))
                ->state(new Sequence(
                    ['faculty' => "Sains dan Teknologi", 'study_program' => 'Sistem Informasi'],
                    ['faculty' => "Sains dan Teknologi", 'study_program' => 'Teknik Informatika'],
                    ['faculty' => 'Ekonomi dan Bisnis Islam', 'study_program' => 'Ekonomi Syariah'],
                    ['faculty' => 'Ekonomi dan Bisnis Islam', 'study_program' => 'Perbankan Syariah'],
                ))
                ->for(Student::factory())
                ->create([
                    'quota_id' => $quota->id,
                ]);
        }
    }
}
