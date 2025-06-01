<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTestSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::table('artikel_komentars')->delete();
        DB::table('artikels')->delete();
        
        // Insert test articles
        $articles = [
            [
                'id_artikel' => 1,
                'judul' => 'Tips Merawat Smartphone Agar Awet',
                'isi' => 'Smartphone adalah perangkat yang sangat penting dalam kehidupan sehari-hari. Untuk menjaga agar smartphone tetap awet dan berfungsi optimal, ada beberapa tips yang bisa diterapkan...',
                'nama_penulis' => 'Ahmad Teknisi',
                'title_penulis' => 'Senior Technician',
                'foto' => 'artikel1.jpg',
                'suka' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_artikel' => 2,
                'judul' => 'Cara Mengatasi HP Yang Lemot',
                'isi' => 'HP yang lemot adalah masalah umum yang sering dialami pengguna. Ada beberapa cara untuk mengatasi masalah ini mulai dari membersihkan cache hingga factory reset...',
                'nama_penulis' => 'Sarah Mobile Expert',
                'title_penulis' => 'Mobile Specialist',
                'foto' => 'artikel2.jpg',
                'suka' => 23,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_artikel' => 3,
                'judul' => 'Panduan Backup Data HP',
                'isi' => 'Backup data adalah hal yang sangat penting untuk mencegah kehilangan data penting. Artikel ini akan membahas berbagai cara backup data...',
                'nama_penulis' => 'Budi Data Specialist',
                'title_penulis' => 'Data Recovery Expert',
                'foto' => 'artikel3.jpg',
                'suka' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        
        foreach ($articles as $article) {
            DB::table('artikels')->insert($article);
        }
        
        // Insert test comments
        $comments = [
            [
                'id_artikel' => 1,
                'name' => 'John Doe',
                'komentar' => 'Artikel yang sangat bermanfaat, terima kasih!',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2)
            ],
            [
                'id_artikel' => 1,
                'name' => 'Jane Smith',
                'komentar' => 'Tips yang diberikan sangat praktis dan mudah diikuti.',
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay()
            ]
        ];
        
        foreach ($comments as $comment) {
            DB::table('artikel_komentars')->insert($comment);
        }
    }
}