<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardMetricsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $studentTarget = 520;
        $studentCurrent = DB::table('students')->count();
        $studentNeed = max(0, $studentTarget - $studentCurrent);

        if ($studentNeed > 0) {
            $rows = [];
            for ($i = 1; $i <= $studentNeed; $i++) {
                $uniq = $studentCurrent + $i;
                $rows[] = [
                    'full_name' => 'Student Dummy ' . $uniq,
                    'birth_date' => '2008-01-01',
                    'gender' => ($uniq % 2 === 0) ? 'Female' : 'Male',
                    'address' => 'Jl. Contoh No. ' . $uniq,
                    'phone' => '0812' . str_pad((string) $uniq, 8, '0', STR_PAD_LEFT),
                    'email' => 'student_dummy_' . $uniq . '@example.com',
                    'created_at' => $now,
                    'updated_at' => $now,
                ];

                if (count($rows) === 500) {
                    DB::table('students')->insert($rows);
                    $rows = [];
                }
            }

            if (!empty($rows)) {
                DB::table('students')->insert($rows);
            }
        }

        $pendingTarget = 60;
        $pendingCurrent = DB::table('registrations')->where('status', 'pending')->count();
        $pendingNeed = max(0, $pendingTarget - $pendingCurrent);

        $monthTarget = 50;
        $monthCurrent = DB::table('registrations')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->count();
        $monthNeed = max(0, $monthTarget - $monthCurrent);

        $monthToCreate = min($pendingNeed, $monthNeed);
        $olderToCreate = max(0, $pendingNeed - $monthToCreate);
        $baseReg = DB::table('registrations')->count() + 1;

        $regRows = [];

        for ($i = 0; $i < $monthToCreate; $i++) {
            $idx = $baseReg + $i;
            $regRows[] = [
                'full_name' => 'PPDB Pending ' . $idx,
                'birth_date' => '2010-01-01',
                'gender' => ($idx % 2 === 0) ? 'Female' : 'Male',
                'address' => 'Alamat PPDB ' . $idx,
                'phone' => '0821' . str_pad((string) $idx, 8, '0', STR_PAD_LEFT),
                'email' => 'ppdb_pending_' . $idx . '@example.com',
                'status' => 'pending',
                'created_at' => $now->copy()->subDays(rand(0, 20)),
                'updated_at' => $now,
            ];
        }

        for ($j = 0; $j < $olderToCreate; $j++) {
            $idx = $baseReg + $monthToCreate + $j;
            $olderDate = $now->copy()->subMonth()->startOfMonth()->addDays(rand(0, 20));
            $regRows[] = [
                'full_name' => 'PPDB Pending ' . $idx,
                'birth_date' => '2010-01-01',
                'gender' => ($idx % 2 === 0) ? 'Female' : 'Male',
                'address' => 'Alamat PPDB ' . $idx,
                'phone' => '0822' . str_pad((string) $idx, 8, '0', STR_PAD_LEFT),
                'email' => 'ppdb_pending_' . $idx . '@example.com',
                'status' => 'pending',
                'created_at' => $olderDate,
                'updated_at' => $now,
            ];
        }

        if (!empty($regRows)) {
            DB::table('registrations')->insert($regRows);
        }

        $monthCurrentAfter = DB::table('registrations')
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->count();

        $monthDeficit = max(0, $monthTarget - $monthCurrentAfter);

        if ($monthDeficit > 0) {
            $candidateIds = DB::table('registrations')
                ->where('status', 'pending')
                ->where(function ($query) use ($now) {
                    $query->whereYear('created_at', '!=', $now->year)
                        ->orWhereMonth('created_at', '!=', $now->month);
                })
                ->orderBy('id')
                ->limit($monthDeficit)
                ->pluck('id');

            foreach ($candidateIds as $idx => $id) {
                $newDate = $now->copy()->startOfMonth()->addDays($idx % max(1, $now->day));
                DB::table('registrations')->where('id', $id)->update([
                    'created_at' => $newDate,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
