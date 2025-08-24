<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Politik', 'Ekonomi', 'Teknologi', 'Olahraga', 'Kesehatan', 'Pendidikan'];
        
        $newsData = [
            [
                'title' => 'Perkembangan Teknologi AI di Indonesia Tahun 2024',
                'excerpt' => 'Indonesia mengalami kemajuan pesat dalam adopsi teknologi kecerdasan buatan di berbagai sektor.',
                'content' => '<p>Indonesia mengalami kemajuan pesat dalam adopsi teknologi kecerdasan buatan di berbagai sektor. Pemerintah telah mengumumkan roadmap nasional untuk pengembangan AI yang akan mencakup pendidikan, kesehatan, dan industri.</p><p>Berbagai startup lokal mulai mengembangkan solusi AI untuk mengatasi tantangan spesifik Indonesia seperti bahasa daerah, logistik, dan pertanian.</p>',
                'category' => 'Teknologi',
                'author' => 'Tim Redaksi BLJ',
                'status' => 'published',
                'featured' => true,
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Kebijakan Ekonomi Baru Untuk Mendorong UMKM',
                'excerpt' => 'Pemerintah meluncurkan paket kebijakan ekonomi terbaru yang fokus pada pemberdayaan UMKM.',
                'content' => '<p>Pemerintah meluncurkan paket kebijakan ekonomi terbaru yang fokus pada pemberdayaan UMKM. Kebijakan ini mencakup kemudahan akses kredit, digitalisasi, dan pelatihan keterampilan.</p><p>Diharapkan kebijakan ini dapat meningkatkan daya saing UMKM di era digital dan menciptakan lapangan kerja baru.</p>',
                'category' => 'Ekonomi',
                'author' => 'Ahmad Suryanto',
                'status' => 'published',
                'featured' => true,
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Implementasi Kurikulum Merdeka di Seluruh Indonesia',
                'excerpt' => 'Kurikulum Merdeka mulai diterapkan secara menyeluruh di seluruh sekolah Indonesia.',
                'content' => '<p>Kurikulum Merdeka mulai diterapkan secara menyeluruh di seluruh sekolah Indonesia. Sistem pendidikan baru ini memberikan fleksibilitas lebih kepada guru dan siswa dalam proses belajar mengajar.</p><p>Kementerian Pendidikan menyatakan bahwa implementasi ini akan meningkatkan kualitas pendidikan dan mengembangkan karakter siswa.</p>',
                'category' => 'Pendidikan',
                'author' => 'Sari Dewi',
                'status' => 'published',
                'featured' => true,
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Timnas Indonesia Berhasil Lolos ke Piala Asia 2024',
                'excerpt' => 'Tim nasional sepak bola Indonesia berhasil meloloskan diri ke Piala Asia 2024.',
                'content' => '<p>Tim nasional sepak bola Indonesia berhasil meloloskan diri ke Piala Asia 2024 setelah pertandingan dramatis melawan Malaysia. Kemenangan 2-1 di leg kedua memastikan tiket Indonesia ke turnamen bergengsi Asia.</p><p>Pelatih Shin Tae-yong menyatakan kebanggaannya atas pencapaian tim dan berjanji akan mempersiapkan skuad terbaik untuk Piala Asia.</p>',
                'category' => 'Olahraga',
                'author' => 'Budi Hartono',
                'status' => 'published',
                'featured' => false,
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Program Vaksinasi COVID-19 Mencapai Target 70%',
                'excerpt' => 'Indonesia berhasil mencapai target vaksinasi COVID-19 sebesar 70% dari total populasi.',
                'content' => '<p>Indonesia berhasil mencapai target vaksinasi COVID-19 sebesar 70% dari total populasi. Pencapaian ini merupakan hasil kerja keras pemerintah dan partisipasi aktif masyarakat.</p><p>Kementerian Kesehatan menyatakan akan terus melanjutkan program vaksinasi untuk mencapai herd immunity dan melindungi masyarakat dari varian baru virus.</p>',
                'category' => 'Kesehatan',
                'author' => 'Dr. Maya Sari',
                'status' => 'published',
                'featured' => false,
                'views' => rand(100, 1000)
            ],
            [
                'title' => 'Pemilu 2024: Persiapan dan Tantangan KPU',
                'excerpt' => 'Komisi Pemilihan Umum memaparkan persiapan dan tantangan dalam menggelar Pemilu 2024.',
                'content' => '<p>Komisi Pemilihan Umum memaparkan persiapan dan tantangan dalam menggelar Pemilu 2024. Berbagai inovasi teknologi akan diterapkan untuk memastikan pemilu yang transparan dan akuntabel.</p><p>KPU juga menghadapi tantangan logistik mengingat geografis Indonesia yang luas dan beragam. Sosialisasi kepada masyarakat terus dilakukan untuk meningkatkan partisipasi pemilih.</p>',
                'category' => 'Politik',
                'author' => 'Eko Prasetyo',
                'status' => 'published',
                'featured' => false,
                'views' => rand(100, 1000)
            ]
        ];

        foreach ($newsData as $news) {
            News::create(array_merge($news, [
                'slug' => Str::slug($news['title']),
                'created_at' => now()->subDays(rand(0, 30)),
                'updated_at' => now()
            ]));
        }

        // Create additional dummy news
        for ($i = 1; $i <= 20; $i++) {
            News::create([
                'title' => "Berita Dummy #$i - " . fake()->sentence(6),
                'slug' => Str::slug("Berita Dummy #$i - " . fake()->sentence(6)),
                'excerpt' => fake()->text(150),
                'content' => '<p>' . fake()->paragraph(5) . '</p><p>' . fake()->paragraph(4) . '</p><p>' . fake()->paragraph(3) . '</p>',
                'category' => $categories[array_rand($categories)],
                'author' => fake()->name(),
                'status' => 'published',
                'featured' => rand(0, 4) == 0, // 20% chance to be featured
                'views' => rand(50, 500),
                'created_at' => now()->subDays(rand(0, 60)),
                'updated_at' => now()
            ]);
        }
    }
}