<?php

// database/factories/ArtikelFactory.php
namespace Database\Factories;

use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikelFactory extends Factory
{
    protected $model = Artikel::class;

    public function definition(): array
    {
        $titles = [
            'Tips Merawat Smartphone Agar Awet',
            'Cara Mengatasi HP Yang Lemot',
            'Panduan Backup Data HP',
            'Solusi HP Tidak Bisa Charging',
            'Mengoptimalkan Performa Baterai HP',
            'Tips Membersihkan Speaker HP',
            'Cara Recovery Data HP Rusak',
            'Panduan Update Software HP',
            'Mengatasi HP Overheat',
            'Tips Fotografi dengan HP'
        ];

        $authors = [
            ['name' => 'Ahmad Teknisi', 'title' => 'Senior Technician'],
            ['name' => 'Sarah Mobile Expert', 'title' => 'Mobile Specialist'],
            ['name' => 'Budi Data Specialist', 'title' => 'Data Recovery Expert'],
            ['name' => 'Lisa Hardware Expert', 'title' => 'Hardware Specialist'],
            ['name' => 'Doni Software Engineer', 'title' => 'Software Engineer']
        ];

        $author = $this->faker->randomElement($authors);

        return [
            'judul' => $this->faker->randomElement($titles),
            'isi' => $this->faker->paragraphs(5, true),
            'nama_penulis' => $author['name'],
            'title_penulis' => $author['title'],
            'foto' => 'artikel' . $this->faker->numberBetween(1, 10) . '.jpg',
            'suka' => $this->faker->numberBetween(0, 100),
            'created_at' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-3 months', 'now')
        ];
    }

    /**
     * Create popular article with high likes
     */
    public function popular(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'suka' => $this->faker->numberBetween(50, 200),
                'judul' => 'Tips Merawat Smartphone Agar Awet - Panduan Lengkap'
            ];
        });
    }

    /**
     * Create recent article
     */
    public function recent(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'created_at' => now()->subDays($this->faker->numberBetween(1, 7)),
                'updated_at' => now()->subDays($this->faker->numberBetween(1, 7))
            ];
        });
    }

    /**
     * Create article with long content
     */
    public function longContent(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'isi' => $this->faker->paragraphs(15, true),
                'judul' => 'Panduan Lengkap dan Komprehensif Merawat Smartphone Modern'
            ];
        });
    }

    /**
     * Create article with minimal likes
     */
    public function unpopular(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'suka' => $this->faker->numberBetween(0, 5)
            ];
        });
    }
}

// database/factories/ArtikelKomentarFactory.php
namespace Database\Factories;

use App\Models\ArtikelKomentar;
use App\Models\Artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtikelKomentarFactory extends Factory
{
    protected $model = ArtikelKomentar::class;

    public function definition(): array
    {
        $comments = [
            'Artikel yang sangat bermanfaat, terima kasih!',
            'Tips yang diberikan sangat praktis dan mudah diikuti.',
            'Informasi yang sangat membantu untuk pemula.',
            'Sudah saya coba dan hasilnya sangat memuaskan.',
            'Penjelasan yang detail dan mudah dipahami.',
            'Sangat berguna untuk mengatasi masalah HP saya.',
            'Terima kasih atas sharing ilmunya yang bermanfaat.',
            'Tutorial yang sangat jelas dan step by step.',
            'Recommended banget artikel ini!',
            'Semoga ada artikel lainnya yang serupa.'
        ];

        return [
            'id_artikel' => Artikel::factory(),
            'name' => $this->faker->name(),
            'komentar' => $this->faker->randomElement($comments),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now')
        ];
    }

    /**
     * Create positive comment
     */
    public function positive(): Factory
    {
        return $this->state(function (array $attributes) {
            $positiveComments = [
                'Artikel yang luar biasa! Sangat membantu sekali.',
                'Perfect! Exactly what I was looking for.',
                'Outstanding article, very detailed and helpful.',
                'Brilliant explanation, thank you so much!',
                'This is exactly what I needed, amazing work!'
            ];

            return [
                'komentar' => $this->faker->randomElement($positiveComments)
            ];
        });
    }

    /**
     * Create recent comment
     */
    public function recent(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'created_at' => now()->subHours($this->faker->numberBetween(1, 24)),
                'updated_at' => now()->subHours($this->faker->numberBetween(1, 24))
            ];
        });
    }

    /**
     * Create long comment
     */
    public function detailed(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'komentar' => $this->faker->paragraphs(3, true)
            ];
        });
    }
}