<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Artikel;
use App\Models\ArtikelKomentar; // Changed from Komentar to ArtikelKomentar
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ArticleFeatureTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Setup test data before each test
     */
    protected function setUp(): void
    {
        parent::setUp();
        
        // Create test articles
        $this->createTestArticles();
        $this->createTestComments();
    }

    /**
     * Create test articles for testing
     */
    private function createTestArticles()
    {
        Artikel::create([
            'id_artikel' => 1,
            'judul' => 'Tips Merawat Smartphone Agar Awet',
            'isi' => 'Smartphone adalah perangkat yang sangat penting dalam kehidupan sehari-hari. Untuk menjaga agar smartphone tetap awet dan berfungsi optimal, ada beberapa tips yang bisa diterapkan...',
            'nama_penulis' => 'Ahmad Teknisi',
            'title_penulis' => 'Senior Technician',
            'foto' => 'artikel1.jpg',
            'suka' => 15,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Artikel::create([
            'id_artikel' => 2,
            'judul' => 'Cara Mengatasi HP Yang Lemot',
            'isi' => 'HP yang lemot adalah masalah umum yang sering dialami pengguna. Ada beberapa cara untuk mengatasi masalah ini mulai dari membersihkan cache hingga factory reset...',
            'nama_penulis' => 'Sarah Mobile Expert',
            'title_penulis' => 'Mobile Specialist',
            'foto' => 'artikel2.jpg',
            'suka' => 23,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Artikel::create([
            'id_artikel' => 3,
            'judul' => 'Panduan Backup Data HP',
            'isi' => 'Backup data adalah hal yang sangat penting untuk mencegah kehilangan data penting. Artikel ini akan membahas berbagai cara backup data...',
            'nama_penulis' => 'Budi Data Specialist',
            'title_penulis' => 'Data Recovery Expert',
            'foto' => 'artikel3.jpg',
            'suka' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Create test comments
     */
    private function createTestComments()
    {
        ArtikelKomentar::create([ // Changed from Komentar to ArtikelKomentar
            'id_artikel' => 1,
            'name' => 'John Doe',
            'komentar' => 'Artikel yang sangat bermanfaat, terima kasih!',
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2)
        ]);

        ArtikelKomentar::create([ // Changed from Komentar to ArtikelKomentar
            'id_artikel' => 1,
            'name' => 'Jane Smith',
            'komentar' => 'Tips yang diberikan sangat praktis dan mudah diikuti.',
            'created_at' => now()->subDay(),
            'updated_at' => now()->subDay()
        ]);
    }

    /**
     * Test 1: Successful access to article listing page
     */
    public function test_successful_access_to_article_listing()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->assertSee('Artikel')
                    ->assertSee('Beberapa tulisan dari tim kami')
                    ->assertSee('Tips Merawat Smartphone Agar Awet')
                    ->assertSee('Cara Mengatasi HP Yang Lemot')
                    ->assertSee('Panduan Backup Data HP')
                    ->assertSee('Ahmad Teknisi')
                    ->assertSee('Sarah Mobile Expert');
        });
    }

    /**
     * Test 2: Article card elements display correctly
     */
    public function test_article_card_elements_display()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->within('.devices-item .row', function ($browser) {
                        // Check first article card
                        $browser->with('.col-xl-4:first-child', function ($browser) {
                            $browser->assertPresent('img')
                                    ->assertPresent('.card-title')
                                    ->assertPresent('.card-text')
                                    ->assertPresent('.card-profile .image img')
                                    ->assertPresent('.position h5')
                                    ->assertPresent('.position p');
                        });
                    });
        });
    }

    /**
     * Test 3: Successful navigation to article detail
     */
    public function test_successful_navigation_to_article_detail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->click('a[href="/articledetail/1"]')
                    ->waitForLocation('/articledetail/1')
                    ->assertSee('Tips Merawat Smartphone Agar Awet')
                    ->assertSee('Ahmad Teknisi')
                    ->assertSee('Senior Technician')
                    ->assertSee('Smartphone adalah perangkat yang sangat penting');
        });
    }

    /**
     * Test 4: Article detail page displays complete information
     */
    public function test_article_detail_displays_complete_info()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->assertSee('article') // Tag
                    ->assertSee('Tips Merawat Smartphone Agar Awet') // Title
                    ->assertSee('Ahmad Teknisi') // Author name
                    ->assertSee('Senior Technician') // Author title
                    ->assertPresent('.article-detail-image img') // Article image
                    ->assertPresent('.article-detail-icon') // Like section
                    ->assertSee('15') // Like count
                    ->assertSee('Smartphone adalah perangkat yang sangat penting') // Content
                    ->assertSee('Komentar'); // Comments section
        });
    }

    /**
     * Test 5: Like functionality works correctly
     */
    public function test_like_functionality_works()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->assertSee('15') // Initial like count
                    ->click('.article-detail-icon a') // Click like button
                    ->waitForLocation('/articledetail/suka/1')
                    ->pause(1000) // Wait for redirect processing
                    ->visit('/articledetail/1') // Visit again to check updated count
                    ->assertSee('16'); // Updated like count
        });
    }

    /**
     * Test 6: Comment section displays existing comments
     */
    public function test_comment_section_displays_existing_comments()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->scrollTo('.service-detail-navs')
                    ->assertSee('Komentar')
                    ->assertSee('John Doe')
                    ->assertSee('Artikel yang sangat bermanfaat, terima kasih!')
                    ->assertSee('Jane Smith')
                    ->assertSee('Tips yang diberikan sangat praktis');
        });
    }

    /**
     * Test 7: Successful comment submission
     */
    public function test_successful_comment_submission()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->scrollTo('#komentar')
                    ->type('input[name="name"]', 'Test User')
                    ->type('textarea[name="komentar"]', 'Ini adalah komentar test yang sangat bermanfaat.')
                    ->click('button[type="submit"]')
                    ->waitForLocation('/articledetail/1')
                    ->assertSee('Test User')
                    ->assertSee('Ini adalah komentar test yang sangat bermanfaat.');
        });
    }

    /**
     * Test 8: Comment form validation - empty fields
     */
    public function test_comment_form_validation_empty_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->scrollTo('#komentar')
                    ->click('button[type="submit"]')
                    ->pause(1000)
                    ->assertPresent('input[name="name"][required]')
                    ->assertPresent('textarea[name="komentar"][required]');
        });
    }

    /**
     * Test 9: Comment form validation - invalid data
     */
    public function test_comment_form_validation_invalid_data()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->scrollTo('#komentar')
                    ->type('input[name="name"]', 'a') // Too short
                    ->type('textarea[name="komentar"]', 'x') // Too short
                    ->click('button[type="submit"]')
                    ->pause(1000);
            
            // Form should not submit or show validation errors
            $browser->assertPathIs('/articledetail/1');
        });
    }

    /**
     * Test 10: XSS protection in comment form
     */
    public function test_xss_protection_in_comments()
    {
        $maliciousInputs = [
            '<script>alert("XSS")</script>',
            '<img src="x" onerror="alert(1)">',
            'javascript:alert("XSS")',
            '<iframe src="javascript:alert(1)"></iframe>'
        ];

        $this->browse(function (Browser $browser) use ($maliciousInputs) {
            foreach ($maliciousInputs as $input) {
                $browser->visit('/articledetail/1')
                        ->scrollTo('#komentar')
                        ->clear('input[name="name"]')
                        ->clear('textarea[name="komentar"]')
                        ->type('input[name="name"]', 'Security Test')
                        ->type('textarea[name="komentar"]', $input)
                        ->click('button[type="submit"]')
                        ->waitForLocation('/articledetail/1')
                        ->assertDontSee('<script>')
                        ->assertDontSee('<img')
                        ->assertDontSee('<iframe>');
            }
        });
    }

    /**
     * Test 11: Navigation to other articles from detail page
     */
    public function test_navigation_to_other_articles()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->scrollTo('.devices')
                    ->assertSee('Baca Artikel lainnya')
                    ->click('a[href="/articledetail/2"]')
                    ->waitForLocation('/articledetail/2')
                    ->assertSee('Cara Mengatasi HP Yang Lemot')
                    ->assertSee('Sarah Mobile Expert');
        });
    }

    /**
     * Test 12: Article not found scenario
     */
    public function test_article_not_found()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/999')
                    ->assertSee('404')
                    ->orAssertSee('Artikel tidak ditemukan')
                    ->orAssertSee('Page not found');
        });
    }

    /**
     * Test 13: Empty state when no articles exist
     */
    public function test_empty_state_no_articles()
    {
        // Clear all articles
        Artikel::truncate();
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->assertSee('Belum ada layanan yang dibuat')
                    ->orAssertSee('Tidak ada artikel')
                    ->assertPresent('.picture img[alt="noservice"]');
        });
    }

    /**
     * Test 14: Empty state when no comments exist
     */
    public function test_empty_state_no_comments()
    {
        // Clear all comments for article 3
        ArtikelKomentar::where('id_artikel', 3)->delete(); // Changed from Komentar
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/3')
                    ->scrollTo('.service-detail-navs')
                    ->assertSee('Belum ada Komentar')
                    ->assertSee('Isi Form Dibawah Ini Untuk Menambahkan Komentar');
        });
    }

    /**
     * Test 15: Image handling and fallback
     */
    public function test_image_handling_and_fallback()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->within('.devices-item', function ($browser) {
                        // Check if images have onerror fallback
                        $browser->assertPresent('img[onerror]');
                    });
            
            $browser->visit('/articledetail/1')
                    ->within('.article-detail-image', function ($browser) {
                        $browser->assertPresent('img[onerror]');
                    });
        });
    }

    /**
     * Test 16: Responsive design validation
     */
    public function test_responsive_design_article_listing()
    {
        $this->browse(function (Browser $browser) {
            // Desktop view
            $browser->resize(1200, 800)
                    ->visit('/article')
                    ->assertVisible('.col-xl-4')
                    ->assertVisible('.card');

            // Tablet view
            $browser->resize(768, 1024)
                    ->refresh()
                    ->assertVisible('.card')
                    ->assertVisible('.card-title');

            // Mobile view
            $browser->resize(375, 667)
                    ->refresh()
                    ->assertVisible('.card')
                    ->assertVisible('.card-body');
        });
    }

    /**
     * Test 17: Responsive design validation for article detail
     */
    public function test_responsive_design_article_detail()
    {
        $this->browse(function (Browser $browser) {
            // Desktop view
            $browser->resize(1200, 800)
                    ->visit('/articledetail/1')
                    ->assertVisible('.article-detail-image')
                    ->assertVisible('.consultation-form');

            // Mobile view
            $browser->resize(375, 667)
                    ->refresh()
                    ->assertVisible('.article-detail-image')
                    ->assertVisible('input[name="name"]')
                    ->assertVisible('textarea[name="komentar"]');
        });
    }

    /**
     * Test 18: Performance test - page load time
     */
    public function test_performance_page_load_time()
    {
        $this->browse(function (Browser $browser) {
            $startTime = microtime(true);
            
            $browser->visit('/article');
            
            $loadTime = microtime(true) - $startTime;
            
            $this->assertLessThan(5, $loadTime, 'Article listing should load within 5 seconds');
            
            $startTime = microtime(true);
            
            $browser->visit('/articledetail/1');
            
            $detailLoadTime = microtime(true) - $startTime;
            
            $this->assertLessThan(5, $detailLoadTime, 'Article detail should load within 5 seconds');
        });
    }

    /**
     * Test 19: Multiple article interactions
     */
    public function test_multiple_article_interactions()
    {
        $this->browse(function (Browser $browser) {
            // Browse multiple articles
            $articles = [1, 2, 3];
            
            foreach ($articles as $articleId) {
                $browser->visit("/articledetail/{$articleId}")
                        ->assertPresent('.article-detail-image')
                        ->assertPresent('.article-detail-icon')
                        ->click('.article-detail-icon a') // Like the article
                        ->pause(1000);
            }
            
            // Verify likes were recorded
            $browser->visit('/articledetail/1')
                    ->assertSee('16'); // Original 15 + 1
        });
    }

    /**
     * Test 20: Form data persistence validation
     */
    public function test_form_data_persistence()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->scrollTo('#komentar')
                    ->type('input[name="name"]', 'Persistent User')
                    ->type('textarea[name="komentar"]', 'This comment should persist')
                    ->refresh() // Refresh page
                    ->scrollTo('#komentar');
            
            // Form should be empty after refresh (no unwanted persistence)
            $browser->assertInputValue('input[name="name"]', '')
                    ->assertInputValue('textarea[name="komentar"]', '');
        });
    }

    /**
     * Test 21: SQL injection protection
     */
    public function test_sql_injection_protection()
    {
        $maliciousInputs = [
            "'; DROP TABLE artikels; --",
            "' OR '1'='1",
            "1'; DELETE FROM komentars WHERE '1'='1"
        ];

        $this->browse(function (Browser $browser) use ($maliciousInputs) {
            foreach ($maliciousInputs as $input) {
                $browser->visit('/articledetail/1')
                        ->scrollTo('#komentar')
                        ->clear('input[name="name"]')
                        ->clear('textarea[name="komentar"]')
                        ->type('input[name="name"]', 'SQL Test')
                        ->type('textarea[name="komentar"]', $input)
                        ->click('button[type="submit"]')
                        ->pause(2000)
                        ->assertDontSee('SQL syntax error')
                        ->assertDontSee('mysql_fetch');
            }
        });
    }

    /**
     * Test 22: Navigation breadcrumb and back functionality
     */
    public function test_navigation_breadcrumb_functionality()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->click('a[href="/articledetail/1"]')
                    ->waitForLocation('/articledetail/1')
                    ->back()
                    ->waitForLocation('/article')
                    ->assertSee('Tips Merawat Smartphone Agar Awet')
                    ->forward()
                    ->waitForLocation('/articledetail/1')
                    ->assertSee('Ahmad Teknisi');
        });
    }

    /**
     * Test 23: Comment timestamp display
     */
    public function test_comment_timestamp_display()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1')
                    ->scrollTo('.review-testimonial')
                    ->assertPresent('.review-date')
                    ->assertSeeIn('.review-date', 'ago'); // Should show relative time
        });
    }

    /**
     * Test 24: Article content truncation on listing
     */
    public function test_article_content_truncation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->within('.card-text', function ($browser) {
                        // Content should be truncated with ellipsis or limited length
                        $text = $browser->text('.card-text');
                        $this->assertLessThan(200, strlen($text), 'Article preview should be truncated');
                    });
        });
    }

    /**
     * Test 25: Error handling for server errors
     */
    public function test_error_handling_server_errors()
    {
        $this->browse(function (Browser $browser) {
            // Simulate server error by accessing invalid endpoint
            $browser->visit('/articledetail/abc')
                    ->assertSee('404')
                    ->orAssertSee('Server Error')
                    ->orAssertSee('Something went wrong');
        });
    }

    /**
     * Test 26: Cross-browser compatibility simulation
     */
    public function test_cross_browser_compatibility()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->assertVisible('.devices-item')
                    ->visit('/articledetail/1')
                    ->assertVisible('.article-detail-image')
                    ->assertVisible('#komentar');
        });
    }

    /**
     * Test 27: Accessibility validation
     */
    public function test_accessibility_features()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    // Check for alt attributes on images
                    ->assertPresent('img[alt]')
                    
                    ->visit('/articledetail/1')
                    // Check form labels and accessibility
                    ->assertPresent('label')
                    ->assertAttribute('input[name="name"]', 'required', 'true')
                    ->assertAttribute('textarea[name="komentar"]', 'required', 'true');
        });
    }

    /**
     * Test 28: Content search and filtering simulation
     */
    public function test_content_search_simulation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/article')
                    ->assertSee('Tips Merawat Smartphone')
                    ->assertSee('Cara Mengatasi HP Yang Lemot')
                    ->assertSee('Panduan Backup Data HP');
            
            // Simulate search functionality (if implemented)
            if ($browser->element('input[name="search"]')) {
                $browser->type('input[name="search"]', 'smartphone')
                        ->keys('input[name="search"]', '{enter}')
                        ->assertSee('Tips Merawat Smartphone');
            }
        });
    }

    /**
     * Test 29: Social sharing validation (if exists)
     */
    public function test_social_sharing_functionality()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/articledetail/1');
            
            // Check if social sharing buttons exist
            if ($browser->element('.social-share')) {
                $browser->assertPresent('.social-share')
                        ->within('.social-share', function ($browser) {
                            $browser->assertPresent('a[href*="facebook"]')
                                    ->orAssertPresent('a[href*="twitter"]')
                                    ->orAssertPresent('a[href*="whatsapp"]');
                        });
            }
        });
    }

    /**
     * Test 30: Data integrity after operations
     */
    public function test_data_integrity_after_operations()
    {
        $this->browse(function (Browser $browser) {
            // Get initial article count
            $initialCount = Artikel::count();
            
            // Perform various operations
            $browser->visit('/article')
                    ->click('a[href="/articledetail/1"]')
                    ->click('.article-detail-icon a') // Like article
                    ->scrollTo('#komentar')
                    ->type('input[name="name"]', 'Integrity Test')
                    ->type('textarea[name="komentar"]', 'Testing data integrity')
                    ->click('button[type="submit"]')
                    ->waitForLocation('/articledetail/1');
            
            // Verify data integrity
            $this->assertEquals($initialCount, Artikel::count(), 'Article count should remain unchanged');
            $this->assertDatabaseHas('artikel_komentars', [ // Changed table name
                'name' => 'Integrity Test',
                'komentar' => 'Testing data integrity'
            ]);
        });
    }

    /**
     * Cleanup method
     */
    protected function tearDown(): void
    {
        // Clean up test data
        Artikel::truncate();
        ArtikelKomentar::truncate(); // Changed from Komentar
        
        parent::tearDown();
    }
}