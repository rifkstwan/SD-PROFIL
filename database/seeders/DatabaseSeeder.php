<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SchoolProfileSeeder::class,
        ]);

        // Seed site settings
        $settings = [
            'site_name'    => 'SDN NGADIRGO 02',
            'site_email'   => 'sdn.ngadirgo02@gmail.com',
            'site_phone'   => '024-7012345',
            'site_address' => 'Jl. Ngadirgo, Mijen, Kota Semarang, Jawa Tengah',
        ];

        foreach ($settings as $key => $value) {
            \App\Models\SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Create dummy news if there are none
        if (\App\Models\News::count() == 0) {
            $admin = \App\Models\User::where('role', 'super_admin')->first();
            if ($admin) {
                \App\Models\News::create([
                    'user_id'      => $admin->id,
                    'title'        => 'Pendaftaran Siswa Baru SDN Ngadirgo 02 Tahun Ajaran 2026/2027',
                    'slug'         => 'pendaftaran-siswa-baru-sdn-ngadirgo-02-tahun-ajaran-2026-2027',
                    'content'      => 'SDN Ngadirgo 02 dengan bangga membuka pendaftaran bagi calon peserta didik baru untuk tahun ajaran 2026/2027. Kami berkomitmen untuk mendampingi putra-putri Anda dalam mengeksplorasi potensi terbaik mereka.',
                    'status'       => 'published',
                    'published_at' => now(),
                ]);

                \App\Models\News::create([
                    'user_id'      => $admin->id,
                    'title'        => 'Prestasi Juara 1 Lomba Cerdas Cermat Tingkat Kota',
                    'slug'         => 'prestasi-juara-1-lomba-cerdas-cermat-tingkat-kota',
                    'content'      => 'Siswa-siswi SDN Ngadirgo 02 berhasil meraih Juara 1 dalam ajang Lomba Cerdas Cermat tingkat Kota Semarang. Selamat kepada tim sekolah yang telah berjuang keras mengharumkan nama sekolah!',
                    'status'       => 'published',
                    'published_at' => now()->subDays(2),
                ]);
            }
        }
    }
}

