<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PrestasiController extends Controller
{
    public function index()
    {
        // Data dummy untuk prestasi
        $prestasiList = [
            [
                'id' => 1,
                'title_line1' => 'Juara 1',
                'title_line2' => 'Olimpiade Matematika',
                'title' => 'Juara 1 Olimpiade Matematika Nasional',
                'description' => 'Prestasi membanggakan di bidang akademik. Siswa kami berhasil meraih medali emas pada ajang Olimpiade Matematika tingkat Nasional.',
                'image' => 'https://images.unsplash.com/photo-1636466497217-26a8cbeaf0aa?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Akademik',
                'date' => '2024',
                'student_name' => 'Tirta Pratama'
            ],
            [
                'id' => 2,
                'title_line1' => 'Juara 2',
                'title_line2' => 'Debat Bahasa Inggris',
                'title' => 'Juara 2 Lomba Debat Bahasa Inggris Provinsi',
                'description' => 'Tim perwakilan sekolah menunjukkan kemampuan argumentasi dan bahasa Inggris yang luar biasa di ajang lomba debat tingkat provinsi.',
                'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Bahasa',
                'date' => '2025',
                'student_name' => 'Karen Alexia'
            ],
            [
                'id' => 3,
                'title_line1' => 'Juara 1',
                'title_line2' => 'Kompetisi Catur',
                'title' => 'Juara 1 Kompetisi Catur Nasional',
                'description' => 'Berpikir strategis dan tenang di bawah tekanan, siswa kami berhasil mengalahkan lawan-lawan tangguh dari seluruh negeri pada kompetisi catur nasional.',
                'image' => 'https://images.unsplash.com/photo-1774128323231-5e538407bda9?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Olahraga & Strategi',
                'date' => '2024',
                'student_name' => 'Tirta Pratama'
            ],
            [
                'id' => 4,
                'title_line1' => 'Juara 3',
                'title_line2' => 'Karya Tulis Ilmiah',
                'title' => 'Juara 3 Lomba Karya Tulis Ilmiah Nasional',
                'description' => 'Penelitian dan inovasi sains yang cemerlang mengantarkan siswa kami menjadi salah satu yang terbaik pada lomba karya tulis ilmiah tingkat nasional.',
                'image' => 'https://images.unsplash.com/photo-1761322572550-967ea8c0bfd9?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Sains & Penelitian',
                'date' => '2022',
                'student_name' => 'Dewi Wulan'
            ],
            [
                'id' => 5,
                'title_line1' => 'Juara 1',
                'title_line2' => 'Lari 100m Provinsi',
                'title' => 'Juara 1 Lari 100m Tingkat Provinsi',
                'description' => 'Ketangkasan dan kecepatan luar biasa menjadikan siswa kami sebagai yang tercepat dalam ajang kejuaraan lari 100m tingkat provinsi.',
                'image' => 'https://images.unsplash.com/photo-1552674605-db6ffd4facb5?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Olahraga Fisik',
                'date' => '2023',
                'student_name' => 'Rizky Maulana'
            ],
        ];

        return view('public.prestasi.index', compact('prestasiList'));
    }
}
