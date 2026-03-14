<?php

namespace Database\Seeders;

use App\Models\Ekskul;
use App\Models\Major;
use App\Models\Organization;
use App\Models\StudentWork;
use Illuminate\Database\Seeder;

class ModuleTargetsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $this->fillMajors(5, $now);
        $this->fillEkskuls(15, $now);
        $this->fillOrganizations(17, $now);
        $this->fillStudentWorks(5, $now);
    }

    private function fillMajors(int $target, $now): void
    {
        $current = Major::count();
        $need = max(0, $target - $current);

        for ($i = 1; $i <= $need; $i++) {
            $num = $current + $i;
            Major::create([
                'nama_jurusan' => 'Jurusan ' . $num,
                'kode_jurusan' => 'JRS-' . str_pad((string) $num, 2, '0', STR_PAD_LEFT),
                'deskripsi' => 'Deskripsi jurusan ' . $num,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    private function fillEkskuls(int $target, $now): void
    {
        $current = Ekskul::count();
        $need = max(0, $target - $current);

        for ($i = 1; $i <= $need; $i++) {
            $num = $current + $i;
            Ekskul::create([
                'nama_ekskul' => 'Ekskul ' . $num,
                'pembina' => 'Pembina ' . $num,
                'jadwal' => 'Sabtu, 14:00',
                'deskripsi' => 'Deskripsi ekskul ' . $num,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    private function fillOrganizations(int $target, $now): void
    {
        $current = Organization::count();
        $need = max(0, $target - $current);

        for ($i = 1; $i <= $need; $i++) {
            $num = $current + $i;
            Organization::create([
                'name' => 'Organization ' . $num,
                'description' => 'Description for organization ' . $num,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    private function fillStudentWorks(int $target, $now): void
    {
        $current = StudentWork::count();
        $need = max(0, $target - $current);

        for ($i = 1; $i <= $need; $i++) {
            $num = $current + $i;
            StudentWork::create([
                'title' => 'Karya Siswa ' . $num,
                'title_en' => 'Student Work ' . $num,
                'content' => 'Deskripsi karya siswa ' . $num,
                'content_en' => 'Student work description ' . $num,
                'published_at' => $now->copy()->subDays($num),
                'work_name' => 'Karya Siswa ' . $num,
                'description' => 'Deskripsi karya siswa ' . $num,
                'creator_name' => 'Administrator',
                'created_date' => $now->copy()->subDays($num)->toDateString(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
