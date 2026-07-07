<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SchoolProfile;
use App\Models\SiteSetting;
use App\Models\News;
use App\Models\Gallery;
use App\Models\GalleryImage;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Admin Users
        $admin = User::updateOrCreate(
            ['email' => 'admin@sd.sch.id'],
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('password'),
                'role'     => 'super_admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staf@admin.com'],
            [
                'name'     => 'Staf IT',
                'password' => Hash::make('password'),
                'role'     => 'staf',
            ]
        );

        // 2. Seed School Profile
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

        // 3. Seed Site Settings
        $settings = [
            'site_name'    => 'SDN NGADIRGO 02',
            'site_email'   => 'sdn.ngadirgo02@gmail.com',
            'site_phone'   => '024-7012345',
            'site_address' => 'Jl. Ngadirgo, Mijen, Kota Semarang, Jawa Tengah',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // 4. Seed News (5 original local news)
        $newsData = [
            [
                'title' => 'Lomba Sains Antar SD Se-Provinsi Berhasil Digelar',
                'slug' => 'lomba-sains-antar-sd-se-kota-berhasil-digelar-tyyXA',
                'content' => 'Sekolah kami berhasil menyelenggarakan lomba sains tingkat kota yang diikuti oleh lebih dari 50 sekolah dasar. Para siswa menunjukkan kreativitas dan inovasi melalui berbagai eksperimen menarik.',
                'thumbnail' => 'news/lomba_sains.png',
                'status' => 'published',
                'published_at' => '2026-03-12 00:00:00',
            ],
            [
                'title' => 'Tim Basket Sekolah Juara Turnamen Regional',
                'slug' => 'tim-basket-sekolah-juara-turnamen-regional-5oF0p',
                'content' => 'Tim basket putra sekolah kami berhasil meraih juara pertama dalam turnamen basket tingkat regional setelah mengalahkan tim lawan dengan skor tipis di babak final.',
                'thumbnail' => 'news/basket_juara.png',
                'status' => 'published',
                'published_at' => '2026-02-25 00:00:00',
            ],
            [
                'title' => 'Festival Budaya Sekolah Tampilkan Keragaman Nusantara',
                'slug' => 'festival-budaya-sekolah-tampilkan-keragaman-nusantara-uFvLb',
                'content' => 'Festival budaya tahunan sekolah menampilkan berbagai pertunjukan seni, makanan tradisional, dan pameran dari seluruh kelompok siswa yang mewakili keragaman budaya Indonesia.',
                'thumbnail' => 'news/festival_budaya.png',
                'status' => 'published',
                'published_at' => '2026-01-30 00:00:00',
            ],
            [
                'title' => 'Klub Lingkungan Adakan Aksi Bersih-Bersih Sekolah',
                'slug' => 'klub-lingkungan-adakan-aksi-bersih-bersih-sekolah-q1Axt',
                'content' => 'Anggota klub lingkungan sekolah mengorganisir kegiatan bersih-bersih yang sukses di sekitar area sekolah sebagai bagian dari program peduli lingkungan.',
                'thumbnail' => 'news/bersih_sekolah.png',
                'status' => 'published',
                'published_at' => '2026-03-05 00:00:00',
            ],
            [
                'title' => 'Perpustakaan Baru Resmi Dibuka untuk Siswa',
                'slug' => 'perpustakaan-baru-resmi-dibuka-untuk-siswa-nGsOM',
                'content' => 'Sekolah meresmikan sayap perpustakaan baru yang dilengkapi dengan koleksi buku digital, ruang baca modern, dan area kolaborasi untuk mendukung kegiatan belajar siswa.',
                'thumbnail' => 'news/perpustakaan_baru.png',
                'status' => 'published',
                'published_at' => '2026-02-10 00:00:00',
            ]
        ];

        foreach ($newsData as $item) {
            News::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'user_id' => $admin->id,
                    'title' => $item['title'],
                    'content' => $item['content'],
                    'thumbnail' => $item['thumbnail'],
                    'status' => $item['status'],
                    'published_at' => $item['published_at'],
                ]
            );
        }

        // 5. Seed Galleries & Gallery Images
        $galleries = [
            [
                'id' => 1,
                'title' => 'Kegiatan Belajar Mengajar',
                'description' => 'Suasana kelas yang aktif dan menyenangkan',
                'images' => [
                    ['image_path' => 'gallery/kbm_1.png', 'caption' => 'Kegiatan Belajar Mengajar'],
                    ['image_path' => 'gallery/kbm_2.png', 'caption' => 'Kegiatan Belajar Mengajar'],
                    ['image_path' => 'gallery/kbm_3.png', 'caption' => 'Kegiatan Belajar Mengajar'],
                ]
            ],
            [
                'id' => 2,
                'title' => 'Upacara Bendera',
                'description' => 'Kegiatan upacara setiap hari Senin',
                'images' => [
                    ['image_path' => 'gallery/upacara.png', 'caption' => 'Upacara Bendera'],
                    ['image_path' => 'https://plus.unsplash.com/premium_photo-1670689708086-88f7c6c2c8d7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800', 'caption' => 'Upacara Bendera'],
                    ['image_path' => 'https://images.unsplash.com/photo-1597004455855-f2694b29bb80?auto=format&fit=crop&w=800&q=80', 'caption' => 'Upacara Bendera'],
                ]
            ],
            [
                'id' => 3,
                'title' => 'Ekstrakurikuler',
                'description' => 'Kegiatan ekskul siswa yang beragam',
                'images' => [
                    ['image_path' => 'gallery/ekskul_1.png', 'caption' => 'Ekstrakurikuler'],
                    ['image_path' => 'gallery/ekskul_2.png', 'caption' => 'Ekstrakurikuler'],
                    ['image_path' => 'gallery/ekskul_3.png', 'caption' => 'Ekstrakurikuler'],
                ]
            ],
            [
                'id' => 4,
                'title' => 'Perpustakaan Sekolah',
                'description' => 'Fasilitas perpustakaan yang lengkap',
                'images' => [
                    ['image_path' => 'gallery/perpus_1.png', 'caption' => 'Perpustakaan Sekolah'],
                    ['image_path' => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=800&q=80', 'caption' => 'Perpustakaan Sekolah'],
                    ['image_path' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80', 'caption' => 'Perpustakaan Sekolah'],
                ]
            ],
            [
                'id' => 5,
                'title' => 'Lapangan Olahraga',
                'description' => 'Area olahraga dan bermain siswa',
                'images' => [
                    ['image_path' => 'gallery/olahraga_1.png', 'caption' => 'Lapangan Olahraga'],
                    ['image_path' => 'gallery/olahraga_2.png', 'caption' => 'Lapangan Olahraga'],
                    ['image_path' => 'https://images.unsplash.com/photo-1598802213955-5610439dd5cc?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800', 'caption' => 'Lapangan Olahraga'],
                ]
            ],
            [
                'id' => 6,
                'title' => 'Taman Sekolah',
                'description' => 'Lingkungan sekolah yang asri dan hijau',
                'images' => [
                    ['image_path' => 'gallery/taman_1.png', 'caption' => 'Taman Sekolah'],
                    ['image_path' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=800&q=80', 'caption' => 'Taman Sekolah'],
                    ['image_path' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=800&q=80', 'caption' => 'Taman Sekolah'],
                ]
            ],
        ];

        foreach ($galleries as $gData) {
            $g = Gallery::updateOrCreate(
                ['id' => $gData['id']],
                [
                    'user_id'     => $admin->id,
                    'title'       => $gData['title'],
                    'description' => $gData['description'],
                ]
            );

            foreach ($gData['images'] as $img) {
                GalleryImage::updateOrCreate(
                    [
                        'gallery_id' => $g->id,
                        'image_path' => $img['image_path']
                    ],
                    [
                        'caption' => $img['caption']
                    ]
                );
            }
        }
    }
}
