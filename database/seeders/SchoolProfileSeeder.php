<?php

namespace Database\Seeders;

use App\Models\SchoolProfile;
use Illuminate\Database\Seeder;

class SchoolProfileSeeder extends Seeder
{
    public function run(): void
    {
        SchoolProfile::updateOrCreate(
            ['id' => 1],
            [
                'name'        => 'SDN NGADIRGO 02',
                'description' => 'Berdiri dengan tekad kuat dari para pendidik berdedikasi, sekolah kami hadir dengan misi sederhana: menciptakan lingkungan yang nyaman di mana setiap siswa dapat mengeksplorasi, belajar, dan tumbuh menjadi pribadi terbaik mereka.',
                'address'     => 'Jl. Ngadirgo, Mijen, Kota Semarang, Jawa Tengah',
                'phone'       => '024-7012345',
                'email'       => 'sdn.ngadirgo02@gmail.com',
                'logo'        => null,
            ]
        );
    }
}
